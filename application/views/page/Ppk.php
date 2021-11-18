<div class="app-title">
    <div>
        <h1>Daftar PPK</h1>
        <p>Daftar pejabat pembuat komitmen</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">PPK</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Daftar Pejabat Pembuat Komitmen</h3>
            <div class="tile-body">
                <?php $this->load->view('component/table/tabelPpk'); ?>
            </div>
        </div>
    </div>        
</div>
