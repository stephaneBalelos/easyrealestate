import '../styles/_easyrealestate-app.scss';
import { Loader } from "@googlemaps/js-api-loader"

let map: google.maps.Map;
let markers: Map<string, google.maps.marker.AdvancedMarkerElement> = new Map();
let infobox: HTMLElement | null = null;

function initEasyRealEstateApp() {
    const toggleButton = document.querySelector('.easyrealestate-app-view-toggle-button');
    const appContainer = document.querySelector('.easyrealestate-app-container');

    if (!toggleButton || !appContainer) {
        return;
    }
    const appContent = appContainer.querySelector('.easyrealestate-app-content');
    if (!appContent) {
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

    infobox = appContent.querySelector('.easyrealestate-app-map-infobox');
    if (!infobox) {
        return;
    }

    initInfoBox();

    toggleButton.addEventListener('click', () => {
        console.log('Toggle button clicked');
        appContainer.classList.toggle('easyrealestate-app-content-show-list');
    });

}

async function initGoogleMaps(mapElement: Element) {
    // 53.53238971683533, 8.106689978965917

    const mapOptions = {
        center: { lat: 53.53238971683533, lng: 8.106689978965917 },
        zoom: 14,
        zoomControl: false,
        cameraControl: false,
        fullscreenControl: false,
        mapId: "8c1e6a9bed70aa6c8b8bbedb"
    };

    const loader = new Loader({
        apiKey: "",
        version: "weekly",
    });

    try {
        const { Map } = await loader.importLibrary('maps');
        map = new Map(mapElement as HTMLElement, mapOptions);
    } catch (e) {
        console.error(e);
    }

    try {
        const { AdvancedMarkerElement } = await loader.importLibrary('marker');
        loadMarkers(AdvancedMarkerElement);
    } catch (e) {
        console.error(e);
    }
}

function initInfoBox() {
    if (!infobox) {
        return;
    }
    const closeButton = infobox.querySelector('[close-btn]');
    if (closeButton) {
        closeButton.addEventListener('click', hideInfoBox);
    }
}

function loadMarkers(markerClass: typeof google.maps.marker.AdvancedMarkerElement) {
    const items = document.querySelectorAll('.easyrealestate-app-list-item');
    items.forEach(item => {
        let latString = item.getAttribute('data-lat');
        let lngString = item.getAttribute('data-lng');
        if (!latString || !lngString) {
            return;

        }
        const lat = parseFloat(latString);
        const lng = parseFloat(lngString);
        if (!isNaN(lat) && !isNaN(lng)) {
            const markerOptions = {
                position: { lat, lng },
                map: map,
                content: getMarkerLayout(item.getAttribute('data-title') || 'item ', item.getAttribute('data-content') || ''),
            };
            const newMarker = new markerClass(markerOptions);
            newMarker.addListener('click', () => {
                showInfoBox(item.getAttribute('data-id') || '', item.getAttribute('data-title') || '', item.getAttribute('data-content') || '');
                map.panTo({ lat, lng });
            });
            markers.set(item.getAttribute('data-id') || '', newMarker);
        }
    });
}



function getMarkerLayout(title: string, content: string) {
    const layout = document.createElement('div');
    layout.classList.add('easyrealestate-app-marker-layout');
    layout.innerHTML = `
        <div class="easyrealestate-app-marker-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Design Icons by Pictogrammers - https://github.com/Templarian/MaterialDesign/blob/master/LICENSE --><path fill="currentColor" d="M22 9v11h-2v-9H4v9H2V9l10-4zm-3 3H5v2h14zm0 6H5v2h14zm0-3H5v2h14z"/></svg>
        </div>
    `;
    return layout;
}

function showInfoBox(id: string, title: string, content: string) {
    if (!infobox) {
        return;
    }
    const titleEl = infobox.querySelector('[title]');
    if (titleEl) {
        titleEl.textContent = title;
    }

    const contentEl = infobox.querySelector('[content]');
    if (contentEl) {
        contentEl.innerHTML = content;
    }

    if(!infobox.classList.contains('easyrealestate-app-map-infobox-visible')) {
        infobox.classList.add('easyrealestate-app-map-infobox-visible');
    }

    for (let [markerId, marker] of markers) {
        const content = marker.content as HTMLElement;
        console.log(markerId, id);
        if (content.classList.contains('easyrealestate-app-marker-layout-active')) {
            content.classList.remove('easyrealestate-app-marker-layout-active');
        }
        if (markerId === id) {
            content.classList.add('easyrealestate-app-marker-layout-active');
        }
    }

}

function hideInfoBox() {
    if (infobox) {
        infobox.classList.remove('easyrealestate-app-map-infobox-visible');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateApp();
});
