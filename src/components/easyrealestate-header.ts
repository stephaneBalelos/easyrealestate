import '../styles/_easyrealestate-header.scss';


export default function initEasyRealEstateHeader() {
    const header = document.querySelector('.easyrealestate-header');
    const menuToggle = document.getElementById('menu-toggle');
    const navigation = header?.querySelector('.easyrealestate-navigation');

    if (!header || !menuToggle || !navigation) {
        return;
    }

    menuToggle.addEventListener('click', () => {
        header.classList.toggle('is-nav-open');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateHeader();
});
