//selecao dos elementos
const menuBtbn = document.querySelector('#open-menu')
const closeMenu = document.querySelector('#close-menu')
const menu = document.querySelector('#mobile-nav')
//evento
menuBtbn.addEventListener('click', (e) =>{
menu.classList.add('menu-active')
})
closeMenu.addEventListener('click', (e) =>{
menu.classList.remove('menu-active')
})

ScrollReveal({
  origin:'top',
  distance:'30px',
  duration:700,

}).reveal(' #Services,#about,.about-col-a')