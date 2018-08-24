<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Surat Masuk</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('surat_masuk/simpan');?>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Surat Dari :</label>
                <select name="surat_masuk_dari" class="form-control" required="required">
                    <option value="sinode">Sinode</option>
                    <option value="wilayah">Wilayah</option>
                    <option value="pemerintah">Pemerintah</option>
                    <option value="organisasi-lain">Organisasi Lain</option>
                </select>
            </div>

            <div class="form-group">
                <label>Surat Untuk :</label>
                <select name="surat_masuk_untuk" class="form-control" required="required">
                    <option value="bpmj">BPMJ</option>
                    <option value="pkb">Komisi PKB</option>
                    <option value="wki">Komisi WKI</option>
                    <option value="pemuda">Komisi Pemuda</option>
                    <option value="remaja">Komisi Remaja</option>
                    <option value="anak">Komisi Anak</option>
                    <option value="kpdp">Komisi PDP</option>
                    <option value="lansia">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nomor Surat :</label>
                <input type="text" class="form-control" name="surat_masuk_nomor" placeholder="Nomor Surat Masuk" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Surat :</label>
                <input type="text" id="datepicker1" class="form-control" name="surat_masuk_tanggal" placeholder="Tanggal Surat Masuk" required="required">

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
                <label>Perihal Surat :</label>
                <input type="text" class="form-control" name="surat_masuk_perihal" placeholder="Perihal Surat Masuk" required="required">
            </div>

            <div class="form-group">
                <label>Tanggal Masuk Surat :</label>
                <input type="text" id="datepicker2" class="form-control" name="surat_masuk_tanggal_masuk" placeholder="Tanggal Surat Masuk" required="required">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Deskripsi Surat :</label>
                <textarea name="surat_masuk_deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi Surat Masuk......"></textarea>
            </div>

            <div class="form-group">
                <label>Foto / Upload Surat :</label>
                <input class="form-control" type="file" accept="image/*" name="upload_file" size="20">      
            </div>

            <a href="<?php echo base_url('index.php/surat_masuk'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

        </div>

    </form>
</div>

