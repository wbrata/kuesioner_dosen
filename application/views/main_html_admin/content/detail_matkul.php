<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Detail Matkul</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Dosen</th>
            <th>Mata Kuliah</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataMatkul->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataMatkul->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['nama_dosen']?></td>
                  <td><?=$row['matkul']?></td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
