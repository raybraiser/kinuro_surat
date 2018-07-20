<?php
    $status_session = $this->session->status_query_surat_keterangan_hapus_link;
    if ($status_session == 'sukses') {
        echo '<script>swal("Berhasil !", "Gambar berhasil dihapus!", "success");</script>';
    } elseif ($status_session == 'gagal') {
        echo '<script>swal("Gagal !", "Gambar gagal dihapus!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_surat_keterangan_hapus_link', 1);
?>



<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Edit Surat Keterangan</h1>
    </div>
</div>

<div class="row">
    <?php echo form_open_multipart('surat_keterangan/update');?>


        <?php

            foreach ($data_keterangan->result() as $baris_data_keterangan) { 
        ?>
        <input type="hidden" class="form-control" name="surat_keterangan_id" value="<?php echo $baris_data_keterangan->sk_keterangan_id; ?>" placeholder="Nomor Surat">        
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_keterangan_nomor" value="<?php echo $baris_data_keterangan->sk_keterangan_nomor_surat; ?>" placeholder="Nomor Surat">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_keterangan_tanggal" value="<?php echo $baris_data_keterangan->sk_keterangan_tanggal_surat; ?>" placeholder="Tanggal Surat" required="required">
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
                <label>Jenis Surat :</label>
                <select name="jenis_surat_keterangan" class="form-control" required="required">
                    <option value="keterangan" <?php if ($baris_data_keterangan->sk_keterangan_jenis_surat == 'keterangan') { echo 'selected="selected"'; } ?>>Keterangan</option>
                    <option value="kredensi" <?php if ($baris_data_keterangan->sk_keterangan_jenis_surat == 'kredensi') { echo 'selected="selected"'; } ?>>Kredensi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Perihal Surat :</label>
                <input type="text" class="form-control" name="surat_keterangan_perihal" value="<?php echo $baris_data_keterangan->sk_keterangan_perihal; ?>" placeholder="Perihal Surat Keterangan" required="required">
            </div>

            <div class="form-group">
                <label>Nama Lengkap :</label>
                <input type="text" class="form-control" name="surat_keterangan_nama" value="<?php echo $baris_data_keterangan->sk_keterangan_nama_lengkap; ?>" placeholder="Nama" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input type="text" id="datepicker2" class="form-control" name="surat_keterangan_tanggal_lahir" value="<?php echo $baris_data_keterangan->sk_keterangan_tanggal_lahir; ?>" placeholder="Tanggal Lahir" required="required">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <select name="jenis_kelamin_surat_keterangan" class="form-control" required="required">
                    <option value="laki-laki" <?php if ($baris_data_keterangan->sk_keterangan_jenis_kelamin == 'laki-laki') { echo 'selected="selected"'; } ?>>Laki - Laki</option>
                    <option value="perempuan" <?php if ($baris_data_keterangan->sk_keterangan_jenis_kelamin == 'perempuan') { echo 'selected="selected"'; } ?>>Perempuan</option>
                </select>
            </div>

        </div>

        <div class="col-md-6 col-lg-6">

            <div class="form-group">
                <label>Domisi Kolom :</label>
                <select name="kolom_surat_keterangan" class="form-control" required="required">
                    <option value="1" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '1') { echo 'selected="selected"'; } ?>>Kolom 1</option>
                    <option value="2" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '2') { echo 'selected="selected"'; } ?>>Kolom 2</option>
                    <option value="3" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '3') { echo 'selected="selected"'; } ?>>Kolom 3</option>
                    <option value="4" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '4') { echo 'selected="selected"'; } ?>>Kolom 4</option>
                    <option value="5" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '5') { echo 'selected="selected"'; } ?>>Kolom 5</option>
                    <option value="6" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '6') { echo 'selected="selected"'; } ?>>Kolom 6</option>
                    <option value="7" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '7') { echo 'selected="selected"'; } ?>>Kolom 7</option>
                    <option value="8" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '8') { echo 'selected="selected"'; } ?>>Kolom 8</option>
                    <option value="9" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '9') { echo 'selected="selected"'; } ?>>Kolom 9</option>
                    <option value="10" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '10') { echo 'selected="selected"'; } ?>>Kolom 10</option>
                    <option value="11" <?php if ($baris_data_keterangan->sk_keterangan_domisili_kolom == '10') { echo 'selected="selected"'; } ?>>Kolom 11</option>
              </select>
            </div>

            <div class="form-group">
                <label>Deskripsi Surat :</label>
                <textarea name="surat_keterangan_deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi Surat Masuk......"><?php echo $baris_data_keterangan->sk_keterangan_deskripsi; ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                        if ($baris_data_keterangan->sk_keterangan_link) {
                            echo '<div class="form-group img_with_button">';
                            echo '<center><img class="img img-responsive" src="'.$baris_data_keterangan->sk_keterangan_link.'" width="20" height="20"></center>';
                            echo "<a class='button btn btn-danger' data-toggle='modal' data-target='#hapus_link_gambar' data-href=".base_url('index.php/surat_keterangan/hapus_link/'.$baris_data_keterangan->sk_keterangan_id)."><i class='fas fa-trash'></i></a>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label>Foto / Upload Surat :</label>
                <input class="form-control" type="file" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_keterangan'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

        <?php } ?>
                        
        </form>
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