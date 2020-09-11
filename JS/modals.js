document.getElementsByClassName("myModal")[0].classList.add("showModal");
setTimeout(function(){
    document.getElementsByClassName("myModal")[0].classList.add('hideModal');
    setTimeout(function(){
        document.getElementsByClassName("myModal")[0].classList.remove("showModal");
    },999)
},1999);