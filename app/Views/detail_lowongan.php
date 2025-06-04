<?= $this->extend('layout/info') ?>
<?= $this->section('info') ?>
<div ng-controller="detailController">
    <section class="job-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">{{datas.detail.posisi}}</h1>
                    <div class="d-flex flex-wrap gap-3 mb-4">
                        <span class="badge bg-light text-dark"><i class="bi bi-building me-1"></i> {{datas.detail.nama_bidang}}</span>
                        <span class="badge bg-light text-dark"><i class="bi bi-people me-1"></i> {{datas.detail.kuota}} orang</span>
                        <span class="badge bg-light text-dark"><i class="bi bi-briefcase me-1"></i> {{datas.detail.jenis_pekerjaan}}</span>
                        <span class="badge bg-light text-dark"><i class="bi bi-cash me-1"></i> {{datas.detail.perkiraan_gaji}}</span>
                    </div>
                    <a href="/auth" class="btn btn-light job-apply-btn">Lamar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Content -->
    <main class="main">
        <div class="container">
            <div class="row">
                <!-- Main Job Content -->
                <div class="col-lg-8">
                    <div class="card job-detail-card mb-4">
                        <div class="card-body">
                            <h3 class="card-title mb-4">{{datas.detail.posisi}}</h3>
                            <p>{{datas.detail.pekerjaan}}</p>

                            <div class="mt-3" ng-bind-html="datas.detail.desc"></div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Ringkasan Lowongan</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-calendar me-2"></i>Dibuka</span>
                                    <span>{{datas.detail.tanggal_buka | date: 'd MMMM y'}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-calendar-x me-2"></i>Ditutup</span>
                                    <span>{{datas.detail.tanggal_tutup | date: 'd MMMM y'}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-briefcase me-2"></i>Jenis</span>
                                    <span>{{datas.detail.jenis_pekerjaan}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-people me-2"></i>Kuota</span>
                                    <span>{{datas.detail.kuota}} orang</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Lowongan Serupa</h4>
                            <div class="similar-job mb-3" ng-repeat="item in datas.lowongan" ng-if="item.id_lowongan != datas.detail.id_lowongan">
                                <h5><a href="/detail/{{item.id_lowongan}}">{{item.posisi}}</a></h5>
                                <p class="text-muted small mb-1">{{item.nama_bidang}} • {{item.jenis_pekerjaan}}</p>
                                <p class="small">{{item.kuota}} orang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<style>
    .job-header {
        background: linear-gradient(135deg, #1977cc 0%, #2c3e50 100%);
        color: white;
        padding: 60px 0 40px;
        margin-bottom: 40px;
    }

    .job-apply-btn {
        font-size: 1.1rem;
        padding: 10px 25px;
    }

    .job-detail-card {
        border-left: 4px solid #1977cc;
    }

    .requirements-list li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
    }

    .requirements-list li:before {
        content: "•";
        color: #1977cc;
        font-size: 1.5rem;
        position: absolute;
        left: 0;
        top: -5px;
    }

    .company-info-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
    }
</style>
<?= $this->endSection() ?>