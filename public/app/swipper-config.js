var swiper = new Swiper(".homeSwiper", {
    navigation: {
        nextEl: '.swip-next-homeslide',
        prevEl: '.swip-prev-homeslide',
    },
    effect: "fade",
    pagination: {
        el: ".home-swiper-pagination",
        bulletClass: 'costum-bullet',
        bulletActiveClass: 'costum-bullet-active',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + ' costumSwiperPagination">' + "</span>";
        },
    },
});
