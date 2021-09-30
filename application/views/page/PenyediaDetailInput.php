<div class="app-title">
    <div>
        <h1><?=$rekanan->rkn_nama?></h1>
        <p>Detail Informasi Penyedia</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('rekanan')?>">Penyedia Barang/Jasa</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?php $this->load->view($form)?>
        </div>
    </div>
</div>