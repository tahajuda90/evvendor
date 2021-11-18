<div class="app-title">
    <div>
        <h1>User Manajemen</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">User Manajemen</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3><b>Username :</b> <?=$user->username?></h3>
            <form method="post" action="<?= base_url('C_User/save_satker')?>" class="row">
                <input type="hidden" name="user_id" value="<?=$user->user_id?>">
                <div class="form-group col-md-4">
                    <label class="control-label"> Satuan Kerja</label>
                    <select class="form-control" id="stkr" name="id_satker" >

                    </select>                    
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Pilih</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $.ajax({
        type: "GET",
        dataType: 'json',
        delay: 250,
        url:'<?= base_url('C_SatuanKerja/json')?>',
        success:function(data){
            $('#stkr').empty().select2({data : $.map(data, function(obj) {
                return {
                    id: obj.id_satker,
                    text: obj.stk_nama
                };
            })
        }).trigger('change');
        }
        });
});
</script>

