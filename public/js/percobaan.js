const humbergerMenu = document.querySelector('.hamburger-menu');
const navigation = document.querySelector('.navigation');

humbergerMenu.addEventListener('click', function(){
    navigation.style.display = navigation.style.display === 'block' ? 'none' : 'block';

})