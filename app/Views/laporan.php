<?= $this->extend('layout/layout') ?>
<?= $this->section('content') ?>
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Laporan Penerimaan</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 no-print d-flex justify-content-end">
                        <a href="<?= site_url('laporan/export-excel') ?>" class="btn btn-success btn-sm mr-2">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="<?= site_url('laporan/cetak') ?>" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fas fa-print"></i> Cetak Laporan
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang</th>
                                    <th>Posisi</th>
                                    <th>Pekerjaan</th>
                                    <th>Nama Pelamar</th>
                                    <th>Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $item): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item->nama_bidang ?></td>
                                        <td><?= $item->posisi ?></td>
                                        <td><?= $item->pekerjaan ?></td>
                                        <td><?= $item->nama_pelamar ?></td>
                                        <td><?= $item->telepon ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        .table-responsive,
        .table-responsive * {
            visibility: visible;
        }

        .table-responsive {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .table th,
        .table td {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .no-print {
            display: none !important;
        }
    }
</style>

<?= $this->endSection() ?>