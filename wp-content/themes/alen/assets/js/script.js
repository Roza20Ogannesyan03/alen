const swiper1 = new Swiper(document.getElementById("slider"), {
    navigation: {
        nextEl: ".slider__swiper-button-prev",
        prevEl: ".slider__swiper-button-next",
    },

    slidesPerView: "auto",
    slidesPerGroup: 1,
    spaceBetween: 44,
});


const hamb = document.querySelector("#hamb");
const popup = document.querySelector("#popup");
const menu = document.querySelector(".header__menu");
const body = document.body;

hamb.addEventListener("click", hambHandler);

function hambHandler(e) {
    hamb.style.display = "none"
    popup.classList.add("open");
    //hamb.classList.toggle("active");
    body.classList.add("noscroll");
    close.classList.add('open')
    renderPopup();
}

const close = document.querySelector(".close");
close.addEventListener("click", hambHandlerClose);
function hambHandlerClose(e) {
    hamb.style.display = "block"
    close.classList.remove('open')
    popup.classList.remove("open");
    //hamb.classList.toggle("active");
    body.classList.remove("noscroll");
    // renderPopup();
}

function renderPopup() {
    popup.appendChild(menu);
}

// Код для закрытия меню при нажатии на ссылку

const links = Array.from(menu.children);

links.forEach((link) => {
    link.addEventListener("click", closeOnClick);
});

function closeOnClick() {
    popup.classList.remove("open");
    hamb.classList.remove("active");
    body.classList.remove("noscroll");
}



let answers = document.querySelectorAll('.answers__item');
answers.forEach((answer) => {
    answer.querySelector('.answers__item_plus').addEventListener('click', () => {
        answer.classList.toggle('active-ans')
    })
})

const arrow = document.querySelector(".scroll-arrow");

window.onscroll = function (e) {
    if (window.scrollY >= window.screen.height) {
        arrow.style.visibility = "visible";
    }
    if (window.scrollY < window.screen.height) {
        arrow.style.visibility = "hidden";
    }
};
