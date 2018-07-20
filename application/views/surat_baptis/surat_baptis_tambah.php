<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Surat Baptis</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('surat_baptis/simpan');?>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_baptis_nomor" placeholder="Nomor Surat Baptis" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_baptis_tanggal_surat" placeholder="Tanggal Surat Baptis" required="required">
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
                <label>Tanggal Baptis :</label>
                <input type="text" id="datepicker2" class="form-control" name="surat_baptis_tanggal_baptis" placeholder="Tanggal Baptis" required="required">
            </div>

            <div class="form-group">
                <label>Nama :</label>
                <input type="text" class="form-control" name="surat_baptis_nama" placeholder="Nama" required="required">
            </div>

            <div class="form-group">
                <label>Tempat & Tanggal Lahir :</label>
                <input type="text" class="form-control" name="surat_baptis_tempat_lahir" placeholder="Tempat Lahir" required="required">
                <input type="text" id="datepicker3" class="form-control" name="surat_baptis_tanggal_lahir" placeholder="Tanggal Lahir" required="required">                
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <select class="form-control" name="surat_baptis_jenis_kelamin">
                    <option value="laki-laki" >Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Ayah :</label>
                <input type="text" class="form-control" name="surat_baptis_nama_ayah" placeholder="Nama Ayah" required="required">
            </div>

            <div class="form-group">
                <label>Nama Ibu :</label>
                <input type="text" class="form-control" name="surat_baptis_nama_ibu" placeholder="Nama" required="required">
            </div>

            <div class="form-group">
                <label>Dibaptis Oleh :</label>
                <input type="text" class="form-control" name="surat_baptis_oleh" placeholder="Dibaptis Oleh" required="required">
            </div>

            <div class="form-group">
                <label>Foto / Upload Surat :</label>
                <input class="form-control" type="file" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_baptis'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

    </form>
</div>

