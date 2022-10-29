<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vali/')?>css/main.css">
<br>
<br><br><br>

<table>
    <tbody>
        <tr>
            <td><b>Satuan Kerja :</b> <?= ucfirst($pkt->stk_nama) ?></td>     
            <td><b>Metode Pemilihan : </b> <?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender') ?></td>
        <tr>
        <tr>
            <td><b>Nama Paket :</b> <?= ucfirst($pkt->pkt_nama) ?></td>
            <td><b>Jenis Pekerjaan :</b> <?= ucfirst($pkt->nama_kualifikasi) ?></td>
        </tr>
        <tr>
            <td><b>Kode Tender :</b> <?= ucfirst($pkt->lls_id) ?></td>
            <td><b>Nilai Pagu : </b> <?= rupiah($pkt->pkt_pagu) ?></td>                    
        </tr>
        <tr>
            <td><b>Kode Sirup :</b> <?= ucfirst($pkt->rup_id) ?></td>
            <td><b>Nilai HPS : </b> <?= rupiah($pkt->pkt_hps) ?></td>
        </tr>
        <tr>
            <td><b>Nomor Kontrak :</b> <?= $kontrak->kontrak_no ?></td>
            <td><b>Nilai Kontrak : </b> <?= rupiah($kontrak->nilai_kontrak) ?></td>                    
        </tr>
        <tr>
            <td><b>Penyedia :</b> <?= $rekanan->rkn_nama ?> / NPWP : <?= $rekanan->rkn_npwp ?></td>
            <td><b> Tanggal Kontrak :</b> <?= fdate($kontrak->kontrak_mulai)?> s/d <?= fdate($kontrak->kontrak_akhir)?></td>
        </tr>
    </tbody>
</table>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th style="width: 25%">Group Penialain</th>
            <th style="width: 25%">Indikator Penilaian</th>
            <th>Bobot</th>
            <th style="width:15%">Nilai</th>
        </tr>
    </thead>
    <tbody>
         <?php if(isset($indikator)){
                      $no =1;
     foreach ($indikator as $idktr){
                      ?>
        <tr>
                            <td><?=$no?></td>
                            <td><?=$idktr->nama_group?></td>
                            <td><?=$idktr->nama_indikator?></td>
                            <td><?=$idktr->bobot?></td>
                            <td><?=$idktr->nilai?></td>
                        </tr>
        <?php
     $no++;} }else{
                      echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
                  }?>
    </tbody>
</table>
<script src="<?= base_url('assets/vali/')?>js/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function () { 
  window.print(); 
});
</script>