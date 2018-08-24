<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Data Pendeta</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('pendeta/simpan');?>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nama Pendeta :</label>
                <input type="text" class="form-control" name="nama_pendeta" placeholder="Nama Pendeta" required="required">
            </div>

            <div class="form-group">
                <label>Jabatan :</label>
                <select class="form-control" name="jabatan">
                    <option value="Ketua Jemaat" >Ketua Jemaat</option>
                    <option value="Pendeta Pelayanan">Pendeta Pelayanan</option>
                    <option value="Guru Agama">Guru Agama</option>
                </select>
            </div>

            <div class="form-group">
                <label>Periode Pelayanan :</label>
                <select class="form-control" name="periode_mulai">
                    <?php
                        for ($i=1900; $i < 2100; $i++) { 
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                </select>
                <br>
                <select class="form-control" name="periode_akhir">
                    <option value="Sekarang" >Sekarang</option>                        
                    <?php
                        for ($i=1900; $i < 2100; $i++) { 
                            echo '<option value="'.$i.'" >'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <a href="<?php echo base_url('index.php/pendeta'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

    </form>
</div>

