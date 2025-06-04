<?= $this->extend('layout/info') ?>
<?= $this->section('info') ?>
<main class="main" ng-controller="dashboardController">
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="hero-content" data-aos="fade-right" data-aos-delay="100">
                        <h1 class="hero-title">Temukan <span class="text-highlight">Karir Impian</span> Anda</h1>
                        <p class="hero-subtitle" data-aos="fade-right" data-aos-delay="200">
                            Bergabunglah dengan tim profesional kami dan kembangkan potensi terbaik Anda dalam lingkungan kerja yang dinamis dan mendukung.
                        </p>
                        <div class="hero-cta" data-aos="fade-up" data-aos-delay="300">
                            <a href="#lowongan" class="btn btn-primary btn-lg me-3 lowongan-btn">
                                Lihat Lowongan <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a href="#tahapan" class="btn btn-outline-primary btn-lg tahapan-btn">
                                Proses Rekrutmen
                            </a>
                        </div>
                        <div class="hero-features" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                                <span>Peluang Pengembangan Karir</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill text-primary"></i>
                                <span>Lingkungan Kerja Kolaboratif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0" data-aos="fade-left">
                    <div class="hero-image-container">
                        <img src="assets/img/shaking-hands.jpg" class="hero-image img-fluid rounded-3 shadow-lg" alt="Tim Profesional">
                        <div class="image-overlay"></div>
                        <div class="stats-card">
                            <div class="stats-item">
                                <h4>{{datas.lowongan.length}}</h4>
                                <p>Lowongan Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lowongan Section -->
    <section id="lowongan" class="lowongan-section">
        <div class="container" data-aos="fade-up">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">Peluang Karir Menanti</h2>
                <p class="section-subtitle">Temukan posisi yang sesuai dengan keahlian dan passion Anda</p>
            </div>

            <div class="row g-4">
                <!-- Lowongan 1 -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100" ng-repeat="item in datas.lowongan">
                    <div class="position-card">
                        <div class="position-badge">{{item.singkatan}}</div>
                        <div class="position-content">
                            <div class="position-header">
                                <h3>{{item.posisi}}</h3>
                                <span class="salary-range">{{item.perkiraan_gaji}}</span>
                            </div>
                            <p class="position-description">
                                {{item.pekerjaan}}
                            </p>
                            <div class="position-details">
                                <div class="detail-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{item.jenis_pekerjaan}}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-users"></i>
                                    <span>{{item.kuota}} orang</span>
                                </div>
                            </div>

                            <div class="position-footer">
                                <div class="deadline">
                                    <i class="bi bi-calendar-check"></i>
                                    <span>Dibuka dari {{item.tanggal_buka | date: 'd MMMM y'}} hingga 30 Juni 2023</span>
                                </div>
                                <a href="/detail/{{item.id_lowongan}}" class="apply-btn">
                                    Lihat Detail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lowongan 2 -->
            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                <a href="/rekrutmen" class="btn btn-outline-primary btn-lg">
                    Lihat Semua Lowongan <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <section id="tentang" class="pt-5 pb-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Tentang Kami</h2>
            </div>
            <p>Kami adalah perusahaan yang berkomitmen untuk menghubungkan talenta terbaik dengan peluang karir ideal.</p>
            <!-- Bisa tambah isi tentang visi, misi, sejarah perusahaan dll -->
        </div>
    </section>
    <!-- Tahapan Rekrutmen Section -->
    <section id="tahapan" class="tahapan section py-5 bg-light">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Tahapan Rekrutmen</h2>
                <p class="text-muted">Proses seleksi yang akan dilalui oleh pelamar</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-{{12/datas.tahapan.length}} col-md-6" data-aos="fade-up" data-aos-delay="100" ng-repeat="item in datas.tahapan">
                    <div class="tahapan-box p-4 text-center shadow-sm rounded bg-white h-100 transition">
                        <div class="tahapan-icon mb-3 text-primary fs-2">
                            <i class="{{item.icon}}"></i>
                        </div>
                        <h5 class="fw-semibold mb-2">{{item.nama_tahapan}}</h5>
                        <p class="text-muted">{{item.keterangan}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
<?= $this->endSection() ?>