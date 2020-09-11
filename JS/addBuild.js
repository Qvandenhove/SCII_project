function envoyer(data,url) {
    let req = new XMLHttpRequest();
    req.open("POST",url);
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

document.getElementById("infos").addEventListener("submit", event =>{
    let name = document.getElementById("buildName").value;
    let race = document.getElementById("race").value;
    let matchup = document.getElementById("matchup").value;
    let type = document.getElementById("type").value;
    let build = {name : name, race : race, matchup : matchup, type : type};
    envoyer(build,document.location.href.split("=")[0]+"=addABuild");
}
);