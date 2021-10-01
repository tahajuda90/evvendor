<h3 class="tile-title">Form Input Pengalaman</h3>
<div class="tile-body">
    <form method="POST" action="<?= base_url('C_RknDetail/pgl_action')?>" class="row">
        <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
        <div class="form-group col-12">
            <label class="control-label">Nama Kegiatan</label>
            <input class="form-control col-9" type="text" name="pgl_kegiatan">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Lokasi Kegiatan</label>
            <input class="form-control col-9" type="text" name="pgl_lokasi">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Instansi Pemberi Tugas</label>
            <input class="form-control col-9" type="text" name="pgl_pmbtgs">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Alamat Instansi</label>
            <textarea class="form-control col-9" rows="4" name="pgl_pmbtgs_alamat"></textarea>
        </div>

        <div class="form-group col-12">
            <label class="control-label">Nomor Kontrak</label>
            <input class="form-control col-7" type="text" name="pgl_nokontrak">
        </div>

        <div class="form-group col-4">
            <label class="control-label">Tanggal Kontrak</label>
            <input class="form-control" id="demoDate1" type="text" name="pgl_tglkontrak">
        </div>

        <div class="form-group col-4">
            <label class="control-label">Tanggal Selesai Kontrak</label>
            <input class="form-control" id="demoDate2" type="text" name="pgl_slskontrak">
        </div>

        <div class="form-group col-4">
            <label class="control-label">Tanggal Serah Terima</label>
            <input class="form-control" id="demoDate3" type="text" name="pgl_slsba">
        </div>

        <div class="form-group col-8">
            <label class="control-label">Nilai Kontrak</label>
            <input class="form-control" type="text" name="pgl_nilai">
        </div>

        <div class="form-group col-4">
            <label class="control-label">Progres Pekerjaann</label>
            <input class="form-control" type="text" name="pgl_progres">
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
      
      $('#demoDate2').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoDate3').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
});
    </script>
