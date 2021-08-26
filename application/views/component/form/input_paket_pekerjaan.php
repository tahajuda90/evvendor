<form method="post" action="<?=$action?>" class="row">
    <input type="hidden" name="id_paket" value="<?=$id_paket?>"/>
    <div class="form-group col-8">
        <label class="control-label"> Satuan Kerja</label>
        <select class="form-control" id="satker" name="id_satker" >
            <?php
            foreach($satker as $stk){
                if($stk->id_satker == $id_satker){
                    echo '<option selected="true" value="'.$stk->id_satker.'">'.$stk->stk_kode.' - '.$stk->stk_nama.'</option>';
                }else{
                    echo '<option value="'.$stk->id_satker.'">'.$stk->stk_kode.' - '.$stk->stk_nama.'</option>';
                }
            }
            ?>
        </select>
    </div>
    
    <div class="form-group col-3">
        <label class="control-label">Tahun Paket Pekerjaan</label>
        <input class="form-control" value="<?=$tahun?>" type="text" name="tahun">
    </div>
    
    <div class="form-group col-4">
        <label class="control-label">Kode Tender</label>
        <input class="form-control " type="text" value="<?=$lls_id?>" name="lls_id">
    </div>
   
    <div class="form-group col-4">
        <label class="control-label">Kode Sirup</label>
        <input class="form-control " type="text" value="<?=$rup_id?>" name="rup_id">
    </div>
    
    <div class="form-group col-4">
        <label class="control-label">Metode Pemilihan</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" <?= $is_nontender == 1 ? "checked" : "" ?> type="radio" value="1" name="is_nontender">Non-Tender
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" <?= $is_nontender == 0 ? "checked" : "" ?> type="radio" value="0" name="is_nontender">Tender
            </label>
        </div>
    </div>
    
    <div class="form-group col-12">
        <label class="control-label">Nama Paket</label>
        <input class="form-control " type="text" value="<?=$pkt_nama?>" name="pkt_nama">
    </div>
   
    <div class="form-group col-6">
        <label class="control-label">Pagu Paket</label>
        <input class="form-control " type="text" value="<?=$pkt_pagu?>" name="pkt_pagu">
    </div>
    
    <div class="form-group col-6">
        <label class="control-label">HPS Paket</label>
        <input class="form-control " type="text" value="<?=$pkt_hps?>" name="pkt_hps">
    </div>
    
    <div class="col-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?= $button ?></button>&nbsp;&nbsp;&nbsp;
        <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>
</form>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/select2.min.js"></script>
 <script type="text/javascript">
$( document ).ready(function() {
    $('#satker').select2();
});
    </script>