<style>
    .header-soft {
        background: linear-gradient(180deg, #eaf2ff 0%, #ffffff 100%);
        overflow: hidden;
    }
    .header-soft .judul {
        color: #4a86d4;
        font-weight: 700;
        line-height: 1.5;
    }
    .header-soft .deskripsi {
        color: #333;
        font-size: 1.15rem;
    }
    .header-soft .btn-store {
        background: #000;
        color: #fff;
        border-radius: 8px;
        padding: 10px 18px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        line-height: 1.1;
        transition: transform .2s;
    }
    .header-soft .btn-store:hover {
        transform: translateY(-2px);
        color: #fff;
    }
    .header-soft .btn-store small {
        display: block;
        font-size: .7rem;
    }
    .header-soft .btn-store span {
        font-size: 1.2rem;
        font-weight: 600;
    }
    /* blob lembut di belakang carousel */
    .header-soft .carousel-wrap {
        position: relative;
        padding: 40px;
    }
    .header-soft .carousel-wrap::before {
        content: "";
        position: absolute;
        inset: 0;
        background: #f6f9ff;
        border-radius: 60% 40% 55% 45% / 50% 55% 45% 50%;
        z-index: 0;
    }
    .header-soft .header-carousel {
        position: relative;
        z-index: 1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(74, 134, 212, 0.18);
    }
    /* teks di atas foto dibuat lebih lembut */
    .header-soft .owl-carousel-text {
        background: rgba(74, 134, 212, 0.35) !important;
    }
    .header-soft .owl-carousel-text h1 {
        font-size: 2.8rem;
        font-weight: 600;
    }
</style>

<div class="container-fluid header header-soft p-0 mb-5">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-5 judul mb-4">Layanan Kesehatan Dalam Satu Genggaman</h1>
            <p class="deskripsi mb-4">
                
            </p>
            <div class="d-flex flex-wrap gap-3">
                
            </div>
        </div>

        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <div class="carousel-wrap">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="pasien/template-pasien/img/carousel-1.jpg" alt="">
                         <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Dokter umum</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="pasien/template-pasien/img/carousel-2.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Dokter tht</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="pasien/template-pasien/img/carousel-3.jpg" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Dokter anak</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>