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
            <h3 class="tile-title">Detail Informasi Penyedia</h3>
            <div class="tile-body">
                <div class="row">
                    <div class="col-6">
                        <b>Bentuk Usaha :</b> <?= ucfirst($rekanan->btu_nama) ?><br>
                        <b>Nama :</b> <?= ucfirst($rekanan->rkn_nama) ?><br>
                        <b>NPWP :</b> <?= ucfirst($rekanan->rkn_npwp) ?><br>
                        <b>No PKP :</b> <?= ucfirst($rekanan->rkn_pkp) ?><br>
                        <b>Asal Kota/Kabupaten :</b> <?= ucfirst($rekanan->kbp) ?><br>
                    </div>
                    <div class="col-6">
                        <b>Kontak :</b> <p><?=$rekanan->rkn_alamat?>, Kode Pos : <?=$rekanan->rkn_kodepos?> <br> Telepon : <?=$rekanan->rkn_telepon?> <br> Email : <?=$rekanan->rkn_email?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="bs-component">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ius">Ijin Usaha</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#akt">Akta</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pjk">Pajak</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pml">Pemilik</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pgr">Pengurus</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pgl">Pengalaman</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ahl">Tenaga Ahli</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prl">Peralatan</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="ius">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/ius_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/ius/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelIjinUsaha'); ?>
                        </div>
                        <div class="tab-pane fade" id="akt">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/akt_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/akt/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelAkta'); ?>
                        </div>
                        <div class="tab-pane fade" id="pjk">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/pjk_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/pjk/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelPajak'); ?>
                        </div>
                        <div class="tab-pane fade" id="pml">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/pml_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/pml/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelPemilik'); ?>
                        </div>
                        <div class="tab-pane fade" id="pgr">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/pgr_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/pgr/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelPengurus'); ?>
                        </div>
                        <div class="tab-pane fade" id="pgl">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/pgl_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/pgl/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelPengalaman'); ?>
                        </div>
                        <div class="tab-pane fade" id="ahl">
                            <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/ahl_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/ahl/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelTenagaAhli'); ?>
                        </div>
                        <div class="tab-pane fade" id="prl">
                             <?php 
                            if(isset($rekanan->rkn_id)){
                                echo '<a type="button" class="btn btn-sm btn-primary pull-right" href="'. base_url('C_Integrasi/prl_penyedia/'.$rekanan->rkn_id).'"><i class="fa fa-download"></i>Tarik Data</a>';
                            }else{
                                echo '<a type="button" class="btn btn-sm btn-warning pull-right" href="'. base_url('rekanan/detail/prl/'.$rekanan->id_penyedia).'"><i class="fa fa-plus"></i>Buat Data</a>';
                            }
                            $this->load->view('component/table/tabelPeralatan'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>