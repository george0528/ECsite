{{-- <div class="main_contents_slide">
    <img class="main_contents_slide-img" src="{{ asset('image/slide1.png') }}" alt="">
</div> --}}
<div class="swiper-container main_contents_slide">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="{{ asset('image/sale1.jpg') }}" alt=""></div>
        <div class="swiper-slide"><img src="{{ asset('image/sale2.jpg') }}" alt=""></div>
    </div>
    <div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
</div>
{{-- CDN --}}
<script src="{{ asset('js/swiper.min.js') }}"></script>
{{-- Swiper.js スライドショー --}}
<script>
    var mySwiper = new Swiper ('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true,
        },
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });
</script>