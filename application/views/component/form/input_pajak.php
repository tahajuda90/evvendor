<h3 class="tile-title">Form Input Pajak</h3>
<div class="tile-body">
    <form method="POST" action="<?= base_url('C_RknDetail/pjk_action')?>" class="row">
        <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
        <div class="form-group col-12">
            <label class="control-label">No Bukti Penerimaan Pajak</label>
            <input class="form-control col-8" type="text" name="pjk_no">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Tanggal Bukti Penerimaan</label>
            <input class="form-control col-4" id="demoDate1" type="text" name="pjk_tanggal">
        </div>

        <div class="form-group col-6">
            <label class="control-label">Jenis Pajak</label>
            <input class="form-control" type="text" name="pjk_jenis">
        </div>
        <div class="form-group col-6">
            <label class="control-label">Tahun Masa Pajak</label>
            <input class="form-control" type="text" name="pjk_tahun">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?= base_url('rekanan/detail/'.$rekanan->id_rekanan)?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
    </form>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
 <script type="text/javascript">
$( document ).ready(function() {
    $('#demoDate1').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
});
    </script>
