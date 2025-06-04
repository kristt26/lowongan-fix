<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="lowonganController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary block"
                        data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                    <th>Posisi</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Pekerjaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas.lowongan">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_bidang}}</td>
                                    <td>{{item.posisi}}</td>
                                    <td>{{item.tanggal_buka | date: 'd-MM-y'}} s/d {{item.tanggal_tutup | date: 'd-MM-y'}}</td>
                                    <td>{{item.jenis_pekerjaan}}</td>
                                    <td>{{item.pekerjaan}}</td>
                                    <td width="10%">
                                        <button type="button" class="btn btn-primary btn-sm" ng-click="edit(item)"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" ng-click="delete(item)"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4">{{model.id_lowongan ? 'Ubah data lowongan' : 'Tambah data lowongan'}}
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form class="form form-horizontal" ng-submit="save()">
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bidang">Bidang/Bagian</label>
                                        <select class="form-select" id="basicSelect" ng-options="item as item.nama_bidang for item in datas.bidang" ng-model="bidang" ng-change="model.id_bidang=bidang.id_bidang; model.nama_bidang=bidang.nama_bidang;" required>
                                            <option value="">--- Pilih bidang/bagian ---</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="posisi">Posisi</label>
                                        <input type="text" id="posisi" ng-model="model.posisi"
                                            class="form-control" name="fname"
                                            placeholder="posisi Penerimaan" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                        <select id="jenis_pekerjaan" ng-model="model.jenis_pekerjaan" class="form-select" required>
                                            <option value="">--- Pilih Jenis Pekerjaan ---</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Kontrak">Kontrak</option>
                                            <option value="Magang">Magang</option>
                                            <option value="Freelance">Freelance</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="kuota">Kuota</label>
                                        <input type="number" id="kuota" ng-model="model.kuota"
                                            class="form-control" name="fname"
                                            placeholder="kuota Penerimaan" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="perkiraan_gaji">Perkiraan Gaji</label>
                                        <input type="text" id="perkiraan_gaji" ng-model="model.perkiraan_gaji"
                                            class="form-control" placeholder="Masukkan perkiraan gaji"required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="tanggal_buka">Tanggal Buka Pendaftaran</label>
                                        <input type="date" id="tanggal_buka" ng-model="model.tanggal_buka"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="tanggal_tutup">Tanggal Tutup Pendaftaran</label>
                                        <input type="date" id="tanggal_tutup" ng-model="model.tanggal_tutup"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="pekerjaan">Deskripsi Pekerjaan</label>
                                        <textarea id="pekerjaan" ng-model="model.pekerjaan" class="form-control"
                                            placeholder="Deskripsikan pekerjaan" rows="2" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="keterangan">Tambahkan Keterangan</label>
                                        <textarea name="" id="keterangan"
                                            class="form-control"
                                            placeholder="Keterangan"
                                            ng-model="model.desc"
                                            ng-required="isKeteranganVisible"
                                            ng-show="isKeteranganVisible"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: '#keterangan',
            menubar: false,
            plugins: 'lists link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | code',
            height: 400, // <-- atur tinggi di sini
            setup: function(editor) {
                editor.on('Change KeyUp', function() {
                    // Sinkronisasi manual isi editor ke ng-model
                    const scope = angular.element(document.getElementById('keterangan')).scope();
                    scope.$apply(function() {
                        scope.model.desc = editor.getContent();
                    });
                });
            }
        });
    });
</script>
<style>
    .modal-dialog-scrollable {
        max-height: 90vh;
        /* maksimal tinggi modal 90% viewport */
    }

    .modal-body {
        overflow-y: auto;
        max-height: calc(90vh - 120px);
        /* kurangi tinggi header + footer */
    }
</style>
<?= $this->endSection() ?>