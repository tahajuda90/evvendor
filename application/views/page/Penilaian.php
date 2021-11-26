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
                                <td><?=number_format($pkt->rating_nilai, 2, ',', ' ')?></td>
                                <td><?php 
                                if( $pkt->id_kualifikasi != null){
                                if($pkt->total_nilai == null){
                                    echo '<a type="button" href="'.base_url('penilaian/create/'.$pkt->id_kontrak).'" class="btn btn-sm btn-primary">Buat Penilaian</a>';
                                }else{
                                    echo '<a type="button" href="'.base_url('penilaian/update/'.$pkt->id_kontrak).'" class="btn btn-sm btn-warning">Edit Penilaian</a>';
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

<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#sampleTable').DataTable({
        "order": [[ 0, "desc" ]]
    });
    
   
    });
</script>