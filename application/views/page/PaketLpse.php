<div class="app-title">
    <div>
        <h1>Paket <?=$title?></h1>
        <p>Daftar Paket Pengadaan <?=$title?> Live Record</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Paket Pekerjaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?php $this->load->view('component/table/tabelPaketLpse'); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="pktmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        
    </div>
</div>
</div>
<!-- Data table plugin-->

<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/datetime-moment.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $.fn.dataTable.moment( 'D-M-Y' );
    $('#sampleTable').DataTable({
        "order": [[ 3, "desc" ]]
    });
    
     $(document).on('click','.openBtn',function(){
            $('#pktmodal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
    });
</script>