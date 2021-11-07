<div class="app-title">
    <div>
        <h1>Metode Pemilihan</h1>
        <p>Metode Proses Pemilihan Penyedia Pengadaan Barang / Jasa</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Metode Pemilihan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Input Metode Pemilihan</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/input_metode_pemilihan');?>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Daftar Jenis / Metode Pengadaan</h3>
            <div class="tile-body">
                <?php $this->load->view('component/table/tabelMetodePemilihan')?>
            </div>
        </div>
    </div>
</div>