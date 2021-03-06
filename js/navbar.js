const navSlide= () =>{
    const burger =document.querySelector('.burger');
    const nav =document.querySelector('.nav-links');
    const navLinks=document.querySelectorAll('.nav-links li');
    //toggle nav
    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');

        //animate link
    navLinks.forEach((link,index)=>{
        if(link.style.animation){
            link.style.animation=``;
        }
        else{
            link.style.animation = `navLinkFade 0.5s ease forwards ${index/5+0.75}s`;
       // console.log(index/5+0.2);
        }
    });
    //burger animation
    burger.classList.toggle('toggle');
    });
    
}
navSlide();