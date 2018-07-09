<?php
    $status_session = $this->session->status_query_sn_hapus_link;
    if ($status_session == 'sukses') {
        echo '<script>swal("Berhasil !", "Gambar berhasil dihapus!", "success");</script>';
    } elseif ($status_session == 'gagal') {
        echo '<script>swal("Gagal !", "Gambar gagal dihapus!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_sn_hapus_link', 1);
?>


<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-edit"></i> Edit Surat Nikah</h1>
    </div>
</div>

<?php foreach ($data_sn->result() as $baris_data_surat_nikah) { ?>

<div class="row">

  <?php echo form_open_multipart('surat_nikah/update');?>
        <input type="hidden" class="form-control" name="sk_menikah_id" value="<?php echo $baris_data_surat_nikah->sk_menikah_id; ?>" required="required">
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_nikah_nomor" placeholder="Nomor Surat Nikah" value="<?php echo $baris_data_surat_nikah->sk_menikah_nomor; ?>" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_nikah_tanggal_surat" placeholder="Tanggal Surat Nikah" value="<?php echo $baris_data_surat_nikah->sk_menikah_tanggal_surat; ?>" required="required">
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
                <label>Tanggal Menikah :</label>
                <input type="text" id="datepicker2" class="form-control" name="surat_nikah_tanggal_menikah" placeholder="Tanggal Menikah" value="<?php echo $baris_data_surat_nikah->sk_menikah_tanggal_menikah; ?>" required="required">
            </div>

            <div class="form-group">
                <label>Nama Mempelai Pria :</label>
                <input type="text" class="form-control" name="surat_nikah_mempelai_pria" placeholder="Nama Mempelai Pria" value="<?php echo $baris_data_surat_nikah->sk_menikah_nama_pria; ?>" required="required">
            </div>

            <div class="form-group">
                <label>Nama Mempelai Wanita :</label>
                <input type="text" class="form-control" name="surat_nikah_mempelai_wanita" placeholder="Nama Mempelai Wanita" value="<?php echo $baris_data_surat_nikah->sk_menikah_nama_wanita; ?>" required="required">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Pendeta Yang Meneguhkan dan Menikahkan :</label>
                <input type="text" class="form-control" name="surat_nikah_pendeta" placeholder="Yang Meneguhkan" value="<?php echo $baris_data_surat_nikah->sk_menikah_yang_meneguhkan; ?>" required="required">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php
                        if ($baris_data_surat_nikah->sk_menikah_link) {
                            echo '<div class="form-group img_with_button">';
                            echo '<center><img class="img img-responsive" src="'.$baris_data_surat_nikah->sk_menikah_link.'" width="100" height="100"></center>';
                            echo "<a class='button btn btn-danger' data-toggle='modal' data-target='#hapus_link_gambar' data-href=".base_url('index.php/surat_nikah/hapus_link/'.$baris_data_surat_nikah->sk_menikah_id)."><i class='fas fa-trash'></i></a>";
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label>Upload / Foto Surat :</label>
                <input class="form-control" type="file" capture="camera" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_nikah'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

    </form>
</div>

<?php } ?>


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