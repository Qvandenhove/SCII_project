let pass = "";
let pseudo = "";

function envoyer(data,url) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
            let response = (JSON.parse(this.responseText));
            if(response.isCorrect){
                document.location.href = "index.php";
            }else{
                let req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
                            let response = JSON.parse(this.responseText);
                            let typedPseudo = document.getElementById("pseudo").value;
                            let pseudoExists = false;
                            response.forEach(function(pseudo){
                                if(typedPseudo === pseudo){
                                    pseudoExists = true;
                                    document.getElementById("wrongPass").innerHTML = "Le mot de passe est incorrect"
                                    document.getElementById("pass").style.backgroundColor = "rgb(255,106,106)";
                                }
                            });
                            if(!pseudoExists){
                                document.getElementById("wrongPseudo");
                                document.getElementById("pseudo").style.backgroundColor = "rgb(255,106,106)";
                            }

                        }
                }
                req.open("GET",document.location.href.split("=")[0] + "=getPseudos")
                req.send();
            }
        }
    };
    req.open("POST",url);
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

document.getElementById("infos").addEventListener("submit", event =>{
        event.preventDefault();
        pseudo = document.getElementById("pseudo").value;
        pass = document.getElementById("pass").value;
        let user = {pseudo : pseudo,pass : pass};
        envoyer(user,document.location.href.split("=")[0]+"=checkUser");
    }
);

document.querySelectorAll("input").forEach(function(input){
    input.addEventListener("input", function(){
        input.style.background = "white";
    })
})