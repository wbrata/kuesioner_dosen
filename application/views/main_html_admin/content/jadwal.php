<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Jadwal</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataKelas->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataKelas->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['nama_kelas']?></td>
                  <td>
                    <a href="<?=base_url('admin/index/jadwal_kelas/'.sha1($row['kd_kelas']))?>" class="btn btn-sm btn-success">Data Mata Kuliah</a>
                  </td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>