//Boutons de supression d'étape
let actions;
let req = new XMLHttpRequest();
function askDelete(numStep){
    if(confirm("Êtes vous sûr de vouloir supprimer cet élémenent"))
    {
        req.onreadystatechange = function(){
            if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
                let response = JSON.parse(this.responseText);
                console.log(response);
                document.location.reload();
            }
        };
        req.open("GET",document.location.href.split("=")[0]+"=deleteStep&build="+document.location.href.split("=")[2]+"&step="+numStep);
        req.send();
    }else{
        console.log("Cet élément est sauvegardé");
    }
}
//Bouton de modification d'étape
function editStep(numStep){
    let buttons = document.getElementsByClassName("Edit");
    for (let i = 0; i < buttons.length;i++){
        buttons[i].style.display = "none";
    }
    let tabLine = (document.getElementById("step"+numStep).children);
    document.querySelector("table").removeChild(document.querySelector("table").children[document.querySelector("table").children.length - 1]);
    tabLine[5].innerHTML = '<button onclick=updateStep('+numStep+')>Valider</button>';
    tabLine[3].innerHTML = '<label for = "comment">Commentaire : </label><br /><textarea  style = "width : 100%;" maxlength = "255" name = "comment" id = "comment">'+tabLine[3].innerHTML+'</textarea><br />';
    tabLine[2].innerHTML = '<label for="pop">Population: </label><input type="number" id="pop" value = '+tabLine[2].innerHTML+' max = "200" min = "0"/><br/>'
    tabLine[1].innerHTML = '<td style = "width : 200px; overflow :">\n' +
        '                                <span id = "element">'+tabLine[1].innerHTML+'</span>\n' +
        '                                <div id = "deroulant">\n' +
        '                                    <p>Cliquez ici pour choisir un élément.</p>\n' +
        '                                    <ul id = "chooseElement"></ul>\n' +
        '                                </div>\n' +
        '                            </td>';
    document.getElementById("deroulant").addEventListener("click",openMenu);
}

function updateStep(numStep){
    req.onreadystatechange = function(){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
            console.log();

        }
    };
    req.open("POST",document.location.href.split("=")[0]+"=updateStep&build="+document.location.href.split("=")[2]+"&step="+numStep);
    let tabLine = (document.getElementById("step"+numStep).children);
    let update = {item : document.getElementById("element").innerHTML.split(">")[1],pop : document.getElementById("pop").value,comment : document.getElementById("comment").value};
    console.log(JSON.stringify(update));
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(update));
    document.location.reload();
}
//Génération du menu déroulant
let count = 0;
let response;
let selection;
document.getElementById("deroulant").addEventListener("click",openMenu);

document.getElementById("infos").addEventListener("submit", event =>{
        event.preventDefault();
        step = {item : actions,pop : document.getElementById("pop").value,commentary : document.getElementById("comment").value,build : document.location.href.split("build=")[1]};
        send(step,document.location.href.split("=")[0]+"=checkStep");
        document.location.reload();
    }
);

function send(data,url) {
    let req = new XMLHttpRequest();
    req.open("POST",url);
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

function openMenu(event){
    event.stopPropagation();
    req.onreadystatechange = function (){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            response = JSON.parse(this.responseText);
            console.log(response);
            document.querySelector("p").innerHTML = "";
            for (i = 0; i < response.length; i++) {
                let building = response[i].nom;
                let option = document.createElement("li");
                option.classList.add("building");
                document.getElementById("chooseElement").style.height = "200px";
                document.getElementById("chooseElement").appendChild(option);
                let image = "<img src = 'MediaContent/Pictures/"+building.replace(" ","_").replace(" ","_").replace(" ","_")+".png'/>";
                option.innerHTML = image + building;
                selection = document.getElementsByClassName("building");

            }
            for(let i = 0; i < selection.length;i++){
                selection[i].addEventListener("click",event => {
                    actions = selection[i].innerHTML.split(">")[1];
                    document.getElementById("element").innerHTML = selection[i].innerHTML;
                })
            }
        }
        document.getElementById("deroulant").removeEventListener("click",openMenu);
        document.getElementById("deroulant").addEventListener("click",closeMenu);
    };
    req.open("GET", document.location.href.split("=")[0]+"=getBuildings&build="+document.location.href.split("=")[2]);
    req.send();
}

function closeMenu(){
    document.getElementById("chooseElement").innerHTML = "";
    document.getElementById("chooseElement").style.height = "0px";
    document.querySelector("p").innerHTML = "Cliquez ici pour choisir un autre élément";
    document.getElementById("deroulant").removeEventListener("click",closeMenu);
    document.getElementById("deroulant").addEventListener("click",openMenu);
}

function finishBuild(buildId){
    if(confirm("Êtes vous sur de vouloir terminer ce build, vous pourrez encore le modifier par la suite."))
        req.onreadystatechange = function(){
            document.location.href = "index.php?action=myPage&finish=1";
        };
    req.open("GET",document.location.href.split("=")[0]+"=finishBuild&build="+buildId);
    req.send();
}