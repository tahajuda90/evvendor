<form method="POST" action="<?=$action?>" class="row">
    <input type="hidden" name="id_paket" value="<?=$id_paket?>">
    <input type="hidden" name="id_kontrak" value="<?=$id_kontrak?>">
    <input type="hidden" name="lls_id" value="<?=$lls_id?>">
    <div class="form-group col-8">
        <label class="control-label">No Kontrak Pekerjaan</label>
        <input class="form-control " type="text" name="kontrak_no" value="<?=$kontrak_no?>">
    </div>
   
    <div class="form-group col-12">
        <label class="control-label">Nilai Kontrak Pekerjaan</label>
        <input class="form-control col-6" type="text" name="nilai_kontrak" value="<?=$nilai_kontrak?>">
    </div>
   
    <div class="form-group col-6">
        <label class="control-label">Tanggal Kontrak Mulai</label>
        <input class="form-control " id="demoDate1" type="text" name="kontrak_mulai" value="<?=$kontrak_mulai?>">
    </div>

    <div class="form-group col-6">
        <label class="control-label">Tanggal Kontrak Selesai</label>
        <input class="form-control " id="demoDate2" type="text" name="kontrak_akhir" value="<?=$kontrak_akhir?>">
    </div>
    
    <div class="col-12">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>
</form>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
 <script type="text/javascript">
$( document ).ready(function() {
    $('#demoDate1').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoDate2').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
});
    </script>