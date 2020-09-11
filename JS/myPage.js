//Initialisation

tablereq = new XMLHttpRequest();
document.querySelector("body").style.height = "auto"
let buildsList;
let cell;
let page = document.location.href.split("=")[2];

//Requete de remplissage du tableau

function loadBuildPage(pageNum){
    document.querySelector("tbody").innerHTML = "";
    tablereq.onreadystatechange = function() {
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
            buildsList = JSON.parse(this.responseText);
            for(let i = 0; i < buildsList.length; i++){
                let tabLine = document.createElement("tr");
                tabLine.style.height = "150px";
                document.querySelector("tbody").appendChild(tabLine);
                for (let j = 1; j<=5;j++){
                    let tabCell = document.createElement("td");
                    tabCell.classList.add("tabCell");
                    document.getElementsByTagName("tr")[i+1].appendChild(tabCell);
                    tabCell.innerHTML = buildsList[i][j];
                }
                let tabCell = document.createElement("td");
                tabCell.classList.add("buttonCell");
                document.getElementsByTagName("tr")[i+1].appendChild(tabCell);
                tabCell.innerHTML = "<a href='index.php?action=seeSteps&build="+buildsList[i][0]+"'<button class=\"btn btn-primary\" type=\"submit\">Consulter</button>"
            }
        }
    };
    tablereq.open("GET", document.location.href.split("=")[0]+"=myBuilds&page="+pageNum);
    tablereq.send();
}

loadBuildPage(1);

//Fonctionnement des pages
let req = new XMLHttpRequest();
let pager = document.getElementsByClassName("pager")[0];
req.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        for(let k = 1;k <= Math.round(this.responseText / 4);k++){
            let page = document.createElement("span");
            let blank = document.createElement("span");
            page.addEventListener("click",function(){loadBuildPage(k)})
            pager.appendChild(page);
            page.innerHTML= k +"";
            page.style.cursor = "pointer"
            pager.appendChild(blank);
            blank.innerHTML = "&nbsp";
            page.classList.add("page");
        }
    }
};
req.open("GET",document.location.href.split("=")[0] + "=getBuildsCount");
req.send();

