<?= $this->extend('layout/info') ?>
<?= $this->section('info') ?>
<div ng-controller="rekrutmenController">
    <section class="jobs-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Temukan Pekerjaan Impian Anda</h1>
            <p class="lead">Bergabunglah dengan tim profesional kami dan kembangkan karir Anda</p>
        </div>
    </section>
    <main class="container my-5">
        <div class="row">
            <!-- Job Listings -->
            <div class="col-12">
                <div class="row g-4">
                    <!-- Job Card 1 -->
                    <div class="col-md-6 col-lg-4" ng-repeat="item in datas">
                        <div class="job-card card h-100">
                            <div class="card-body position-relative">
                                <span class="job-category">{{item.singkatan}}</span>
                                <h3 class="h5 card-title">{{item.posisi}}</h3>
                                <p class="card-text">{{item.pekerjaan}}</p>

                                <div class="mb-3">
                                    <span class="job-type"><i class="bi bi-briefcase me-1"></i> {{item.jenis_pekerjaan}}</span>
                                    <span class="job-type"><i class="bi bi-people me-1"></i> {{item.kuota}} orang</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="job-salary">{{item.perkiraan_gaji}}</span>
                                    <span class="job-deadline"><i class="bi bi-clock me-1"></i>Hingga: {{item.tanggal_tutup | date: 'd MMM y'}}</span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0 text-end">
                                <a href="/detail/{{item.id_lowongan}}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
            </div>
        </div>
    </main>
</div>

<style>
    :root {
        --primary-color: #1977cc;
        --secondary-color: #2c3e50;
    }

    .jobs-hero {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        padding: 5rem 0;
        margin-bottom: 2rem;
    }

    .job-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        border-left: 4px solid var(--primary-color);
    }

    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .job-category {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: var(--primary-color);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .job-type {
        display: inline-flex;
        align-items: center;
        background: rgba(25, 119, 204, 0.1);
        color: var(--primary-color);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .job-salary {
        color: #28a745;
        font-weight: 600;
    }

    .job-deadline {
        color: #dc3545;
        font-size: 0.85rem;
    }

    .search-box {
        position: relative;
        margin-bottom: 2rem;
    }

    .search-box input {
        padding-left: 3rem;
        border-radius: 50px;
        border: 1px solid #dee2e6;
    }

    .search-box i {
        position: absolute;
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .filter-btn {
        border-radius: 50px;
        padding: 0.5rem 1.25rem;
    }
</style>
<?= $this->endSection() ?>