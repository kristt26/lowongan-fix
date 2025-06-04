<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div class="container py-4" ng-controller="daftarLowonganController">
    <div class="row g-4">
        <div class="col-md-6 col-lg-4" ng-repeat="item in datas.lowongan">
            <div class="job-card card h-100">
                <div class="card-body position-relative">
                    <span class="job-category bg-primary text-white px-2 py-1 rounded small">
                        {{ item.nama_bidang }}
                    </span>
                    <h3 class="h5 card-title mt-2">{{ item.posisi }}</h3>
                    <p class="card-text">
                        {{ item.deskripsi }}
                    </p>

                    <div class="mb-3">
                        <span class="job-type me-2">
                            <i class="bi bi-briefcase me-1"></i> {{ item.jenis_pekerjaan }}
                        </span>
                        <span class="job-type">
                            <i class="bi bi-people me-1"></i> {{ item.kuota }} orang
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="job-salary">
                            {{ item.perkiraan_gaji}}
                        </span>
                        <span class="job-deadline">
                            <i class="bi bi-clock me-1"></i> {{ item.tanggal_tutup | date:'dd MMM yyyy' }}
                        </span>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <button class="btn btn-sm btn-outline-primary" ng-click="lamar(item)">
                        Daftar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>