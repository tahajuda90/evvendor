<div class="app-title">
    <div>
        <h1>Paket Tender/Non-Tender</h1>
        <p>Penilaian Hasil Pekerjaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Paket Pekerjaan</li>
    </ul>
</div>
<?php if(empty($this->ion_auth->get_users_department($this->ion_auth->get_user_id())->result())){
   ?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Rekap Penilaian</h3>
            <div class="tile-body">
                <form method="get" action="<?= base_url('C_Skoring/cetak')?>" class="row">
                    <div class="col-md-7 form-group">
                        <select class="form-control" name="satker" id="satker">
                            <option></option>
                            <?php
                            foreach ($satker as $stk) {
                                echo '<option value="' . $stk->id_satker . '">' .$stk->stk_nama.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class=" col-md-3 form-group">
                        <select class="form-control" name="tahun" id="tahun">
                            <option></option>
                            <?php
                            foreach ($tahun as $thn) {
                                echo '<option value="' . $thn->tahun . '">' .$thn->tahun.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 form-group text-center">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-download"></i>Rekap</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Daftar Paket</h3>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Satuan Kerja</th>
                    <th>Nama Paket</th>
                    <th>Pagu/HPS</th>
                    <th>Jenis Pengadaan</th>
                    <th>Rating</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($pkt)){
                        foreach($pkt as $pkt){ ?>
                    <tr>
                                <td>Tender : <?= $pkt->lls_id ?><br>
                                Sirup : <?= $pkt->rup_id ?>
                                </td>
                                <td><?=$pkt->stk_nama?></td>
                                <td><b><?=$pkt->pkt_nama?></b><br>Penyedia : <?=$pkt->rkn_nama?></td>
                                <td><?= rupiah($pkt->pkt_pagu)?><br><?= rupiah($pkt->pkt_hps)?></td>
                                <td><?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender')?>
                                    <br>
                                    <?=$pkt->nama_kualifikasi?>
                                </td>
                                <td><?= rating($pkt->rating_nilai, 3)?></td>
                                <td><?php 
                                if( $pkt->id_kualifikasi != null){
                                if($pkt->total_nilai == null){
                                    echo '<a type="button" href="'.base_url('penilaian/create/'.$pkt->id_kontrak).'" class="btn btn-sm btn-primary">Buat Penilaian</a>';
                                    echo '<a type="button" href="#" class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></a>';
                                }else{
                                    echo '<a type="button" href="'.base_url('penilaian/update/'.$pkt->id_kontrak).'" class="btn btn-sm btn-warning">Edit Penilaian</a>';
                                    echo '<a type="button" href="'.base_url('penilaian/cetak/'.$pkt->id_kontrak).'" class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></a>';
                                }} ?></td>
                            </tr>
                    
                    <?php        
                        }
                    }?>
                  
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#satker').select2({
        placeholder:"Pilih Satuan Kerja",
        allowClear: true
    });
    $('#tahun').select2({
        placeholder:"Pilih Tahun",
        allowClear: true
    });
        
    $('#sampleTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
    
   
    });
</script>