<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fas fa-users"></i> Data Pendeta</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo base_url('index.php/pendeta/tambah'); ?>" class="btn btn-primary" ><i class="fas fa-users"></i> Tambah Data</a>
    </div>
</div>

<br>
<?php
    echo $this->session->flashdata('status_simpan');
    echo $this->session->flashdata('status_hapus');
    echo $this->session->flashdata('status_update');
?>

<div class="table-responsive">

    <table id="example" class="display table table-bordered table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">Nama Pendeta</th>
                <th style="text-align:center;">Jabatan</th>
                <th style="text-align:center;">Periode Pelayanan Mulai</th>
                <th style="text-align:center;">Periode Pelayanan Akhir</th>
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
            "ajax": "<?php echo base_url('index.php/pendeta/ambil_pendeta_json'); ?>",
            "columnDefs": [
                { "width": "15%", "targets": [4] }
            ]
        });
    });
</script>

<div class="modal fade" id="show_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data Pendeta</h4>
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

<div class="modal fade" id="hapus_pendeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin menghapus data pendeta ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"><i class="fas fa-trash"></i> Hapus</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#hapus_pendeta').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    })

    $('#show_detail').on('show.bs.modal', function (e) {
        var rowid1 = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : '<?php echo base_url('index.php/pendeta/detail'); ?>',
            data :  'rowid1='+ rowid1,
            success : function(data){
                $('.details').html(data);//menampilkan data ke dalam modal
            }
        });
    });

</script>
