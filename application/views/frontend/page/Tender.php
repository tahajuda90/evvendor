
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="widget widget-metric_8">
                    <div class="heading clearfix">
                        <span class="title">JUMLAH PAKET</span>
                    </div>
                    <i class="ti-package custom-text-blue4"></i>
                    <span class="value"><?=$real[0]->jmlh_pkt?> Paket</span>
                    <p class="info">Total Pagu Rp. <?= number_format_short($real[0]->pagu)?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget widget-metric_8">
                    <div class="heading clearfix">
                        <span class="title">JUMLAH KONTRAK</span>
                    </div>
                    <i class="ti-write custom-text-purple"></i>
                    <span class="value"><?=$real[0]->jmlh_kntrk?> Kontrak</span>
                    <p class="info">Total Nilai Kontrak Rp. <?= number_format_short($real[0]->kontrak)?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget widget-metric_8">
                    <div class="heading clearfix">
                        <span class="title">EFISIENSI</span>
                    </div>
                    <i class="ti-wallet custom-text-green3"></i>
                    <span class="value"><?= number_format_short($real[0]->selisih,1)?></span>
                    <p class="info"><i class="ti-arrow-up icon-change"></i> Realisasi Kontrak <?= $real[0]->jmlh_kntrk!=0? prosentase($real[0]->jmlh_kntrk, $real[0]->jmlh_pkt):0?> %</p>
                </div>
            </div>
        </div>

        <div class="panel panel-tab">
            <div class="panel-heading">
                <h3 class="panel-title">Live Data LPSE</h3>
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-briefcase"></i> Jumlah Paket</a></li>
                    <?php if($menu['tender']['active']){?>
                    <li><a href="#tab2" data-toggle="tab"> Jumlah Tender Gagal</a></li>
                    <li><a href="#tab3" data-toggle="tab"> Jumlah Tender Ulang</a></li>
                    <?php }
                    ?>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content no-padding">
                    <!-- tab 1 -->
                    <div class="tab-pane fade in active" id="tab1">
                        <div class="panel-layout dashed-separator">
                            <div class="panel-cols-1">
                                <div id="rsm_paket" class="widget-metric_9 text-center">
                                    <span class="title">Jumlah Tender</span>
                                    <span class="value">23,745</span>
                                    <span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down"></i> 14.86%</span>
                                    <span class="text-muted">vs. 15,443 (previous)</span>
                                </div>
                                <canvas id="paket" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end tab 1 -->
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel-layout dashed-separator">
                            <div class="panel-cols-1">
                                <div id="rsm_gagal" class="widget-metric_9 text-center">
                                    <span class="title">Jumlah Tender</span>
                                    <span class="value">23,745</span>
                                    <span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down"></i> 14.86%</span>
                                    <span class="text-muted">vs. 15,443 (previous)</span>
                                </div>
                                <canvas id="gagal" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- end tab 2 -->
                    <div class="tab-pane fade" id="tab3">
                        <div class="panel-layout dashed-separator">
                            <div class="panel-cols-1">
                                <div id="rsm_ulang" class="widget-metric_9 text-center">
                                    <span class="title">Jumlah Tender</span>
                                    <span class="value">23,745</span>
                                    <span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down"></i> 14.86%</span>
                                    <span class="text-muted">vs. 15,443 (previous)</span>
                                </div>
                                <canvas id="ulang" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="panel panel-tab">
    <div class="panel-heading">
        <h3 class="panel-title">Jumlah Paket Pekerjaan</h3>
        <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tabb1" data-toggle="tab"> Satuan Kerja</a></li>
            <li><a href="#tabb2" data-toggle="tab">Metode Pengadaan</a></li>
            <li><a href="#tabb3" data-toggle="tab">Jenis Pengadaan</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content no-padding">
            <div class="tab-pane fade in active" id="tabb1">
                <table id="satker" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Satker</th>
                            <th>Jumlah Paket</th>
                            <th>Realisasi Kontrak</th>
                            <th>Pagu</th>
                            <th>HPS</th>
                            <th>Nilai Kontrak</th>
                            <th>Efisiensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($stkr)) {
                            foreach ($stkr as $stk) {
                                ?>
                                <tr>
                                    <td><?= $stk->stk_nama ?></td>
                                    <td><?= $stk->jmlh_pkt ?></td>
                                    <td><?= $stk->jmlh_kntrak ?></td>
                                    <td>Rp.<?= number_format_short($stk->jmlh_pagu) ?></td>
                                    <td>Rp.<?= number_format_short($stk->jmlh_hps) ?></td>
                                    <td>Rp.<?= number_format_short($stk->jmlh_kntrk) ?></td>
                                    <td><b><?= $stk->jmlh_kntrk > 0 ? prosentase(($stk->jmlh_pagu - $stk->jmlh_kntrk), $stk->jmlh_pagu) : 0 ?>%</b></td>
                                </tr>    
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="tabb2">
                <table id="metode" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Metode Pengadaan</th>
                            <th>Jumlah Paket</th>
                            <th>Realisasi Kontrak</th>
                            <th>Pagu</th>
                            <th>HPS</th>
                            <th>Nilai Kontrak</th>
                            <th>Efisiensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($mtd)) {
                            foreach ($mtd as $mt) {
                                ?>
                                <tr>
                                    <td><?= $mt->nama_metode ?></td>
                                    <td><?= $mt->jmlh_pkt ?></td>
                                    <td><?= $mt->jmlh_kntrak ?></td>
                                    <td>Rp.<?= number_format_short($mt->jmlh_pagu) ?></td>
                                    <td>Rp.<?= number_format_short($mt->jmlh_hps) ?></td>
                                    <td>Rp.<?= number_format_short($mt->jmlh_kntrk) ?></td>
                                    <td><b><?= $mt->jmlh_kntrk > 0 ? prosentase(($mt->jmlh_pagu - $mt->jmlh_kntrk), $mt->jmlh_pagu) : 0 ?>%</b></td>
                                </tr>    
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="tabb3">
                <table id="metode" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Pengadaan</th>
                            <th>Jumlah Paket</th>
                            <th>Realisasi Kontrak</th>
                            <th>Pagu</th>
                            <th>HPS</th>
                            <th>Nilai Kontrak</th>
                            <th>Efisiensi</th>
                        </tr>
                    </thead>
                     <tbody>
                        <?php if (isset($kua)) {
                            foreach ($kua as $ku) {
                                ?>
                                <tr>
                                    <td><?= $ku->nama_kualifikasi ?></td>
                                    <td><?= $ku->jmlh_pkt ?></td>
                                    <td><?= $ku->jmlh_kntrak ?></td>
                                    <td>Rp.<?= number_format_short($ku->jmlh_pagu) ?></td>
                                    <td>Rp.<?= number_format_short($ku->jmlh_hps) ?></td>
                                    <td>Rp.<?= number_format_short($ku->jmlh_kntrk) ?></td>
                                    <td><b><?= $ku->jmlh_kntrk > 0 ? prosentase(($ku->jmlh_pagu - $ku->jmlh_kntrk), $ku->jmlh_pagu) : 0 ?>%</b></td>
                                </tr>    
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/frontend')?>/vendor/chart-js/Chart.min.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
    $('#satker').dataTable(
    {
            sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>"
    });
    $('#metode').dataTable(
    {
            sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>"
    });
    

    var pkt = document.getElementById("paket").getContext("2d");
    var ggl = document.getElementById("gagal").getContext("2d");
    var ulg = document.getElementById("ulang").getContext("2d");
    var scalesOptions = {
				xAxes: [
				{
                                    gridLines:
                                    {
                                            display: false
                                    }
				}],
				yAxes: [
				{
                                    ticks:{
                                        display:false
                                    },
                                    gridLines:
                                    {
                                            display: false
                                    }
				}]
			};
			
        $.ajax({
            type:"GET",
            dataType: 'json',
            delay: 250,
            url:"<?= $url_grafik?>",
            success:function(data){
                var paket = new Chart(pkt,{
				type: 'line',
				data:
				{
					labels: data.tahun,
					datasets: [
					{
						data: data.paket,
						label: 'Paket',
						fill: false,
						borderWidth: 2,
						pointRadius: 3,
						pointHoverRadius: 5,
						borderColor: '#aef046',
						backgroundColor: '#fff'
					}]
				},
				options:
				{
					responsive: true,
					scales: scalesOptions
				}
			});
                var gagal = new Chart(ggl,{
				type: 'line',
				data:
				{
					labels: data.tahun,
					datasets: [
					{
						data: data.gagal,
						label: 'Paket',
						fill: false,
						borderWidth: 2,
						pointRadius: 3,
						pointHoverRadius: 5,
						borderColor: '#f046ae',
						backgroundColor: '#fff'
					}]
				},
				options:
				{
					responsive: true,
					scales: scalesOptions
				}
			});
                var ulang = new Chart(ulg,{
				type: 'line',
				data:
				{
					labels: data.tahun,
					datasets: [
					{
						data: data.ulang,
						label: 'Paket',
						fill: false,
						borderWidth: 2,
						pointRadius: 3,
						pointHoverRadius: 5,
						borderColor: '#45aeef',
						backgroundColor: '#fff'
					}]
				},
				options:
				{
					responsive: true,
					scales: scalesOptions
				}
			});
            }
        });
        
        $.ajax({
            type:"GET",
            dataType:'json',
            delay:250,
            url:'<?=$url_resume?>',
            success:function(data){
                $('#rsm_paket').html('<span class="title">Jumlah Tender '+data.paket.tahun+'</span><span class="value">'+data.paket.jmlh+' Paket</span>'+tanda(data.paket.jmlh,data.paket.sebelum)+'</i> '+data.paket.prosentase+'% </span><span class="text-muted">vs. '+data.paket.sebelum+' Paket (previous)</span>');
                $('#rsm_gagal').html('<span class="title">Jumlah Tender Gagal '+data.gagal.tahun+'</span><span class="value">'+data.gagal.jmlh+' Paket</span>'+tanda(data.gagal.jmlh,data.gagal.sebelum)+'</i> '+data.gagal.prosentase+'% </span><span class="text-muted">vs. '+data.gagal.sebelum+' Paket (previous)</span>');
                $('#rsm_ulang').html('<span class="title">Jumlah Tender Ulang '+data.ulang.tahun+'</span><span class="value">'+data.ulang.jmlh+' Paket</span>'+tanda(data.ulang.jmlh,data.ulang.sebelum)+'</i> '+data.ulang.prosentase+'% </span><span class="text-muted">vs. '+data.ulang.sebelum+' Paket (previous)</span>');
                console.log(data.paket);
            }
        });
        
        function tanda(a,b){
            if(a>b){
                return '<span class="percentage text-indicator-green"><i class="fa fa-sort-up icon-up">';
            }else if(a<b){
                return '<span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down">';
            }else{
                return '<span class="percentage text-indicator-primary"><i class="fa fa-sort">';
            }
        }
                        
});
</script>