<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Template Form</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Template Form</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/contoh_form'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Jenis Form</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/contoh_jenis_form'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Ukuran Form</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/contoh_ukuran_form'); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
$( document ).ready(function() {
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
  });
    </script>