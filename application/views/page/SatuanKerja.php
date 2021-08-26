<div class="app-title">
    <div>
        <h1>Satuan Kerja / OPD</h1>
        <p>Daftar satuan kerja yang melakukan pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Satuan Kerja</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        
        <div class="tile">
            <?= !isset($button) ?
            '<div class="row pull-right">
                <a type="button" class="btn btn-primary btn-sm">
                    <i class="fa fa-download"></i> Tarik Data
                </a>
                <a type="button" class="btn btn-warning btn-sm">
                    <i class="fa fa-plus"></i> Buat Data
                </a>
            </div>' : '' ?>
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Satuan Kerja</h3>                        
            <div class="tile-body">                
                <?php 
                if(isset($button)){
                    $this->load->view('component/form/input_satuan_kerja');
                }else{
                    $this->load->view('component/table/tabelSatuanKerja'); }
                ?>
            </div>
        </div>
    </div>
</div>

