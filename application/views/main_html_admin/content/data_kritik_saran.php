<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Kritik Dan Saran</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
            <th>Dosen Tujuan</th>
            <th>Dosen Favorit</th>
            <th>Kritik dan Saran Dosen</th>
            <th>Kritik dan Saran BAK</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataKritik->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataKritik->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['nim']?></td>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['nama_dosen']?></td>
                  <td><?=$row['dosen_favorit']?></td>
                  <td><?=$row['kritiksarandosen']?></td>
                  <td><?=$row['kritiksaranoffice']?></td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>