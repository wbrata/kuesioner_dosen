<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Pertanyaan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-create-modal-md" onclick="showCreateDialog('<?=$dataPertanyaan->num_rows()?>')">Tambah Data</a>

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Pertanyaan</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataPertanyaan->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataPertanyaan->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['pertanyaan']?></td>
                  <td><?=$row['nilai']?></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" onclick="showDialogUpdate('<?=$row['kd_pertanyaan']?>', this)">Ubah</a>
                    <a href="#" class="btn btn-sm btn-danger"  data-toggle="modal" data-target=".bs-delete-modal-sm"  onclick="showDialogDelete('<?=sha1($row['kd_pertanyaan'])?>', this)">Hapus</a>
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
    <!-- modals create -->
    <div class="modal fade bs-create-modal-md" id="modalcreate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formcreatepertanyaan" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Data Matkul</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pertanyaan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="pertanyaan_create" required="required" class="form-control col-md-7 col-xs-12" name="pertanyaan">
                  <input type="hidden" id="row_create" required="required" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nilai_create" required="required" class="form-control col-md-7 col-xs-12" name="nilai">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="save">Simpan Perubahan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- /modals create-->
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formupdatepertanyaan" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Data Matkul</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pertanyaan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="pertanyaan" required="required" class="form-control col-md-7 col-xs-12" name="pertanyaan">
                  <input type="hidden" id="kd" required="required" class="form-control col-md-7 col-xs-12" name="kd_pertanyaan">
                  <input type="hidden" id="row" required="required" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nilai" required="required" class="form-control col-md-7 col-xs-12" name="nilai">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="save">Simpan Perubahan</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    <!-- /modals update-->
    <!-- modal hapus -->
    <div class="modal fade bs-delete-modal-sm" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Hapus Pertanyaan?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a type="button" class="btn btn-danger" id="yDel">Ya</a>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals hapus -->
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i;
      }
      function showDialogUpdate(id, r){
          var iRow = r.parentNode.parentNode.rowIndex;
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_get/pertanyaan')?>/'+id,
            data: $('form').serialize(),
            success: function (i) {
              var jsonObjectParse = JSON.parse(i);
              var jsonObjectStringify = JSON.stringify(jsonObjectParse);
              var jsonObjectFinal = JSON.parse(jsonObjectStringify);
              document.getElementById("row").value=iRow;
              document.getElementById("kd").value=jsonObjectFinal.kd_pertanyaan;
              document.getElementById("pertanyaan").value=jsonObjectFinal.pertanyaan;
              document.getElementById("nilai").value=jsonObjectFinal.nilai;
            }
          });
      }
      function showCreateDialog(row){
        document.getElementById("row_create").value=row;
      }
      $(document).ready(function(){
        $('#formcreatepertanyaan').on('submit', function(e){
          var table = document.getElementById('datatable');
          var rowCreate = document.getElementById('row_create').value;
          var pertanyaanCreate = document.getElementById('pertanyaan_create').value;
          var nilaiCreate = document.getElementById('nilai_create').value;
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_pertanyaan/create')?>',
            data: $('#formcreatepertanyaan').serialize(),
            success: function (i) {
              if(i == 'true'){
                var row = table.insertRow(1);
                var cellNumber = row.insertCell(0);
                var cellName = row.insertCell(1);
                var cellNilai = row.insertCell(2);
                var cellAksi = row.insertCell(3);
                cellNumber.innerHTML = rowCreate + 1;
                cellAksi.innerHTML = '';
                cellName.innerHTML = pertanyaanCreate;
                cellNilai.innerHTML = nilaiCreate;
                new PNotify({
                                    title: 'Create Success',
                                    text: 'Create Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalcreate').modal('hide');
              }else{
                new PNotify({
                                  title: 'Create Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
        $('#formupdatepertanyaan').on('submit', function(e){
          var table = document.getElementById("datatable")
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_pertanyaan/update')?>',
            data: $('#formupdatepertanyaan').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[1].innerHTML = document.getElementById("pertanyaan").value;
                row.cells[2].innerHTML = document.getElementById("nilai").value;
                new PNotify({
                                    title: 'Update Success',
                                    text: 'Update Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalUpdate').modal('hide');
              }else{
                new PNotify({
                                  title: 'Update Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
        $('#yDel').on('click', function(e){
          var value = document.getElementById("yDel").getAttribute("href");
          var temp = new Array();
          temp = value.split("beni");
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_pertanyaan/delete')?>/'+temp[0],
            data: $('form').serialize(),
            success: function (i) {
              if(i == 'true'){
                document.getElementById("datatable").deleteRow(temp[1]);
                new PNotify({
                                    title: 'Delete Success',
                                    text: 'Delete Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalHapus').modal('hide');
              }else{
                new PNotify({
                                  title: 'Delete Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
      });
    </script>