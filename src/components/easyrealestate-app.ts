import '../styles/_easyrealestate-app.scss';
import { Loader } from "@googlemaps/js-api-loader"


export default function initEasyRealEstateApp() {
    const toggleButton = document.querySelector('.easyrealestate-app-view-toggle-button');
    const appContent = document.querySelector('.easyrealestate-app-content');
    
    if (!toggleButton || !appContent) {
        return;
    }

    const mapContainer = appContent.querySelector('.easyrealestate-app-map');
    if (!mapContainer) {
        return;
    }

    const mapElement = mapContainer.querySelector('.map');
    if (!mapElement) {
        return;
    }

    initGoogleMaps(mapElement);

    toggleButton.addEventListener('click', () => {
        console.log('Toggle button clicked');
        appContent.classList.toggle('easyrealestate-app-content-show-list');
    });

}

function initGoogleMaps(mapElement: Element) {
    // 53.53238971683533, 8.106689978965917

    const mapOptions = {
        center: { lat: 53.53238971683533, lng: 8.106689978965917 },
        zoom: 14,
        zoomControl: false,
        cameraControl: false,
        fullscreenControl: false
    };

    const loader = new Loader({
        apiKey: "",
        version: "weekly",
    });

    loader
        .importLibrary('maps')
        .then(({ Map }) => {
            new Map(mapElement, mapOptions);
        })
        .catch((e) => {
            // do something
            console.error(e);
        });
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateApp();
});
