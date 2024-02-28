let navBar = document.querySelector("#navBar");

addEventListener("scroll", ()=>{
    if(window.scrollY >  0){
        navBar.classList.add('navCustom')
    }else{
        navBar.classList.remove("navCustom")
    };
})