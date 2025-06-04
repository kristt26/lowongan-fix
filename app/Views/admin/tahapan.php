<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="tahapanController">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Tahapan</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" ng-submit="save()">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama_tahapan">Nama Tahapan</label>
                                        <input type="text" id="nama_tahapan" ng-model="model.nama_tahapan"
                                            class="form-control" name="fname"
                                            placeholder="Nama Tahapan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_tahapan">Status</label>
                                        <select class="form-select" id="basicSelect" ng-model="model.status" required>
                                            <option value="">--- Pilih status ---</option>
                                            <option value="0">Tidak Aktif</option>
                                            <option value="1">Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="text" id="icon" ng-model="model.icon"
                                            class="form-control" name="fname"
                                            placeholder="ex. fas fa-file-alt">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Deskripsi Tahapan</label>
                                        <textarea id="keterangan" ng-model="model.keterangan" class="form-control"
                                            placeholder="Deskripsikan Tahapan" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset"
                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Bidang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                    <th>Desc</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_tahapan}}</td>
                                    <td>{{item.keterangan}}</td>
                                    <td>{{item.status == '0' ? 'Tidak Aktif' : 'Aktif'}}</td>
                                    <td width="15%">
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
</div>
<?= $this->endSection() ?>