<!DOCTYPE html>
<html lang="en" ng-app="apps" ng-controller="indexController" ng-cloak>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Lowongan</title>

    <link rel="stylesheet" href="/assets/vendors/fontawesome/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <h5>PT. BIG</h5>
                            <!-- <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a> -->
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="/beranda" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if (session()->get('role') == 'Admin') : ?>
                            <li class="sidebar-item">
                                <a href="/bidang" class='sidebar-link'>
                                    <i class="bi bi-diagram-3-fill"></i>
                                    <span>Bidang</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/tahapan" class='sidebar-link'>
                                    <i class="bi bi-flag-fill"></i> <!-- Tahapan -->
                                    <span>Tahapan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/periode" class='sidebar-link'>
                                    <i class="bi bi-calendar-range-fill"></i> <!-- Periode -->
                                    <span>Periode</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/lowongan" class='sidebar-link'>
                                    <i class="bi bi-briefcase-fill"></i> <!-- Lowongan Pekerjaan -->
                                    <span>Lowongan Pekerjaan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/lamaran" class='sidebar-link'>
                                    <i class="bi bi-envelope-fill"></i> <!-- Pengajuan Pekerjaan -->
                                    <span>Pengajuan Pekerjaan</span>
                                </a>
                            </li>
                            <!-- <li class="sidebar-item">
                                <a href="/diterima" class='sidebar-link'>
                                    <i class="bi bi-person-check-fill"></i>
                                    <span>Daftar Diterima</span>
                                </a>
                            </li> -->
                        <?php endif ?>

                        <?php if (session()->get('role') == 'Pelamar') : ?>
                            <li class="sidebar-item">
                                <a href="/lowongan" class="sidebar-link">
                                    <i class="bi bi-briefcase-fill"></i> <!-- Ikon untuk pekerjaan -->
                                    <span>Lamaran Pekerjaan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/lamaran" class="sidebar-link">
                                    <i class="bi bi-file-earmark-person-fill"></i> <!-- Ikon untuk lamaran pribadi -->
                                    <span>Lamaran Saya</span>
                                </a>
                            </li>

                        <?php endif ?>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light " style="padding-bottom: 0px !important;">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= session()->get('nama') ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= session()->get('role') ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= session()->get('nama') ?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="/profile"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/auth/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h4>{{header}}</h4>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <?= $this->renderSection('content') ?>

                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/vendors/jquery/jquery-3.3.1.js"></script>
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/main.js"></script>

    <script src="/js/apps.js"></script>
    <script src="/libs/angular/angular-sanitize.min.js"></script>
    <script src="/libs/angular/angular-ui-router.min.js"></script>
    <script src="/libs/angular/angular-animate.min.js"></script>
    <!-- <script src="/js/apps.js"></script> -->
    <script src="/js/services/helper.services.js"></script>
    <script src="/js/services/auth.services.js"></script>
    <script src="/js/services/admin.services.js"></script>
    <script src="/js/services/pesan.services.js"></script>
    <script src="/js/controllers/admin.controllers.js"></script>
    <script src="/libs/angular-ui-select2/src/select2.js"></script>
    <script src="/libs/angular-datatables/dist/angular-datatables.js"></script>
    <script src="/libs/angular-locale_id-id.js"></script>
    <script src="/libs/input-mask/angular-input-masks-standalone.min.js"></script>
    <script src="/libs/jquery.PrintArea.js"></script>
    <script src="/libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
    <script src="/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/libs/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="/libs/datatables/btn.js"></script>
    <script src="/libs/datatables/print.js"></script>
    <script src="/libs/loading/dist/loadingoverlay.min.js"></script>
    <script src="/libs/angularjs-currency-input-mask/dist/angularjs-currency-input-mask.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <!-- Tambahkan JS Select2 -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> -->
    <script src="/libs/select2/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/rv9fpjih10cz06opokn2wzy9zina5xksqeku4a1vitllucut/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-sortable/0.19.0/sortable.min.js"></script>
    <script src="/assets/vendors/fontawesome/all.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/rv9fpjih10cz06opokn2wzy9zina5xksqeku4a1vitllucut/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</body>

</html>