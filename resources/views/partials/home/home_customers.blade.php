<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VuongCoffee</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
       /* Ẩn viền trái phải của slide trước và sau */
.swiper-container {
    overflow: hidden;
    width: 100%;
    max-width: 100vw;
}
#hero {
    height: 100%;
}
/* Chỉnh sửa kích thước hình ảnh cho điện thoại */
@media (max-width: 768px) {

    .swiper-slide {
        text-align: center;
    }

    .swiper-slide h1 {
        font-size: 22px;
        margin-bottom: 10px;
    }

    .swiper-slide p {
        font-size: 14px;
        margin-bottom: 15px;
    }

    .btn-get-started {
        padding: 8px 15px;
        font-size: 14px;
    }
}

.hero-section {
    position: relative;
    width: 100%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 20px;
}

/* Chỉnh sửa text cho điện thoại */
@media (max-width: 768px) {
    #hero {
        background-size: cover;
    }

    .hero-section {
        padding: 40px 20px;
    }

    .hero-section h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .hero-section p {
        font-size: 14px;
    }

    .btn-get-started {
        font-size: 14px;
        padding: 8px 15px;
    }
}
    </style>
</head>
<body>
    <section id="hero">
        <div class="container mt-0 mt-lg-5">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slider 1 -->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                                <div>
                                    <h1>Khám phá hương vị cà phê đích thực</h1>
                                    <p>Tại VuongCoffee, chúng tôi mang đến cho bạn những ly cà phê tuyệt vời với chất lượng hàng đầu. Hãy đến và khám phá hương vị độc đáo của chúng tôi!</p>
                                    <a href="#about" class="btn-get-started scrollto">Bắt đầu</a>
                                </div>
                            </div>
                            <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
                                <img src="{{ 'storage/home/coffee.jpg' }}" class="img-fluid" alt="Cà phê">
                            </div>
                        </div>
                    </div>
                    <!-- Slider 2 -->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                                <div>
                                    <h1>Thưởng thức cà phê tuyệt vời</h1>
                                    <p>Chúng tôi mang đến cho bạn những trải nghiệm cà phê tuyệt vời với các loại cà phê được chọn lọc kỹ lưỡng và pha chế tinh tế.</p>
                                    <a href="#about" class="btn-get-started scrollto">Khám phá</a>
                                </div>
                            </div>
                            <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
                                <img src="{{ 'storage/home/coffee2.jpg' }}" class="img-fluid" alt="Cà phê">
                            </div>
                        </div>
                    </div>
                    <!-- Slider 3 -->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                                <div>
                                    <h1>Trải nghiệm cà phê độc đáo</h1>
                                    <p>VuongCoffee mang đến cho bạn những trải nghiệm cà phê độc đáo với các loại cà phê được chọn lọc kỹ lưỡng và pha chế tinh tế.</p>
                                    <a href="#about" class="btn-get-started scrollto">Khám phá</a>
                                </div>
                            </div>
                            <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
                                <img src="{{ 'storage/home/coffee3.jpg' }}" class="img-fluid" alt="Cà phê">
                            </div>
                        </div>
                    </div>
                    <!-- Slider 4 -->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-md-6 pt-5 pt-lg-0 order-md-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                                <div>
                                    <h1>Hương vị cà phê tuyệt hảo</h1>
                                    <p>VuongCoffee mang đến cho bạn những ly cà phê tuyệt hảo với chất lượng hàng đầu. Hãy đến và khám phá hương vị độc đáo của chúng tôi!</p>
                                    <a href="#about" class="btn-get-started scrollto">Khám phá</a>
                                </div>
                            </div>
                            <div class="col-md-6 order-md-2 mt-5 mt-lg-0 pt-5 pt-lg-0 d-none d-md-block hero-img" data-aos="fade-left">
                                <img src="{{ 'storage/home/coffee4.jpg' }}" class="img-fluid" alt="Cà phê">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        document.querySelectorAll('.scrollto').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        const faders = document.querySelectorAll('.fade-in');

        const appearOptions = {
            threshold: 0,
            rootMargin: "0px 0px -100px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                } else {
                    entry.target.classList.add('visible');
                    appearOnScroll.unobserve(entry.target);
                }
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });
    </script>
</body>
</html>
