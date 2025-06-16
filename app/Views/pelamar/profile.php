<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="profileController" ng-cloak>
    <form ng-submit="save()" enctype="multipart/form-data">
        <div class="row">
            <!-- Bagian Profil -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profil Pelamar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <!-- Kolom 1: Foto -->
                            <div class="col-md-3 text-center">
                                <img ng-show="model.foto && !model.berkas_foto" ng-src="/assets/berkas/{{model.foto}}"
                                    class="img-fluid rounded mb-2" alt="Foto Pelamar" width="230px">
                                <img ng-show="!model.foto && !model.berkas_foto" src="/assets/img/profile.png"
                                    class="img-fluid rounded mb-2" alt="Foto Pelamar" width="230px">
                                <img ng-show="model.berkas_foto" data-ng-src="data:{{model.berkas_foto.filetype}};base64,{{model.berkas_foto.base64}}"
                                    class="img-fluid rounded mb-2" alt="Foto Pelamar" width="230px">
                                <input type="file" class="form-control mb-3" accept="image/*"
                                    ng-model="model.berkas_foto" base-sixty-four-input>
                            </div>

                            <!-- Kolom 2: Biodata -->
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" ng-model="model.nik">
                                </div>
                                <div class="mb-2">
                                    <label>Nama Pelamar</label>
                                    <input type="text" class="form-control" ng-model="model.nama_pelamar">
                                </div>
                                <div class="mb-2">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" ng-model="model.telepon">
                                </div>
                                <div class="mb-2">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" ng-model="model.tempat_lahir">
                                </div>
                            </div>

                            <!-- Kolom 3: Alamat & Tanggal -->
                            <div class="col-md-5">
                                <div class="mb-2">
                                    <label>Alamat</label>
                                    <textarea class="form-control" ng-model="model.alamat" rows="4"></textarea>
                                </div>
                                <div class="mb-2">
                                    <label>Email</label>
                                    <input type="email" class="form-control" ng-model="model.email">
                                </div>
                                <div class="mb-2">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" ng-model="model.tanggal_lahir">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Berkas -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload Berkas Kelengkapan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Berkas KTP</label>
                                <p>
                                    <a ng-show="model.ktp" ng-href="assets/berkas/{{model.ktp}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat Berkas KTP
                                    </a>
                                    <button ng-show = "!model.ktp" disabled class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Berkas tidak ada
                                    </button>
                                </p>
                                <input type="file" class="form-control" ng-model="model.berkas_ktp" accept="image/*,application/pdf" base-sixty-four-input>
                            </div>
                            <div class="col-md-6">
                                <label>Berkas KK</label>
                                 <p>
                                    <a ng-show="model.kk" ng-href="assets/berkas/{{model.kk}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat Berkas KK
                                    </a>
                                    <button ng-show = "!model.kk" disabled class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Berkas tidak ada
                                    </button>
                                </p>
                                <input type="file" class="form-control" ng-model="model.berkas_kk" accept="image/*,application/pdf" base-sixty-four-input>
                            </div>
                            <div class="col-md-6">
                                <label>Berkas Ijazah</label>
                                 <p>
                                    <a ng-show="model.ijazah" ng-href="assets/berkas/{{model.ijazah}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat Berkas Ijazah
                                    </a>
                                    <button ng-show = "!model.ijazah" disabled class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Berkas tidak ada
                                    </button>
                                </p>
                                <input type="file" class="form-control" ng-model="model.berkas_ijazah" accept="image/*,application/pdf" base-sixty-four-input>
                            </div>
                            <div class="col-md-6">
                                <label>Berkas SKCK</label>
                                 <p>
                                    <a ng-show="model.skck" ng-href="assets/berkas/{{model.skck}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat Berkas SKCK
                                    </a>
                                    <button ng-show = "!model.skck" disabled class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Berkas tidak ada
                                    </button>
                                </p>
                                <input type="file" class="form-control" ng-model="model.berkas_skck" accept="image/*,application/pdf" base-sixty-four-input>
                            </div>
                            <div class="col-md-6">
                                <label>Berkas CV</label>
                                 <p>
                                    <a  ng-show = "model.cv" ng-href="assets/berkas/{{model.cv}}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Lihat Berkas CV
                                    </a>
                                    <button ng-show = "!model.cv" disabled class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-file-earmark"></i> Berkas tidak ada
                                    </button>
                                </p>
                                <input type="file" class="form-control" ng-model="model.berkas_cv" accept="image/*,application/pdf" base-sixty-four-input>
                            </div>
                        </div>

                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-success">Upload Berkas</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>