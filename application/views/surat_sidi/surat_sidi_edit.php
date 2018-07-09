<?php
    $status_session = $this->session->status_query_ss_hapus_link;
    if ($status_session == 'sukses') {
        echo '<script>swal("Berhasil !", "Gambar berhasil dihapus!", "success");</script>';
    } elseif ($status_session == 'gagal') {
        echo '<script>swal("Gagal !", "Gambar gagal dihapus!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_ss_hapus_link', 1);
?>


<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-edit"></i> Edit Surat Sidi</h1>
    </div>
</div>



<div class="row">

<?php foreach ($data_ss->result() as $baris_data_surat_sidi) { ?>


<?php echo form_open_multipart('surat_sidi/update');?>
<input type="hidden" class="form-control" name="sk_sidi_id" value="<?php echo $baris_data_surat_sidi->sk_sidi_id; ?>" required="required">

      <div class="col-md-6 col-lg-6">
          <div class="form-group">
              <label>Nomor Surat :</label>
              <input type="text" class="form-control" name="surat_sidi_nomor" value="<?php echo $baris_data_surat_sidi->sk_sidi_nomor; ?>" placeholder="Nomor Surat Sidi" required="required">
          </div>

          <div class="form-group">
              <label>Tanggal Surat :</label>
              <input type="text" id="datepicker1" class="form-control" name="surat_sidi_tanggal_surat" value="<?php echo $baris_data_surat_sidi->sk_sidi_tanggal_surat; ?>" placeholder="Tanggal Surat Sidi" required="required">
              <script>
                  $( function() {
                      $( "#datepicker1, #datepicker2, #datepicker3" ).datepicker({
                          changeMonth: true, 
                          changeYear: true, 
                          dateFormat: 'yy-mm-dd',
                      });
                  } );
              </script>
          </div>

          <div class="form-group">
              <label>Tanggal Sidi :</label>
              <input type="text" id="datepicker2" class="form-control" name="surat_sidi_tanggal_sidi" value="<?php echo $baris_data_surat_sidi->sk_sidi_tanggal_sidi; ?>" placeholder="Tanggal Sidi" required="required">
          </div>

          <div class="form-group">
              <label>Nama Lengkap :</label>
              <input type="text" class="form-control" name="surat_sidi_nama" value="<?php echo $baris_data_surat_sidi->sk_sidi_nama; ?>" placeholder="Nama" required="required">
          </div>

          <div class="form-group">
              <label>Tempat & Tanggal Lahir :</label>
              <input type="text" class="form-control" name="surat_sidi_tempat_lahir" value="<?php echo $baris_data_surat_sidi->sk_sidi_tempat_lahir; ?>" placeholder="Tempat Lahir" required="required">
              <input type="text" id="datepicker3" class="form-control" name="surat_sidi_tanggal_lahir" value="<?php echo $baris_data_surat_sidi->sk_sidi_tanggal_lahir; ?>" placeholder="Tanggal Lahir" required="required">                
          </div>
      </div>



      <div class="col-md-6 col-lg-6">
          <div class="form-group">
              <label>Jenis Kelamin :</label>
                <select class="form-control" name="surat_sidi_jenis_kelamin">
                <option value="laki-laki" <?php if ($baris_data_surat_sidi->sk_sidi_jenis_kelamin == 'laki-laki') { echo 'selected="selected"'; } ?> >Laki-Laki</option>
                <option value="perempuan" <?php if ($baris_data_surat_sidi->sk_sidi_jenis_kelamin == 'perempuan') { echo 'selected="selected"'; } ?> >Perempuan</option>
              </select>
          </div>

          <div class="form-group">
              <label>Di Sidi Oleh :</label>
              <input type="text" class="form-control" name="surat_sidi_oleh"  value="<?php echo $baris_data_surat_sidi->sk_sidi_yang_meneguhkan; ?>" placeholder="Di Sidi Oleh" required="required">
          </div>

          <div class="form-group">
              <label>Upload / Foto Surat :</label>
              <input class="form-control" type="file" capture="camera" accept="image/*" name="upload_file" size="20">      
          </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                        if ($baris_data_surat_sidi->sk_sidi_link) {
                            echo '<div class="form-group img_with_button">';
                            echo '<center><img class="img img-responsive" src="'.$baris_data_surat_sidi->sk_sidi_link.'" width="20" height="20"></center>';
                            echo "<a class='button btn btn-danger' data-toggle='modal' data-target='#hapus_link_gambar' data-href=".base_url('index.php/surat_sidi/hapus_link/'.$baris_data_surat_sidi->sk_sidi_id)."><i class='fas fa-trash'></i></a>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>

          <a href="<?php echo base_url('index.php/surat_sidi'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
          <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

      </div>

  </form>
<?php } ?>
</div>

<div class="modal fade" id="hapus_link_gambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin menghapus gambar ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"><i class="fas fa-trash"></i> Hapus</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#hapus_link_gambar').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    })
</script>