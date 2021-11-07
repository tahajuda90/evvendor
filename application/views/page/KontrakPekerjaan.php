<div class="app-title">
    <div>
        <h1>Kontrak Pekerjaan</h1>
        <p><?=$pkt->pkt_nama?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('paket')?>">Paket Pekerjaan</a></li>
        <li class="breadcrumb-item active">Kontrak Pekerjaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Kontrak Pekerjaan</h3>
            <div class="tile-body">
                <?php 
                if(isset($button)){
                    $this->load->view('component/form/input_kontrak_pekerjaan');
                }else{
                    $this->load->view('component/table/tabelKontrakPekerjaan');   
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
<script type="text/javascript">
    $( document ).ready(function() {
        $('#tarik').click(function(){
            $('#rknmodal').modal('show').find('.modal-content').load($(this).attr('href'));
        });
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

