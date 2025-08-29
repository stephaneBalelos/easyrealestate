export default function initEasyRealEstateWaitlistForm() {
    const garageSelects = Array.from(document.querySelectorAll('[garage-select]')) as HTMLElement[];
    garageSelects.forEach((select) => initGarageSelect(select));
}

function initGarageSelect(selectElement: HTMLElement) {
    const formId = selectElement.getAttribute('garage-select');
    if (!formId) return;

    const form = document.getElementById(formId) as HTMLFormElement;
    if (!form) return;

    const items = selectElement.querySelectorAll('.easyrealestate-form-group--select-item');

    items.forEach(item => {
        const radio = item.querySelector('input[type="radio"]') as HTMLInputElement;
        radio.addEventListener('change', ($event) => {
            $event.preventDefault();

            // Get Hidden Field in form
            const hiddenField = form.querySelector('input[name="garage_name"]') as HTMLInputElement;
            if (hiddenField) {
                hiddenField.value = radio.value;
            }
        });
    });

}

document.addEventListener('DOMContentLoaded', () => {
    initEasyRealEstateWaitlistForm();
});
