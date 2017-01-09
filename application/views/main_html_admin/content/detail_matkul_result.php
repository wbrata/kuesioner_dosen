<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Detail Hasil Kuesioner</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Mata Kuliah</th>
            <th>Nilai Kuesioner</th>
          </tr>
        </thead>
        <tbody>
          <?php if($detailTahunAjar->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($detailTahunAjar->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['matkul']?></td>
                  <td><?=$row['total']?></td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>