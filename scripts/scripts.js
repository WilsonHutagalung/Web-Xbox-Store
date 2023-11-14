const slides = document.querySelectorAll('.home-slider .slide');
const slider = document.querySelector('.home-slider .wrapper');

let counter = 1;
const slideWidth = slides[0].clientWidth;

slider.style.transform = `translateX(${-slideWidth * counter}px)`;

function prevSlide() {
    if (counter <= 0) return;
    counter--;
    slider.style.transition = 'transform 0.5s ease-in-out';
    slider.style.transform = `translateX(${-slideWidth * counter}px)`;
}

function nextSlide() {
    if (counter >= slides.length - 1) return;
    counter++;
    slider.style.transition = 'transform 0.5s ease-in-out';
    slider.style.transform = `translateX(${-slideWidth * counter}px)`;
}

slider.addEventListener('transitionend', () => {
    if (slides[counter].classList.contains('last-slide')) {
        slider.style.transition = 'none';
        counter = slides.length - 2;
        slider.style.transform = `translateX(${-slideWidth * counter}px)`;
    }

    if (slides[counter].classList.contains('first-slide')) {
        slider.style.transition = 'none';
        counter = slides.length - counter;
        slider.style.transform = `translateX(${-slideWidth * counter}px)`;
    }
});

document.querySelector('.prev').addEventListener('click', prevSlide);
document.querySelector('.next').addEventListener('click', nextSlide);


// let slideIndex = 1;
// showSlides(slideIndex);

// function plusSlides(n) {
//     showSlides(slideIndex += n);
// }

// function currentSlide(n) {
//     showSlides(slideIndex = n);
// }

// function showSlides(n) {
//     let i;
//     let slides = document.getElementsByClassName("slide");
//     if (n > slides.length) { slideIndex = 1 }
//     if (n < 1) { slideIndex = slides.length }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     slides[slideIndex - 1].style.display = "block";
// }
// let start = 0;
// otomatis();

// function otomatis()
// {
// 	const sliders = document.querySelectorAll(".slider");

// 	for (let i = 0; i < sliders.length; i++)
// 	{
// 		sliders[i].style.display = "none";
// 	}

// 	if (start >= sliders.length)
// 	{
// 		start = 0;
// 	}

// 	sliders[start].style.display = "block";
// 	console.log("gambar ke" +start);
// 	start++;

// 	setTimeout(otomatis, 2000);
// }