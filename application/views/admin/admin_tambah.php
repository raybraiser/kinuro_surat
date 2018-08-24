<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-plus"></i> Tambah Admin</h1>
    </div>
</div>

<div class="row">

  <?php echo form_open_multipart('admin/simpan');?>

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label>Nama Lengkap :</label>
                <input type="text" class="form-control" name="admin_nama_lengkap" placeholder="Nama Lengkap" required="required">
            </div>

            <div class="form-group">
                <label>Username :</label>
                <input type="text" class="form-control" name="admin_username" placeholder="Username" required="required">
            </div>

            <div class="form-group">
                <label>Password :</label>
                <input type="text" class="form-control" name="admin_password" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <label>Status Admin :</label>
                <select class="form-control" name="admin_status">
                    <option value="1" >Super Admin</option>
                    <option value="2">Admin</option>
                </select>
            </div>

            <a href="<?php echo base_url('index.php/admin'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button>  

    </form>
</div>

