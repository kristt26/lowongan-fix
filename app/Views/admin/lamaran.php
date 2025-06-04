<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div ng-controller="lamaranController">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation" ng-repeat="item in datas.tahapan">
                            <a class="nav-link" ng-class="{'active': $index==0}" id="tabs-{{item.id_tahapan}}" data-bs-toggle="tab" href="#tab{{item.id_tahapan}}"
                                role="tab" aria-controls="tab{{item.id_tahapan}}" aria-selected="true">{{item.nama_tahapan}}</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="diterima-tab" data-bs-toggle="tab" href="#diterima"
                                role="tab" aria-controls="diterima" aria-selected="false">Diterima</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ditolak-tab" data-bs-toggle="tab" href="#ditolak"
                                role="tab" aria-controls="ditolak" aria-selected="false">Ditolak</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div ng-repeat="item in datas.tahapan" ng-init="parentIndex = $index" class="tab-pane fade" ng-class="{'show active': $index==0}" id="tab{{item.id_tahapan}}" role="tabpanel"
                            aria-labelledby="tabs-{{item.id_tahapan}}">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang</th>
                                            <th>Posisi</th>
                                            <th>Nama Pelamar</th>
                                            <th>Telepon</th>
                                            <th>Berkas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="lamr in datas.lamaran" ng-if="lamr.id_detail_tahapan == item.id_detail_tahapan && lamr.status == 'Seleksi'">
                                            <td>{{$index+1}}</td>
                                            <td>{{lamr.nama_bidang}}</td>
                                            <td>{{lamr.posisi}}</td>
                                            <td>{{lamr.nama_pelamar}}</td>
                                            <td>{{lamr.telepon}}</td>
                                            <td>
                                                <ul>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.foto}}" target="_blank">Foto</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ktp}}" target="_blank">KTP</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.kk}}" target="_blank">Kartu Keluarga</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ijazah}}" target="_blank">Ijazah</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.skck}}" target="_blank">SKCK</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.cv}}" target="_blank">CV</a></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" ng-click="check(lamr.id_lamaran, item.urutan, 'setuju', (parentIndex+1)==datas.tahapan.length ? 'Diterima' : null)"><i class="fas fa-check"></i></button>
                                                <button type="button" class="btn btn-danger" ng-click="check(lamr.id_lamaran, item.urutan, 'batal', 'Ditolak')"><i class="fas fa-times"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="diterima" role="tabpanel"
                            aria-labelledby="diterima-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang</th>
                                            <th>Posisi</th>
                                            <th>Nama Pelamar</th>
                                            <th>Telepon</th>
                                            <th>Berkas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-info" ng-repeat="lamr in datas.lamaran" ng-if="lamr.status == 'Diterima'">
                                            <td>{{$index+1}}</td>
                                            <td>{{lamr.nama_bidang}}</td>
                                            <td>{{lamr.posisi}}</td>
                                            <td>{{lamr.nama_pelamar}}</td>
                                            <td>{{lamr.telepon}}</td>
                                            <td>
                                                <ul>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.foto}}" target="_blank">Foto</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ktp}}" target="_blank">KTP</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.kk}}" target="_blank">Kartu Keluarga</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ijazah}}" target="_blank">Ijazah</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.skck}}" target="_blank">SKCK</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.cv}}" target="_blank">CV</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ditolak" role="tabpanel"
                            aria-labelledby="ditolak-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bidang</th>
                                            <th>Posisi</th>
                                            <th>Nama Pelamar</th>
                                            <th>Telepon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-warning" ng-repeat="lamr in datas.lamaran" ng-if="lamr.status == 'Ditolak'">
                                            <td>{{$index+1}}</td>
                                            <td>{{lamr.nama_bidang}}</td>
                                            <td>{{lamr.posisi}}</td>
                                            <td>{{lamr.nama_pelamar}}</td>
                                            <td>{{lamr.telepon}}</td>
                                            <td>
                                                <ul>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.foto}}" target="_blank">Foto</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ktp}}" target="_blank">KTP</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.kk}}" target="_blank">Kartu Keluarga</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.ijazah}}" target="_blank">Ijazah</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.skck}}" target="_blank">SKCK</a></li>
                                                    <li><a ng-href="assets/berkas/{{lamr.pelamar.cv}}" target="_blank">CV</a></li>
                                                </ul>
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
    </div>
</div>
<?= $this->endSection() ?>