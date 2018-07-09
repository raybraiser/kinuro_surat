<?php
    $status_session = $this->session->status_query_surat_sidi;
    if ($status_session == 'sukses') {
        echo '<script>swal("Berhasil !", "Data berhasil disimpan!", "success");</script>';
    } elseif ($status_session == 'gagal') {
        echo '<script>swal("Gagal !", "Data gagal disimpan!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_surat_sidi', 1);

    $status_session_update = $this->session->status_query_sb_update;
    if ($status_session_update == 'sukses') {
        echo '<script>swal("Berhasil !", "Data berhasil diupdate!", "success");</script>';
    } elseif ($status_session_update == 'gagal') {
        echo '<script>swal("Gagal !", "Data gagal diupdate!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_sb_update', 1);

    $status_session_hapus = $this->session->status_query_sb_hapus;
    if ($status_session_hapus == 'sukses') {
        echo '<script>swal("Berhasil !", "Data berhasil dihapus!", "success");</script>';
    } elseif ($status_session_hapus == 'gagal') {
        echo '<script>swal("Gagal !", "Data gagal dihapus!", "error");</script>';
    }
    $this->session->mark_as_temp('status_query_sb_hapus', 1);


?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fas fa-file"></i> Surat Sidi</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo base_url('index.php/surat_sidi/tambah'); ?>" class="btn btn-primary" ><i class="fas fa-file"></i> Tambah</a>
    </div>
</div>

<br>

<div class="table-responsive">

    <table id="example" class="display table table-bordered table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">Nomor Surat</th>
                <th style="text-align:center;">Tanggal Sidi</th>
                <th style="text-align:center;">Nama Lengkap</th>
                <th style="text-align:center;">Aksi</th>
            </tr>
        </thead>
    </table>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('index.php/surat_sidi/ambil_surat_sidi'); ?>",
            "columnDefs": [
                { "width": "15%", "targets": [3] }
            ]
        });
    });
</script>

<div class="modal fade" id="show_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Surat Sidi</h4>
            </div>
            <div class="modal-body">
                <div class="details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-reply"></i> Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_surat_sidi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin menghapus data surat sidi ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"><i class="fas fa-trash"></i> Hapus</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#hapus_surat_sidi').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    })

    $('#show_detail').on('show.bs.modal', function (e) {
        var rowid1 = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?php echo base_url('index.php/surat_sidi/detail'); ?>',
            data :  'rowid1='+ rowid1,
            success : function(data){
                $('.details').html(data);//menampilkan data ke dalam modal
            }
        });
    });

</script>
