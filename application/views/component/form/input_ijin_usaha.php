<h3 class="tile-title">Form Input Ijin Usaha</h3>
<div class="tile-body">
    <form method="POST" action="<?= base_url('C_RknDetail/ius_action')?>" class="row">
        <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan?>">
        <div class="form-group col-5">
            <label class="control-label">Tanggal Kadaluarsa Ijin Usaha</label>
            <input class="form-control col-7" id="demoDate1" type="text" name="tanggal_berlaku">
        </div>

        <div class="form-group col-4">
            <label class="control-label">Status Ijin Usaha</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="status_berlaku" value="0" type="checkbox"> Berlaku
                </label>
            </div>
        </div>

        <div class="form-group col-6">
            <label class="control-label">Nomor Ijin Usaha</label>
            <input class="form-control" type="text" name="ius_no">
        </div>

        <div class="form-group col-6">
            <label class="control-label">Instansi Yang Mengeluarkan</label>
            <input class="form-control" type="text" name="ius_instansi">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Jenis IjinUsaha</label>
            <input class="form-control col-7" type="text" name="ius_jenis">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Klasifikasi Ijin Usaha</label>
            <textarea class="form-control" name="ius_klasifikasi"></textarea>
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
