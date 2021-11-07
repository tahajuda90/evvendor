<div class="app-title">
    <div>
        <h1>Kualifikasi Pekerjaan</h1>
        <p>Kualifikasi pekerjaan / Jenis Pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Kualifikasi Pekerjaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Kualifikasi Pekerjaan</h3>
            <?= (isset($button) ? '':'<a type="button" class="btn btn-sm btn-primary" href="'. base_url('kualifikasi/create').'"><i class="fa fa-plus"></i> Tambah</a>')?>
            <div class="tile-body">
                <?php 
                if(isset($button)){
                    $this->load->view('component/form/input_kualifikasi_pekerjaan');
                }else{
                    $this->load->view('component/table/tabelKlasifikasiPekerjaan');
                }
                ?>
            </div>
        </div>
    </div>
</div>