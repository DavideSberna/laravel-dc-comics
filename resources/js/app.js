import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import { random } from 'lodash';
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








const error = document.querySelector('.error');
const randomMessage = document.querySelector('.random-message');
const btnMessage = document.querySelectorAll('.btn-error-message')


if(error){
    randomMessage.classList.remove('d-none')
    randomMessage.classList.add('d-block')
}



btnMessage.forEach((button) => {
    button.addEventListener('click', () => {
        
      if (button.name == 'si') {
        let randomNumber = Math.floor(Math.random() * 20)
        let numberSeries = 'vol-'
        let randomString = numberSeries + randomNumber.toString()
        console.log(randomString)
        //chiamata AJAX
        fetch('/movies/random-title')
            .then(response => response.json())
            .then(data => {
                //let dataJson = data + randomString;
                //console.log(dataJson)
                console.log(data)
                document.querySelector('.titleInput').value = data.randomTitle + randomString
            })
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
