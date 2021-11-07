<div class="app-title">
    <div>
        <h1>Penyedia Barang/Jasa</h1>
        <p>Daftar Penyedia Barang / Jasa</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Penyedia Barang/Jasa</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?= !isset($button) ? '<div class="row pull-right">
<div class="col "><form method="GET" id="subnpwp" action="'.base_url('C_Integrasi/penyedia').'"><div class="input-group"><input class="form-control form-control-sm" id="npwp" name="npwp" type="text" placeholder="NPWP Penyedia">
                <button type="button" id="tarik2" class="btn btn-primary btn-sm input-group-append">
                    <i class="fa fa-download"></i> Tarik Data
                </button></form></div></div></div>' :'' ?>
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Penyedia</h3>            
            <div class="tile-body">
                <?php if(isset($button)){
                    $this->load->view('component/form/input_penyedia');
                }else
                {
                    $this->load->view('component/table/tabelPenyedia');
                }
                
                ?>
            </div>
        </div>
    </div>
</div>
<?php if(!isset($button)){ ?>
<div class="modal fade" id="rknmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        
    </div>
</div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#sampleTable').DataTable();
        $("#npwp").mask("99.999.999.9-999.999");
        
        $('#tarik2').click(function(){
            $.ajax({
                type:$('#subnpwp').attr('method'),
                url:$('#subnpwp').attr('action'),
                data:$('#subnpwp').serialize(),
                success:function(data){
                    console.log(data);
                    $('.modal-content').html(data);
                    $('#rknmodal').modal('show'); 
                }
            });
        });
    });
</script>
<?php } ?>