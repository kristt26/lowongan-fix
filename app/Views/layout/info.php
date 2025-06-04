<!DOCTYPE html>
<html lang="en" ng-app="apps" ng-controller="indexController" ng-cloak>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Rekrutmen Karyawan</title>
    <meta name="description" content="Sistem Rekrutmen Karyawan">
    <meta name="keywords" content="rekrutmen, lowongan, pekerjaan, karir">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendors/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/assets/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/home.css" rel="stylesheet">
    <style>

    </style>
</head>

<body class="index-page">
    <header id="header" class="header sticky-top">
        <!-- <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:hrd@company.com">hrd@company.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 234 567 890</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div> -->
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center me-auto">
                    <h2 class="sitename">PT. Bintoro Indah Group</h2>
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active home-btn">Home</a></li>
                        <li><a href="#lowongan" class="lowongan-btn">Lowongan</a></li>
                        <li><a href="#tahapan" class="tahapan-btn">Tahapan Rekrutmen</a></li>
                        <li><a href="#tentang" class="tentang-btn">Tentang</a></li>
                        <li><a href="/auth" class="login-btn">Login</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
                <a class="cta-btn d-none d-sm-block" href="/auth/register">Daftar Sekarang</a>
            </div>
        </div>
    </header>

    <?= $this->renderSection('info') ?>

    <footer class="bg-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">PT. Bintoro Indah Group</h5>
                    <p>Kami adalah perusahaan yang berkomitmen untuk menghubungkan talenta terbaik dengan peluang karir ideal.</p>
                    <!-- <div class="social-links">
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-decoration-none me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                    </div> -->
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3">Perusahaan</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#tentang" class="text-decoration-none tentang-btn">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h6 class="fw-bold mb-3">Untuk Kandidat</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#lowongan" class="text-decoration-none lowongan-btn">Cari Lowongan</a></li>
                        <li class="mb-2"><a href="/auth/register" class="text-decoration-none">Buat Akun</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Hubungi Kami</h6>
                    <p><i class="bi bi-envelope me-2"></i> info@bintaroindahgroup.com</p>
                    <p><i class="bi bi-telephone me-2"></i> +62 21 1234 5678</p>
                    <p><i class="bi bi-geo-alt me-2"></i> Jl. Contoh No. 123, Sorong</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small mb-0">&copy; 2023 NamaPerusahaan. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!-- <a href="#" class="small text-decoration-none me-3">Kebijakan Privasi</a>
                    <a href="#" class="small text-decoration-none">Syarat & Ketentuan</a> -->
                </div>
            </div>
        </div>
    </footer>


    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendors/aos/aos.js"></script>
    <script src="/assets/vendors/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendors/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendors/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="/assets/js/mainn.js"></script>
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/js/info.js"></script>
    <script src="/js/services/helper.services.js"></script>
    <script src="/js/services/auth.services.js"></script>
    <script src="/js/services/info.services.js"></script>
    <script src="/js/services/pesan.services.js"></script>
    <script src="/js/controllers/info.controllers.js"></script>
    <script src="/libs/angular-locale_id-id.js"></script>

    <!-- Custom JS for this application -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.querySelector('.login-btn');
            const homeBtns = document.querySelectorAll('a.home-btn');
            const lowonganBtns = document.querySelectorAll('a.lowongan-btn');
            const tahapanBtns = document.querySelectorAll('a.tahapan-btn');
            const tentangBtns = document.querySelectorAll('a.tentang-btn');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');

            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Login form submitted');
                });
            }

            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Register form submitted');
                });
            }

            if (loginBtn) {
                loginBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = '/auth';
                });
            }

            // Navigasi ke #lowongan
            lowonganBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentPath = window.location.pathname;
                    if (currentPath === '/' || currentPath === '/index.html') {
                        const target = document.getElementById('lowongan');
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth'
                            });
                            history.replaceState(null, '', '/#lowongan');
                        }
                    } else {
                        window.location.href = '/#lowongan';
                    }
                });
            });

            // Navigasi ke #tahapan
            tahapanBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentPath = window.location.pathname;
                    if (currentPath === '/' || currentPath === '/index.html') {
                        const target = document.getElementById('tahapan');
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth'
                            });
                            history.replaceState(null, '', '/#tahapan');
                        }
                    } else {
                        window.location.href = '/#tahapan';
                    }
                });
            });

            tentangBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentPath = window.location.pathname;
                    if (currentPath === '/' || currentPath === '/index.html') {
                        const target = document.getElementById('tentang');
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth'
                            });
                            history.replaceState(null, '', '/#tentang');
                        }
                    } else {
                        window.location.href = '/#tentang';
                    }
                });
            });

            // Tombol Home - scroll ke atas
            homeBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const currentPath = window.location.pathname;
                    if (currentPath === '/' || currentPath === '/index.html') {
                        // Scroll ke atas langsung
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        // Redirect ke halaman utama, hash #hero digunakan untuk trigger scrollTo saat DOM ready
                        window.location.href = '/#hero';
                    }
                });
            });

            // Scroll otomatis ke atas jika redirect ke /#hero
            if (window.location.hash === '#hero') {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                // Kosongkan hash supaya tidak terulang jika user refresh
                history.replaceState(null, '', '/');
            }
        });
    </script>
</body>

</html>