hamburger =document.querySelector('.hamburger')
hamburger.onclick = function(){
navBar = document.querySelector('.nav-bar')
navBar.classList.toggle('active')
}




ScrollReveal({
  origin:'top',
  distance:'30px',
  duration:700,

}).reveal(' #Services,#about,.about-col-a')