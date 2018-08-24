<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Edit Data Pendeta</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('pendeta/update');?>

    <?php

        foreach ($data_pendeta->result() as $baris_data_pendeta) { ?>
        <input type="hidden" class="form-control" value="<?php echo $baris_data_pendeta->id_pendeta; ?>" name="id" required="required">        
        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nama Pendeta :</label>
                <input type="text" class="form-control" value="<?php echo $baris_data_pendeta->nama_pendeta; ?>" name="nama_pendeta" placeholder="Nama Pendeta" required="required">
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
                    $thn_mulai = $baris_data_pendeta->periode_pelayanan_mulai;
                    periode_mulai($thn_mulai);
                ?>
                </select>
                <br>
                <select class="form-control" name="periode_akhir">                     
                    <?php
                        $thn_akhir = $baris_data_pendeta->periode_pelayanan_akhir;
                        if ($thn_akhir == 'Sekarang') {
                            echo '<option value="Sekarang" selected >Sekarang</option>';
                            periode();
                        } else {
                            echo '<option value="Sekarang" selected >Sekarang</option>';
                            periode_akhir($thn_akhir);
                        }
                    ?>
                </select>
        </div>
        <?php } ?>
            <a href="<?php echo base_url('index.php/pendeta'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

    </form>
</div>

