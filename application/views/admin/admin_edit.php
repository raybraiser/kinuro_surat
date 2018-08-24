<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-header"><i class="fas fa-edit"></i> Edit Admin</h1>
    </div>
</div>


<div class="row">

    <?php foreach ($data_admin->result() as $baris_data_admin) { ?>

    <?php echo form_open_multipart('admin/update');?>
            <input type="hidden" class="form-control" name="admin_id" value="<?php echo $baris_data_admin->admin_id; ?>" required="required">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label>Nama Lengkap :</label>
                    <input type="text" class="form-control" name="admin_nama_lengkap" value="<?php echo $baris_data_admin->admin_nama_lengkap; ?>" placeholder="Nama Lengkap" required="required">
                </div>

                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" class="form-control" name="admin_username" value="<?php echo $baris_data_admin->admin_username; ?>" placeholder="Username" required="required" disabled>
                </div>

                <div class="form-group">
                    <label>Password (Kosongkan jika tetap menggunakan password terdahulu!) :</label>
                    <input type="text" class="form-control" name="admin_password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label>Status Admin :</label>
                    <select class="form-control" name="admin_status">
                        <option value="1" <?php if ($baris_data_admin->admin_status == 1) { echo 'selected="selected"'; } ?> >Super Admin</option>
                        <option value="2" <?php if ($baris_data_admin->admin_status == 2) { echo 'selected="selected"'; } ?> >Admin</option>
                    </select>
            </div>

            <a href="<?php echo base_url('index.php/admin'); ?>" class="btn btn-danger" ><i class="fas fa-reply"></i> Batal</a>
            <button type="submit" name="tombol_simpan" class="btn btn-info"><i class="fas fa-save"></i> Simpan</button> 
    </form>
    <?php } ?>
</div>