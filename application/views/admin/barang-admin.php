<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">          
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data </li>
          </ol> -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?php 
  if($this->session->flashdata('error')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'Gagal menambahkan ke database'.'",
                  timer: 10000,
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
 
  if($this->session->flashdata('success')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.$this->session->flashdata('success').'",
                  text: "'.'Telah Ditambahkan'.'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>


  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Barang</h3>
              <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Tambah Barang</button>
              
            </div>
            <script>
              function link() {
                window.location.href='<?php echo base_url() ?>admin/tambah_barang';
              }
            </script>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode barang</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Tersedia</th>
                    <th>Terpinjam</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $row->kode_barang ?></td>
                      <td><?php echo $row->nama_barang ?></td>
                      <td><?php echo $row->merk ?></td>
                      <td><?php echo $row->jml_barang ?>
                      <button data-toggle="modal" data-target="#unit" class="btn btn-success float-right"><i class="ion ion-android-add"></i></button>
                      </td>
                      <td><?php echo $row->jml_tersedia ?></td>
                      <td><?php echo $row->jml_terpinjam ?></td>
                      <td>
                        <div class="button-group">
                          
                          <script>
                            function link1() {
                              window.location.href='<?php echo base_url()."admin/edit_form_pinjam/".$row->id ?>';
                            }
                          </script>
                          <button type="button" data-toggle="modal" data-target="#<?php echo $row->id ?>" class="btn btn-info"> <i class="ion ion-ios-more"></i> </button>
                          <button type="button" onclick="window.location='<?php echo base_url() ?>admin/edit_form_barang/<?php echo $row->id ?>';" class="btn btn-warning"> <i class="ion ion-edit"></i> </button>
                          <button type="button" onclick="del()" class="btn btn-danger"> <i class="ion ion-android-delete"></i> </button>
                        </div>
                      </td>
                      <?php $i++; ?>
                    </tr>
                    <div class="modal fade" id="<?php echo $row->id ?>" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Detail Barang</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">Kode Barang</div>
                              <div class="col-md-8"><?php echo $row->kode_barang ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Nama Barang</div>
                              <div class="col-md-8"><?php echo $row->nama_barang ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Merk</div>
                              <div class="col-md-8"><?php echo $row->merk ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Tanggal masuk</div>
                              <div class="col-md-8"><?php echo $row->tgl_masuk ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Jumlah</div>
                              <div class="col-md-8"><?php echo $row->jml_barang ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Tersedia</div>
                              <div class="col-md-8"><?php echo $row->jml_tersedia ?></div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">Spesifikasi</div>
                              <div class="col-md-8"><?php echo $row->spesifikasi ?></div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode barang</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Tersedia</th>
                    <th>Terpinjam</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- modal -->
  
  <div class="modal fade" id="unit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Unit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- /.content -->
</div>
<?php
$link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
echo $link;

?>
<script>
  function del(){
    swal({
      title: 'Are you sure?',
      text: "Yakin akan menghapus ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
          window.location = "#";
        }
    })
  }
</script>