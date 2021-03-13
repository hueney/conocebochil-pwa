//Navegation
const d= document;
let menuContent = d.querySelector('.header');

let prevScrollPos = window.pageYOffset;
console.log(prevScrollPos);
window.onscroll = () => {

  //Hide & Show - Scroll Menu (Function)
  let currentScrollPos = window.pageYOffset;
console.log(currentScrollPos);
  if (prevScrollPos > currentScrollPos) {
    menuContent.style.bottom = '0px';
    menuContent.style.transition = '0.5s';
  }else{
    menuContent.style.bottom = '-64px';
    menuContent.style.transition = '0.5s';
  }
  prevScrollPos = currentScrollPos;

}






