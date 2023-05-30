import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteSubmitButtons = document.querySelectorAll('.delete');

    deleteSubmitButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            if (confirm("Sei sicuro di voler eliminare questo film?")) {
                button.parentElement.submit();
            }
        });
    });



    
document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');
    const sliderImages = document.querySelectorAll('.carousel-item');

    let currentIndex = 0;

    function showImage(index) {
        sliderImages.forEach(function(image) {
            image.style.display = 'none';
        });

        sliderImages[index].style.display = 'block';
    }

    function goToPrevImage() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = sliderImages.length - 1;
        }

        showImage(currentIndex);
        console.log(currentIndex);
    }

    function goToNextImage() {
        currentIndex++;
        if (currentIndex >= sliderImages.length) {
            currentIndex = 0;
        }

        showImage(currentIndex);
        console.log(currentIndex);
    }

    prevButton.addEventListener('click', goToPrevImage);
    nextButton.addEventListener('click', goToNextImage);

    showImage(currentIndex);
});
