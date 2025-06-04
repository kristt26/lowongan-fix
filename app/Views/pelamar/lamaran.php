<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="lamaranSayaController">
    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4" ng-repeat="item in datas">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{item.nama_posisi}}</h5>
                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-diagram-3 me-1"></i> {{item.nama_bidang}}
                        </p>
                        <p class="card-text">
                            <i class="bi bi-calendar me-1"></i>
                            Tanggal Lamar: {{item.tanggal_lamar | date:'dd MMM yyyy'}}
                        </p>
                        <p class="card-text">
                            <i class="{{item.icon}}"></i>
                            Tahapan: {{item.nama_tahapan}}
                        </p>
                        <p class="card-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Status:
                            <span class="badge" ng-class="{
                  'bg-secondary': item.status === 'Seleksi',
                  'bg-success': item.status === 'Diterima',
                  'bg-danger': item.status === 'Ditolak'
                }">
                                {{item.status}}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4" ng-if="datas.length == 0">
            Anda belum memiliki lamaran pekerjaan.
        </div>
    </div>
</div>
<?= $this->endSection() ?>