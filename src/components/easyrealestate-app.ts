import '../styles/_easyrealestate-app.scss';

export default function initEasyRealEstateApp() {
    const toggleButton = document.querySelector('.easyrealestate-app-view-toggle-button');
    const appContent = document.querySelector('.easyrealestate-app-content');

    if (!toggleButton || !appContent) {
        return;
    }

    toggleButton.addEventListener('click', () => {
        console.log('Toggle button clicked');
        appContent.classList.toggle('easyrealestate-app-content-show-list');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateApp();
});
