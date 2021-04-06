<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pembayaran</title>
</head>
<body>

    <p>Laporan Pembayaran Siswa. Ini Merupakan Bukti Laporan Pembayaran. Silahkan Print sebagai Bukti kepada bagian keuangan sekolah</p>
    <table width="100%" border="1px">
      <tr>
        <th>Id Pembayaran</th>
        <th>Id Petugas</th>
        <th>NISN</th>
        <th>Tanggal Bayar</th>
        <th>bulan Bayar</th>
        <th>Tahun Bayar</th>
        <th>Id SPP</th>
        <th>jumlah bayar</th>
      </tr>

      <?php
      $no= 1;
      foreach ($transaksi as $mhs):
        $no++;
        ?>

      <tr>
        <td><?php echo $mhs->id_pembayaran; ?></td>
        <td><?php echo $mhs->id_petugas; ?></td>
        <td><?php echo $mhs->nisn; ?></td>
        <td><?php echo $mhs->tgl_bayar; ?></td>
        <td><?php echo $mhs->bulan_dibayar; ?></td>
        <td><?php echo $mhs->tahun_dibayar;?></td>
        <td><?php echo $mhs->id_spp;?></td>
        <td><?php echo $mhs->jumlah_bayar;?></td>

      </tr>

    <?php endforeach; ?>
  </table>

  </body>
  </html>