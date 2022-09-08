import Swiper from "swiper";

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
})
new Swiper(".mySwiper2", {
    spaceBetween: 10,
    thumbs: {
        swiper: swiper,
    },
})

const btnTogFrmReser = document.querySelector('#btnTogFrmReser')
const closeReservFrm = document.querySelector('[data-close-reserv-form]')
const reservaForm = document.querySelector('#reservaForm')
const closeModalReserF = document.querySelector('#closeModalReserF')
if (reservaForm) {
    closeModalReserF.addEventListener('click', (e) => {
        e.preventDefault()
        reservaForm.classList.remove('flex')
        reservaForm.classList.add('invisible', 'opacity-0','hidden')
    })
    closeReservFrm.addEventListener('click', (e) => {
        e.preventDefault()
        reservaForm.classList.remove('flex')
        reservaForm.classList.add('invisible', 'opacity-0', 'hidden')
    })

    btnTogFrmReser.addEventListener('click', (e) => {
        e.preventDefault()
        reservaForm.classList.add('flex')
        reservaForm.classList.remove('invisible', 'opacity-0','hidden')
    })
}
