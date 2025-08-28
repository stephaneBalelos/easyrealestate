import '../styles/_easyrealestate-app.scss';
import { Loader } from "@googlemaps/js-api-loader"


// extends google maps Map prototype
// Types
declare global {
    namespace google.maps {
        interface Map {
            panToWithOffset: (latlng: LatLng | LatLngLiteral, offsetX: number, offsetY: number) => void;
        }
    }
}

let map: google.maps.Map;
let markers: Map<string, google.maps.marker.AdvancedMarkerElement> = new Map();
let infoboxes: HTMLElement[] = [];


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

    infoboxes = Array.from(appContent.querySelectorAll('.easyrealestate-app-map-infobox'));
    if (!infoboxes) {
        return;
    }

    initInfoBox();

    toggleButton.addEventListener('click', () => {
        appContainer.classList.toggle('easyrealestate-app-content-show-list');
    });

}

async function initGoogleMaps(mapElement: Element) {
    const apiKey = mapElement.getAttribute('api-key');
    const mapId = mapElement.getAttribute('map-id');
    const centerLatString = mapElement.getAttribute('center-lat');
    const centerLngString = mapElement.getAttribute('center-lng');
    const zoomString = mapElement.getAttribute('zoom');

    if (!apiKey || !mapId) {
        console.warn('Google Maps API key or map ID is missing');
        return;
    }

    if (!centerLatString || !centerLngString || !zoomString) {
        console.warn('Google Maps center or zoom level is missing');
        return;
    }

    const centerLat = parseFloat(centerLatString);
    const centerLng = parseFloat(centerLngString);
    const zoom = parseInt(zoomString);

    if (isNaN(centerLat) || isNaN(centerLng) || isNaN(zoom)) {
        console.warn('Google Maps center or zoom level is invalid');
        return;
    }

    const mapOptions = {
        center: { lat: centerLat, lng: centerLng },
        zoom: zoom,
        zoomControl: false,
        cameraControl: false,
        fullscreenControl: false,
        mapId: mapId
    };

    const loader = new Loader({
        apiKey: apiKey,
        version: "weekly",
    });

    try {
        const { Map, OverlayView } = await loader.importLibrary('maps');
        // extend panTo method to include offset
        Map.prototype.panToWithOffset = function (latlng, offsetX, offsetY) {
            var map = this;
            var ov = new OverlayView();
            ov.onAdd = function () {
                var proj = this.getProjection();
                var aPoint = proj.fromLatLngToContainerPixel(latlng);
                if (!aPoint) return;
                aPoint.x = aPoint.x + offsetX;
                aPoint.y = aPoint.y + offsetY;
                var newLatLng = proj.fromContainerPixelToLatLng(aPoint);
                if (!newLatLng) return;
                map.panTo(newLatLng);
            };
            ov.draw = function () { };
            ov.setMap(this);
        };
        map = new Map(mapElement as HTMLElement, mapOptions);
        map.addListener('click', () => {
            hideInfoBox();
        });
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
    if (!infoboxes.length) {
        return;
    }

    infoboxes.forEach(box => {
        const closeBtn = box.querySelector('[close-btn]');
        if (!closeBtn) {
            return;
        }
        closeBtn.addEventListener('click', () => {
            hideInfoBox();
        });
    });
}

function loadMarkers(markerClass: typeof google.maps.marker.AdvancedMarkerElement) {
    const items = document.querySelectorAll('.easyrealestate-app-list-item');
    items.forEach(item => {
        let id = item.getAttribute('data-id');
        let latString = item.getAttribute('data-lat');
        let lngString = item.getAttribute('data-lng');


        if (!latString || !lngString || !id) {
            return;
        }
        const lat = parseFloat(latString);
        const lng = parseFloat(lngString);
        if (!isNaN(lat) && !isNaN(lng)) {
            const markerOptions = {
                position: { lat, lng },
                map: map,
                zIndex: 1,
                content: getMarkerLayout(),
            };
            const newMarker = new markerClass(markerOptions);
            newMarker.addListener('click', (_marker: google.maps.marker.AdvancedMarkerElement) => {
                showInfoBox(id);
                map.panToWithOffset(new google.maps.LatLng(lat, lng), 0, 125);
            });
            markers.set(item.getAttribute('data-id') || '', newMarker);
        }
    });
}


function getMarkerLayout() {
    const layout = document.createElement('div');
    layout.classList.add('easyrealestate-app-marker-layout');
    layout.innerHTML = `
        <div class="easyrealestate-app-marker-content">
            <svg width="20" height="20" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M62.72 3.5C62.95 3.5 63.14 3.69 63.14 3.92V62.72C63.14 62.95 62.95 63.14 62.72 63.14H44.66C44.6 60.32 42.29 58.04 39.45 58.04H27.19C24.35 58.04 22.04 60.32 21.98 63.14H3.92C3.69 63.14 3.5 62.95 3.5 62.72V3.92C3.5 3.69 3.69 3.5 3.92 3.5H62.72ZM62.72 0H3.92C1.76 0 0 1.76 0 3.92V62.72C0 64.88 1.76 66.64 3.92 66.64H25.48V63.25C25.48 62.31 26.25 61.54 27.19 61.54H39.45C40.39 61.54 41.16 62.31 41.16 63.25V66.64H62.72C64.88 66.64 66.64 64.88 66.64 62.72V3.92C66.64 1.76 64.88 0 62.72 0Z" fill="currentColor"/>
            </svg>
        </div>
    `;
    return layout;
}

function showInfoBox(id: string) {
    if (!infoboxes.length) {
        return;
    }

    const infobox = infoboxes.find(box => box.getAttribute('data-id') === id);
    if (!infobox) {
        return;
    }

    for (let box of infoboxes) {
        box.classList.remove('easyrealestate-app-map-infobox-visible');
    }

    infobox.classList.add('easyrealestate-app-map-infobox-visible');


    for (let [markerId, marker] of markers) {
        const content = marker.content as HTMLElement;
        if (content.classList.contains('easyrealestate-app-marker-layout-active')) {
            content.classList.remove('easyrealestate-app-marker-layout-active');
            marker.zIndex = 1;
        }
        if (markerId === id) {
            marker.zIndex = 100;
            content.classList.add('easyrealestate-app-marker-layout-active');
        }
    }

}

function hideInfoBox() {
    for (let box of infoboxes) {
        box.classList.remove('easyrealestate-app-map-infobox-visible');
    }

    for (let [_markerId, marker] of markers) {
        const content = marker.content as HTMLElement;
        if (content.classList.contains('easyrealestate-app-marker-layout-active')) {
            content.classList.remove('easyrealestate-app-marker-layout-active');
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateApp();
});
