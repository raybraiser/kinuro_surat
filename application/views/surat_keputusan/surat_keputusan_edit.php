<?php
    $status_session = $this->session->status_query_keputusan_hapus_link;
    if ($status_session == 'sukses') {
        echo '<script>swal("Berhasil !", "Gambar berhasil dihapus!", "success");</script>';
    } elseif ($status_session == 'gagal') {
        echo '<script>swal("Gagal !", "Gambar gagal dihapus!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_keputusan_hapus_link', 1);
?>



<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Edit Surat Surat Keputusan</h1>
    </div>
</div>

<div class="row">

<?php

foreach ($data_keputusan->result() as $baris_data_keputusan) { ?>
   
  <?php echo form_open_multipart('surat_keputusan/update');?>
  <input type="hidden" name="surat_keputusan_id" required="required" value="<?php echo $baris_data_keputusan->keputusan_id; ?>" >

          <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_keputusan_nomor" value="<?php echo $baris_data_keputusan->keputusan_nomor_surat; ?>" placeholder="Nomor Surat Keputusan" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_keputusan_tanggal" value="<?php echo $baris_data_keputusan->keputusan_tanggal_surat; ?>" placeholder="Tanggal Surat Keputusan" required="required">
                <script>
                    $( function() {
                        $( "#datepicker1, #datepicker2" ).datepicker({
                            changeMonth: true, 
                            changeYear: true, 
                            dateFormat: 'yy-mm-dd',
                        });
                    } );
                </script>
            </div>

            <div class="form-group">
                <label>Surat Untuk :</label>
                <select name="surat_keputusan_untuk" class="form-control" required="required">
                    <option value="bpmj" <?php if ($baris_data_keputusan->keputusan_untuk == 'bmpj') { echo 'selected="selected"'; } ?> >BPMJ</option>
                    <option value="pkb" <?php if ($baris_data_keputusan->keputusan_untuk == 'pkb') { echo 'selected="selected"'; } ?> >Komisi PKB</option>
                    <option value="wki" <?php if ($baris_data_keputusan->keputusan_untuk == 'wki') { echo 'selected="selected"'; } ?> >Komisi WKI</option>
                    <option value="pemuda" <?php if ($baris_data_keputusan->keputusan_untuk == 'pemuda') { echo 'selected="selected"'; } ?> >Komisi Pemuda</option>
                    <option value="remaja" <?php if ($baris_data_keputusan->keputusan_untuk == 'remaja') { echo 'selected="selected"'; } ?> >Komisi Remaja</option>
                    <option value="anak" <?php if ($baris_data_keputusan->keputusan_untuk == 'anak') { echo 'selected="selected"'; } ?> >Komisi Anak</option>
                    <option value="kpdp" <?php if ($baris_data_keputusan->keputusan_untuk == 'kpdp') { echo 'selected="selected"'; } ?> >Komisi PDP</option>
                    <option value="panitia" <?php if ($baris_data_keputusan->keputusan_untuk == 'panitia') { echo 'selected="selected"'; } ?> >Panitia</option>
                    <option value="time_kerja" <?php if ($baris_data_keputusan->keputusan_untuk == 'tim_kerja') { echo 'selected="selected"'; } ?> >Tim Kerja</option>
                </select>
            </div>

            <div class="form-group">
                <label>Perihal Surat :</label>
                <input type="text" class="form-control" name="surat_keputusan_perihal" value="<?php echo $baris_data_keputusan->keputusan_perihal; ?>" placeholder="Perihal Surat Masuk" required="required">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Deskripsi Surat :</label>
                <textarea name="surat_keputusan_deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi Surat Masuk......"><?php echo $baris_data_keputusan->keputusan_deskripsi; ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                        if ($baris_data_keputusan->keputusan_link) {
                            echo '<div class="form-group img_with_button">';
                            echo '<center><img class="img img-responsive" src="'.base_url('img/').$baris_data_keputusan->keputusan_link.'" width="20" height="20"></center>';
                            echo "<a class='button btn btn-danger' data-toggle='modal' data-target='#hapus_link_gambar' data-href=".base_url('index.php/surat_keputusan/hapus_link/'.$baris_data_keputusan->keputusan_id)."><i class='fas fa-trash'></i></a>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label>Foto / Upload Surat :</label>
                <input class="form-control" type="file" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_keputusan'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
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




