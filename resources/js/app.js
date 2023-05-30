import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteSubmitButtons = document.querySelectorAll('#delete');

    deleteSubmitButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            if (confirm("Sei sicuro di voler eliminare questo film?")) {
                button.parentElement.submit();
            }
        });
    });
