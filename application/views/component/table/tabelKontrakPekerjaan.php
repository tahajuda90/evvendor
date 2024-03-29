<div class="container">
<div class="row">
    <div class="col-6">
        <b>Satuan Kerja :</b> <?= ucfirst($pkt->stk_nama) ?><br>
        <b>Nama Paket :</b> <?= ucfirst($pkt->pkt_nama) ?><br>
        <b>Kode Tender :</b> <?= ucfirst($pkt->lls_id) ?><br>
        <b>Kode Sirup :</b> <?= ucfirst($pkt->rup_id) ?><br>                        
    </div>
    <div class="col-6">
        <b>Metode Pemilihan : </b> <?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender/Seleksi') ?> : <?=$pkt->nama_metode?><br>
        <b>Jenis Pekerjaan :</b> <?= ucfirst($pkt->nama_kualifikasi) ?><br>
        <b>Nilai Pagu : </b> <?= rupiah($pkt->pkt_pagu) ?><br>
        <b>Nilai HPS : </b> <?= rupiah($pkt->pkt_hps) ?><br>
    </div>
</div>
<div class="row">
    <div class="col-6 offset-6">
        <?php if(isset($pkt->ppk_nip)){
     echo '<b>Nama PPK :</b>'.ucfirst($pkt->ppk_nama);
        }else if(isset($pkt->ppk_id)){
            echo '<a class="btn btn-sm btn-primary pull-right" type="button" href="'. base_url('C_Integrasi/ppk/'.$pkt->ppk_id).'"><i class="fa fa-download"></i>Tarik PPK</a>';
        }?>
    </div>
</div>
<div class="row">
    <?php if($pkt->is_nontender == 0){
        echo '<a class="btn btn-sm btn-primary pull-right" type="button" href="'. base_url('C_Integrasi/kontrak_save/').$pkt->id_paket.'"><i class="fa fa-download"></i>Tarik Kontrak</a>';
    } else {
        echo '<a class="btn btn-sm btn-primary pull-right" type="button" href="'. base_url('C_Integrasi/kontraknon_save/').$pkt->id_paket.'"><i class="fa fa-download"></i>Tarik Kontrak</a>';
    } ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No Kontrak</th>
                <th>Penyedia</th>
                <th>Nilai Kontrak</th>
                <th>Tanggal Kontrak</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($kontrak)){
     foreach ($kontrak as $kntr){
                      ?>
            <tr>
                <td><?=$kntr->kontrak_no?></td>
                <td><?php
                if(isset($kntr->rkn_id)&&!isset($kntr->id_rekanan)){
                    echo '<a type="button" id="tarik" data-toggle="modal" class="btn btn-primary btn-sm" href="'. base_url('C_Integrasi/penyedia?kontrak='.$kntr->id_kontrak.'&rkn_id='.$kntr->rkn_id).'"><i class="fa fa-download"></i> Tarik Data</a>';
                }else if(!isset($kntr->id_rekanan)){
                    echo '<form method="GET" id="subnpwp" action="'.base_url('C_Integrasi/penyedia?kontrak='.$kntr->id_kontrak).'"><div class="input-group"><input class="form-control form-control-sm" id="npwp" name="npwp" type="text" placeholder="NPWP Penyedia">
                <button type="button" id="tarik2" class="btn btn-primary btn-sm input-group-append">
                    <i class="fa fa-download"></i> Tarik Data
                </button></form>';
                }else{
                    echo '<a type="button" id="tarik" data-toggle="modal" class="btn btn-primary btn-sm" href="'. base_url('C_Rekanan/detail/'.$kntr->id_rekanan).'"><i class="fa fa-info-circle" ></i> Detail</a>';
                }
                ?>
                </td>
                <td><?= rupiah($kntr->nilai_kontrak)?></td>
                <td>Mulai : <?= fdateindo($kntr->kontrak_mulai) ?><br>
                Akhir : <?= fdateindo($kntr->kontrak_akhir) ?> <br>
                </td>
                <td>
                    <a class="btn btn-sm btn-warning" href="<?= base_url('paket/kontrak/update/'.$kntr->id_kontrak)?>">Edit</a>
                    <?=$kntr->pkt_id == null ? '<a class="btn btn-sm btn-danger" href="'.base_url('C_PaketKontrak/delete_ktr/'.$kntr->id_kontrak).'">Hapus</a>':''?>
                </td>
            </tr>
            
            <?php
        } }else{
                      echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
                  }?>
            
        </tbody>
    </table>
</div>
</div>