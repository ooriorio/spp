<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

    <table width="100%" border="1px">
      <tr>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No Telpon</th>
        <th>Id Spp</th>
      </tr>

      <?php
      $no= 1;
      foreach ($siswa as $mhs): ?>

      <tr>
        <td><?php echo $mhs->nisn ?></td>
        <td><?php echo $mhs->nis ?></td>
        <td><?php echo $mhs->nama ?></td>
        <td><?php echo $mhs->id_kelas ?></td>
        <td><?php echo $mhs->alamat ?></td>
        <td><?php echo $mhs->no_telp ?></td>
        <td><?php echo $mhs->id_spp ?></td>

      </tr>

    <?php endforeach; ?>
  </table>

  </body>
  </html>