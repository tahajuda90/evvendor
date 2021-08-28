<form method="post" action="<?=$action?>" class="row">
    <input type="hidden" name="id_rekanan" value="<?=$id_rekanan?>">
    <div class="form-group col-4">
        <label class="control-label">Bentuk Usaha</label>
        <select class="form-control" name="id_btu" id="demoSelect">
            <?php
            foreach($btusaha as $bth){                
                echo '<option value="'.$bth->id_btu.'" '.($bth->id_btu == $id_btu ? 'selected':'').' >'.$bth->btu_nama.'</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group col-12">
        <label class="control-label">Nama Perusahaan</label>
        <input class="form-control col-9" type="text" name="rkn_nama" value="<?=$rkn_nama?>">
    </div>
    
    <div class="form-group col-6">
        <label class="control-label">NPWP Perusahaan</label>
        <input class="form-control" id="npwp" type="text" name="rkn_npwp" value="<?=$rkn_npwp?>">
    </div>

    <div class="form-group col-6">
        <label class="control-label">No PKP Perusahaan</label>
        <input class="form-control" type="text" name="rkn_pkp" value="<?=$rkn_pkp?>">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Telepon Perusahaan</label>
        <input class="form-control" type="text" name="rkn_telepon" value="<?=$rkn_telepon?>">
    </div>

    <div class="form-group col-6">
        <label class="control-label">Email Perusahaan</label>
        <input class="form-control" type="text" name="rkn_email" value="<?=$rkn_email?>">
    </div>
    
    <div class="form-group col-12">
        <label class="control-label">Alamat Perusahaan</label>
        <textarea class="form-control col-9" rows="4" name="rkn_alamat"><?=$rkn_alamat?></textarea>
    </div>

    <div class="form-group col-4">
        <label class="control-label">Kode Pos Perusahaan</label>
        <input class="form-control" type="text" name="rkn_kodepos" value="<?=$rkn_kodepos?>">
    </div>    

    <div class="form-group col-5">
        <label class="control-label">Asal Kota/Kabupaten</label>
        <input class="form-control" type="text" name="kbp" value="<?=$kbp?>">
    </div>
    <div class="col-12">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>
</form>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/select2.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $("#npwp").mask("99.999.999.9-999.999");
    $('#demoSelect').select2();
});
    </script>