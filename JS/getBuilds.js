//Initialisation

tablereq = new XMLHttpRequest();
document.querySelector("body").style.height = "auto"
let buildsList;
let cell;
let page = document.location.href.split("=")[2];
let content = ["name","race","matchup","type","Note","Poster"];

//Requete de remplissage de tableau
tablereq.onreadystatechange = function() {
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        buildsList = JSON.parse(this.responseText);
        for(let i = 0; i < buildsList.length; i++){
            let tabLine = document.createElement("tr");
            tabLine.style.height = "150px";
            document.querySelector("tbody").appendChild(tabLine);
            for (let j = 1; j<=6;j++){
                let tabCell = document.createElement("td");
                tabCell.classList.add("tabCell");
                document.getElementsByTagName("tr")[i+1].appendChild(tabCell);
                tabCell.innerHTML = buildsList[i][j];
            }
            let tabCell = document.createElement("td");
            tabCell.classList.add("buttonCell");
            document.getElementsByTagName("tr")[i+1].appendChild(tabCell);
            tabCell.innerHTML = "<a href='index.php?action=seeBuild&build="+buildsList[i][1]+"'<button class=\"btn btn-primary\" type=\"submit\">Consulter</button>"
        }
    }
};
tablereq.open("GET", document.location.href.split("=")[0]+"=getBuilds&page="+page);
tablereq.send();

//Fonctionnement des pages
let req = new XMLHttpRequest()
let pager = document.getElementsByClassName("pager")[0];
req.onreadystatechange = function(){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        for(let k = 1;k < Math.round(this.responseText / 4);k++){
            console.log(buildsList);
            let page = document.createElement("a");
            let blank = document.createElement("span");
            let urlParts = document.location.href.split("=").slice(0,2);
            let url ="";
            urlParts.forEach(function(part){
                url += part + "=";
            });
            url += + k;
            page.href = url;
            pager.appendChild(page);
            page.innerHTML= k +"";
            pager.appendChild(blank);
            blank.innerHTML = "&nbsp";
            page.classList.add("page")
        }
    }
};
req.open("GET",document.location.href.split("=")[0] + "=getBuildsCount");
req.send();

