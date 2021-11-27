
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
                    <p class="info"><i class="ti-arrow-up icon-change"></i> Realisasi Kontrak <?= prosentase($real[0]->jmlh_kntrk, $real[0]->jmlh_pkt)?> %</p>
                </div>
            </div>
        </div>

        <div class="panel panel-tab">
            <div class="panel-heading">
                <h3 class="panel-title">Live Data LPSE</h3>
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-briefcase"></i> Jumlah Paket</a></li>
                    <li><a href="#tab2" data-toggle="tab"> Jumlah Tender Gagal</a></li>
                    <li><a href="#tab3" data-toggle="tab"> Jumlah Tender Ulang</a></li>
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
                                <div  id="paket" class="margin-top-50"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab 1 -->
                    <div class="tab-pane fade in active" id="tab2">
                        <div class="panel-layout dashed-separator">
                            <div class="panel-cols-1">
                                <div id="rsm_gagal" class="widget-metric_9 text-center">
                                    <span class="title">Jumlah Tender</span>
                                    <span class="value">23,745</span>
                                    <span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down"></i> 14.86%</span>
                                    <span class="text-muted">vs. 15,443 (previous)</span>
                                </div>
                                <div  id="gagal" class="margin-top-50"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab 2 -->
                    <div class="tab-pane fade in active" id="tab3">
                        <div class="panel-layout dashed-separator">
                            <div class="panel-cols-1">
                                <div id="rsm_ulang" class="widget-metric_9 text-center">
                                    <span class="title">Jumlah Tender</span>
                                    <span class="value">23,745</span>
                                    <span class="percentage text-indicator-red"><i class="fa fa-sort-down icon-down"></i> 14.86%</span>
                                    <span class="text-muted">vs. 15,443 (previous)</span>
                                </div>
                                <div  id="ulang" class="margin-top-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Jumlah Paket Pekerjaan Satuan Kerja</h3>
    </div>
    <div class="panel-body">
        <table id="featured-datatable" class="table table-striped table-hover">
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
                <?php if(isset($stkr)){
                    foreach($stkr as $stk ){ ?>
                <tr>
                    <td><?=$stk->stk_nama?></td>
                    <td><?=$stk->jmlh_pkt?></td>
                    <td><?=$stk->jmlh_kntrak?></td>
                    <td>Rp.<?= number_format_short($stk->jmlh_pagu)?></td>
                    <td>Rp.<?= number_format_short($stk->jmlh_hps)?></td>
                    <td>Rp.<?= number_format_short($stk->jmlh_kntrk)?></td>
                    <td><b><?=$stk->jmlh_kntrk > 0 ? prosentase(($stk->jmlh_pagu-$stk->jmlh_kntrk),$stk->jmlh_pagu):0?>%</b></td>
                </tr>    
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?= base_url('assets/frontend')?>/vendor/jquery-sparkline/js/jquery.sparkline.min.js"></script>
<!--<script src="<?= base_url('assets/frontend')?>/vendor/Flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/Flot/jquery.flot.resize.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/flot.tooltip/jquery.flot.tooltip.js"></script>-->
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
    $('#featured-datatable').dataTable(
    {
            sDom: "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>"
    });

        var sparklineParams = {
                width: '100%',
                height: '70px',
                lineWidth: '2',
                lineColor: 'rgba(0,56,255,0.30)',
                fillColor: 'rgba(0,56,255,0.15)',
                spotRadius: '2',
                highlightLineColor: 'rgba(0,56,255,0.30)',
                highlightSpotColor: 'rgba(0,56,255,0.30)',
                spotColor: '',
                minSpotColor: false,
                maxSpotColor: false,
                disableInteraction: false,
                tooltipClassname: 'jqstooltip flotTip',
                normalRangeMin: 0
        };
        $.ajax({
            type:"GET",
            dataType: 'json',
            delay: 250,
            url:"<?= $url_grafik?>",
            success:function(data){
                $('#paket').sparkline(data.paket, sparklineParams);
                $('#gagal').sparkline(data.gagal, sparklineParams);
                $('#ulang').sparkline(data.gagal, sparklineParams);
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
                $('#rsm_ulang').html('<span class="title">Jumlah Tender Gagal '+data.ulang.tahun+'</span><span class="value">'+data.ulang.jmlh+' Paket</span>'+tanda(data.ulang.jmlh,data.ulang.sebelum)+'</i> '+data.ulang.prosentase+'% </span><span class="text-muted">vs. '+data.ulang.sebelum+' Paket (previous)</span>');
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