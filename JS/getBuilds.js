//Initialisation

tablereq = new XMLHttpRequest();
document.querySelector("body").style.height = "auto"
let page = document.location.href.split("=")[2];

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

