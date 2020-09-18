function envoyer(data,url) {
    let req = new XMLHttpRequest();
    req.open("POST",url);
    req.onload = () => {
        document.location.href = "index.php"

    }
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

document.getElementById("infos").addEventListener("submit", (event) =>{
    event.preventDefault();
    pass = document.getElementById("pass").value;
    confirmPass = document.getElementById("confirmPass").value;
    if(confirmPass === pass){
        let user = {}
        document.querySelectorAll("input[name]").forEach((input) => {
            user[input.getAttribute("name")] = input.value
        })
        envoyer(user,document.location.href);
    }
    else
    {
        document.getElementById("error").innerHTML = "Les Mots de passes doivent correspondre";
    }

}
);

response = document.createElement("span");
document.getElementsByClassName("form-check")[0].appendChild(response);
document.getElementById("pseudo").addEventListener("change", event => {
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
