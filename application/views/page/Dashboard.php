<div class="app-title">
    <div>
        <h1>Selamat Datang <?= ucfirst($this->ion_auth->user()->row()->username)?></h1>
        <p>Laporan Progress Tarik Data dan Penilaian</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ul>
</div>
<div class="row">
        <div class="col-md-8 col-lg-4">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-briefcase fa-3x"></i>
            <div class="info">
              <h4>Paket</h4>
              <p><b><?=$paket?></b> Paket</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-4">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Kontrak</h4>
              <p><b><?=$kontrak?></b> Kontrak</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-4">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-file-text fa-3x"></i>
            <div class="info">
              <h4>Penilaian</h4>
              <p><b><?=$penilaian?></b> Penyedia</p>
            </div>
          </div>
        </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Paket Pekerjaan</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/chart.js"></script>
 <script type="text/javascript">
     $.ajax({
        type: "GET",
        dataType: 'json',
        delay: 250,
        url:'<?= base_url('C_Dashboard/track_progres')?>',
        success:function(data){
            
            var ok = {
            labels: $.map(data,function(obj){
                return obj.bulan;
            }),
            datasets: [
                    {
                    label: "Jumlah Paket Per-Bulan",
                    backgroundColor: 'rgb(252, 116, 101)',
                    borderColor: 'rgb(255, 255, 255)',
                    data: $.map(data,function(obj){
                return obj.jmlh_pkt;
            })
                    }
            ]
          };
        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb,
        {
            type: 'bar',
            data: ok
        });
            
        }
        });
     
      
</script>