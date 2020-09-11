let account = document.getElementById("account");

account.addEventListener("click",function(){
    let submenu = document.getElementById("submenu1");
    if(!document.getElementById("subMenuTrigger").classList.contains("show")){
        submenu.animate([
            {
                height : '0',
            },
            {
                height : '100px',
            }
        ],{duration : 100})
    }
});

document.getElementById("builds").addEventListener("click",function(){
    let submenu = document.getElementById("submenu2");
    if(!document.getElementById("subMenuTrigger").classList.contains("show")){
        submenu.animate([
            {
                height : '0',
            },
            {
                height : '75px',
            }
        ],{duration : 100})
    }
});