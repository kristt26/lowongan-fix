<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="bidangController">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Bidang</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" ng-submit="save()">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama_bidang">Nama Bidang</label>
                                        <input type="text" id="nama_bidang" ng-model="model.nama_bidang"
                                            class="form-control" name="fname"
                                            placeholder="Nama Bidang" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="singkatan">Singkatan</label>
                                        <input type="text" id="singkatan" ng-model="model.singkatan"
                                            class="form-control" name="fname"
                                            placeholder="Singkatan" required>
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
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                    <th>Singkatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_bidang}}</td>
                                    <td>{{item.singkatan}}</td>
                                    <td width="20%">
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