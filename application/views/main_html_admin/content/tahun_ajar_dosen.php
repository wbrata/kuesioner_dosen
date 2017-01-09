<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Tahun Ajaran</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Tahun Ajaran</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataTahunAjaran->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataTahunAjaran->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['tahun_ajaran']?></td>
                  <td>
                    <a class="btn btn-sm btn-success"  data-toggle="modal" data-target=".bs-update-modal-md" onclick="showDialogDetail('<?=$row['kd_dosen']?>', '<?=$row['tahun_ajaran']?>')">Detail Mata Kuliah</a>
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
    <!-- modals detail -->
    <div class="modal fade bs-update-modal-md" id="modalDetail" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Detail Matakuliah</h4>
          </div>
          <div class="modal-body" id="contentDetail">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals detail-->
    <script type="text/javascript">
      function showDialogDetail(kode_dosen, tahun_ajaran){
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/detail_tahun_ajar')?>/'+kode_dosen+'/'+tahun_ajaran,
            data: $('form').serialize(),
            success: function (i) {
              document.getElementById("contentDetail").innerHTML = i;
            }
          });
      }
      </script>