<div class="container">
<div class="row">
    <div class="col-6">
        <b>Satuan Kerja :</b> <?= ucfirst($pkt->stk_nama) ?><br>
        <b>Nama Paket :</b> <?= ucfirst($pkt->pkt_nama) ?><br>
        <b>Kode Tender :</b> <?= ucfirst($pkt->lls_id) ?><br>
        <b>Kode Sirup :</b> <?= ucfirst($pkt->rup_id) ?><br>                        
    </div>
    <div class="col-6">
        <b>Metode Pemilihan : </b> <?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender') ?><br>
        <b>Jenis Pekerjaan :</b> <?= ucfirst($pkt->nama_kualifikasi) ?><br>
        <b>Nilai Pagu : </b> <?= rupiah($pkt->pkt_pagu) ?><br>
        <b>Nilai HPS : </b> <?= rupiah($pkt->pkt_hps) ?><br>
    </div>
</div>
<div class="row">
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
                if(isset($kntr->rkn_id) && !isset($kntr->id_rekanan)){
                    echo '<a type="button" id="tarik" data-toggle="modal" class="btn btn-primary btn-sm" href="'. base_url('C_Integrasi/penyedia?rkn_id='.$kntr->rkn_id).'">Tarik Data</a>';
                }else if(!isset($kntr->id_rekanan)){
                    echo '<form method="GET" id="subnpwp" action="'.base_url('C_Integrasi/penyedia').'"><div class="input-group"><input class="form-control form-control-sm" id="npwp" name="npwp" type="text" placeholder="NPWP Penyedia">
                <button type="button" id="tarik2" class="btn btn-primary btn-sm input-group-append">
                    <i class="fa fa-download"></i> Tarik Data
                </button></form>';
                }else{
                    echo 'detail';
                }
                ?>
                </td>
                <td><?= rupiah($kntr->nilai_kontrak)?></td>
                <td>Mulai : <?= fdateindo($kntr->kontrak_mulai) ?><br>
                Akhir : <?= fdateindo($kntr->kontrak_mulai) ?> <br>
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