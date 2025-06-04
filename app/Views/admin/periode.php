<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="periodeController" ng-cloak>
    <div class="row" ng-if="tampil == 'periode'">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Periode</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" ng-submit="save()">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="periode">Periode Penerimaan</label>
                                        <input type="text" id="periode" ng-model="model.periode"
                                            class="form-control" name="fname"
                                            placeholder="Periode Penerimaan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_tahapan">Status</label>
                                        <select class="form-select" id="basicSelect" ng-model="model.status" required>
                                            <option value="">--- Pilih status ---</option>
                                            <option value="0">Tidak Aktif</option>
                                            <option value="1">Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="item in datas">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.periode}}</td>
                                    <td>{{item.status == '0' ? 'Tidak Aktif' : 'Aktif'}}</td>
                                    <td width="30%">
                                        <button type="button" class="btn btn-primary" ng-click="edit(item)"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" ng-click="delete(item)"><i class="fas fa-trash"></i></button>
                                        <button type="button" class="btn btn-info" ng-click="setTampilan(item)"><i class="fas fa-tools"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" ng-if="tampil == 'tahapan'">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4">
                        <button class="btn btn-secondary btn-sm float-right" ng-click="kembali()">Kembali</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahapan</th>
                                    <th>Urutan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody  ui-sortable="sortableOptions" ng-model="tahapan.tahapan">
                                <tr ng-repeat="item in tahapan.tahapan track by item.id_detail_tahapan">
                                    <td>{{$index+1}}</td>
                                    <td>{{item.nama_tahapan}}</td>
                                    <td>{{$index+1}}</td>
                                    <td width="10%">
                                        <button type="button" class="btn btn-danger" ng-click="delete(item)"><i class="fas fa-trash"></i></button>
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