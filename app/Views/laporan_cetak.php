<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Laporan Penerimaan</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table th, table td {
      border: 1px solid #000;
      padding: 8px;
      text-align: left;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    @media print {
      @page {
        size: A4;
        margin: 20mm;
      }
    }
  </style>
</head>
<body onload="window.print()">
  <h2>Laporan Penerimaan</h2>
  <table>
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
</body>
</html>
