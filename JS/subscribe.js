let mail = null;
let pass = "";
let pseudo = "";
let lastName = "";
let firstName = "";
let confirmPass = "";

function envoyer(data,url) {
    let req = new XMLHttpRequest();
    req.open("POST",url);
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

document.getElementById("infos").addEventListener("submit", event =>{
    event.preventDefault();
    pass = document.getElementById("pass").value;
    confirmPass = document.getElementById("confirmPass").value;
    if(confirmPass === pass){
        lastName = document.getElementById("lastName").value;
        firstName = document.getElementById("firstName").value;
        mail = document.getElementById("mail").value;
        pseudo = document.getElementById("pseudo").value;
        let user = {mail: mail, pseudo : pseudo, lastName : lastName, firstName : firstName, pass : pass};
        console.log(document.location.href.split("=")[0]+"=addUser")
        envoyer(user,document.location.href.split("=")[0]+"=addUser");
        document.location.href = "index.php"
    }
    else
    {
        document.getElementById("error").innerHTML = "Les Mots de passes doivent correspondre";
    }

}
);

response = document.createElement("span");
document.getElementsByClassName("form-check")[0].appendChild(response);
document.getElementById("pseudo").addEventListener("input", event => {
    req = new XMLHttpRequest();

    req.onreadystatechange = function (){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            pseudos = JSON.parse(this.responseText);
            for (i = 0; i < pseudos.length;i++){
                if(pseudos[i] === document.getElementById("pseudo").value){
                    document.getElementById("submit").setAttribute("disabled","disabled");
                    response.innerHTML = "Ce pseudo est déja pris.";
                    break;
                }else{
                    document.getElementById("submit").removeAttribute("disabled");
                    response.innerHTML = "Ce pseudo est libre.";
                }
            }
            }
        }
        req.open("GET", document.location.href.split("=")[0]+"=getPseudos");
        req.send();
}
)
