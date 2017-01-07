<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Kelas <?=$tahun_ajaran->num_rows()>0?$tahun_ajaran->row()->nama_kelas:"N/A"?></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-create-modal-md" onclick="showCreateDialog()">Tambah Data</a>
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($tahun_ajaran->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($tahun_ajaran->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['tahun_ajaran']?></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" onclick="showDialogDetail('<?=sha1($row['kd_kelas'])?>', '<?=sha1($row['tahun_ajaran'])?>', this)">Detail Matakuliah</a>
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
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Detail Matakuliah</h4>
          </div>
          <div class="modal-body" id="contentMatkul">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals update-->
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i;
      }
      function showDialogDetail(id, tahun_ajaran, r){
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/detail_matkul')?>/'+id+'/'+tahun_ajaran,
            data: $('form').serialize(),
            success: function (i) {
              document.getElementById("contentMatkul").innerHTML = i;
            }
          });
      }
      function showCreateDialog(row){
        document.getElementById("row_create").value=row;
      }
      $(document).ready(function(){
        $('#formcreatematkul').on('submit', function(e){
          var table = document.getElementById('datatable');
          var rowCreate = document.getElementById('row_create').value;
          var nameCreate = document.getElementById('nama_create').value;
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_kelas/create')?>',
            data: $('#formcreatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                var row = table.insertRow(1);
                var cellNumber = row.insertCell(0);
                var cellId = row.insertCell(1);
                var cellName = row.insertCell(2);
                var cellAksi = row.insertCell(3);
                cellNumber.innerHTML = rowCreate + 1;
                cellAksi.innerHTML = '';
                cellId.innerHTML = rowCreate + 1;
                cellName.innerHTML = nameCreate;
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
        $('#formupdatematkul').on('submit', function(e){
          var table = document.getElementById("datatable")
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_kelas/update')?>',
            data: $('#formupdatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[2].innerHTML = document.getElementById("nama").value;
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
            url: '<?=base_url('admin/index/post_kelas/delete')?>/'+temp[0],
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