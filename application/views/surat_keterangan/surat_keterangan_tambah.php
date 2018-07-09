<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Surat Keterangan</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('surat_keterangan/simpan');?>
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_keterangan_nomor" placeholder="Nomor Surat">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_keterangan_tanggal" placeholder="Tanggal Surat" required="required">

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
                    <option value="keterangan">Keterangan</option>
                    <option value="kredensi">Kredensi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Perihal Surat :</label>
                <input type="text" class="form-control" name="surat_keterangan_perihal" placeholder="Perihal Surat Keterangan" required="required">
            </div>

            <div class="form-group">
                <label>Nama Lengkap :</label>
                <input type="text" class="form-control" name="surat_keterangan_nama" placeholder="Nama" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir :</label>
                <input type="text" id="datepicker2" class="form-control" name="surat_keterangan_tanggal_lahir" placeholder="Tanggal Lahir" required="required">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <select name="jenis_kelamin_surat_keterangan" class="form-control" required="required">
                    <option value="laki-laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

        </div>

        <div class="col-md-6 col-lg-6">

            <div class="form-group">
                <label>Domisi Kolom :</label>
                <select name="kolom_surat_keterangan" class="form-control" required="required">
                    <?php 
                        for ($i=1; $i < 12; $i++) { 
                            echo "<option value='".$i."'>Kolom ".$i."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi Surat :</label>
                <textarea name="surat_keterangan_deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi Surat Masuk......"></textarea>
            </div>

            <div class="form-group">
                <label>Upload / Foto Surat :</label>
                <input class="form-control" type="file" capture="camera" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_keterangan'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

    </form>
</div>

