<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Surat Nikah</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('surat_nikah/simpan');?>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_nikah_nomor" placeholder="Nomor Surat Nikah" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_nikah_tanggal_surat" placeholder="Tanggal Surat Nikah" required="required">
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
                <input type="text" id="datepicker2" class="form-control" name="surat_nikah_tanggal_menikah" placeholder="Tanggal Menikah" required="required">
            </div>

            <div class="form-group">
                <label>Nama Mempelai Pria :</label>
                <input type="text" class="form-control" name="surat_nikah_mempelai_pria" placeholder="Nama Mempelai Pria" required="required">
            </div>

            <div class="form-group">
                <label>Nama Mempelai Wanita :</label>
                <input type="text" class="form-control" name="surat_nikah_mempelai_wanita" placeholder="Nama Mempelai Wanita" required="required">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Pendeta Yang Meneguhkan dan Menikahkan :</label>
                <input type="text" class="form-control" name="surat_nikah_pendeta" placeholder="Yang Meneguhkan" required="required">
            </div>

            <div class="form-group">
                <label>Foto / Upload Surat :</label>
                <input class="form-control" type="file" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_nikah'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

    </form>
</div>

