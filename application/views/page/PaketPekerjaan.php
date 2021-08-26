<div class="app-title">
    <div>
        <h1>Paket Tender/Non-Tender</h1>
        <p>Daftar Paket Pengadaan Tender/Non-Tender</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Paket Pekerjaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?= !isset($button) ? '
<div class="row pull-right">
<div class="col ">
<div class="input-group"><input class="form-control form-control-sm " type="text" id="lls_id" placeholder="Kode Lelang">
                <button type="button" id="tarik" class="btn btn-primary btn-sm input-group-append">
                    <i class="fa fa-download"></i> Tarik Data
                </button></div></div>                
                </div>
            ' : '' ?> 
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Paket Pekerjaan</h3>
            <div class="tile-body">
                <?php 
                if(isset($button)){
                    $this->load->view('component/form/input_paket_pekerjaan');
                }else{
                    $this->load->view('component/table/tabelPaketPekerjaan');
                } ?>
            </div>
        </div>
    </div>
</div>
<?php if(!isset($button)){ ?>
<div class="modal fade" id="pktmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        
    </div>
</div>
</div>
<!-- Data table plugin-->
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#sampleTable').DataTable();
    
    $('#tarik').click(function(){
        console.log($('#lls_id').val());
        var llg = $('#lls_id').val();
        $.post("<?=base_url('C_Integrasi/paket')?>",{lls_id:llg},function(result){
            $('.modal-content').html(result);
            //console.log(result);
        });
        
        $('#pktmodal').modal('show');        
    });
    });
</script>

<?php } ?>
