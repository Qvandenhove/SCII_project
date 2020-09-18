let pass = "";
let pseudo = "";

function envoyer(data,url) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
            let response = (JSON.parse(this.responseText));
            if(response.isCorrect){
                document.location.href = "index.php";
            }
        }
    };
    req.open("POST",url);
    req.setRequestHeader("Content-Type","application/json");
    req.send(JSON.stringify(data));
}

document.getElementById("infos").addEventListener("submit", event =>{
        event.preventDefault();
        let errors_list = []
        document.querySelectorAll('input').forEach((input) => {
            if (input.value === ""){
                errors_list.push(input.id)
                input.classList.add("is-invalid")
                input.addEventListener("change", () => {
                    input.classList.remove("is-invalid")
                })
            }
        })
        if(errors_list.length > 0){
            console.log("error")
        }else{
            let data = {}
            document.querySelectorAll("input[name]").forEach((input) => {
                data[input.getAttribute("name")] = input.value
            })
            envoyer(data, "index.php?action=connect")
        }
    }
);

document.querySelectorAll("input").forEach(function(input){
    input.addEventListener("input", function(){
        input.style.background = "white";
    })
})