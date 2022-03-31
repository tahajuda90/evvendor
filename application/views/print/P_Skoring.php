<center><h3 class="smart-head"><strong>TABEL REKAPITULASI PENILAIAN PENYEDIA<br></strong></h3><br></center>
<table border="1">
                <thead>
                  <tr>
                    <th>Kode Paket</th>
                    <th>Kode Sirup</th>
                    <th>Satuan Kerja</th>
                    <th>Nama Paket</th>
                    <th>Nama Penyedia</th>
                    <th>Pagu</th>
                    <th>HPS</th>
                    <th>Nilai Kontrak</th>
                    <th>Metode Pengadaan</th>
                    <th>Jenis Pengadaan</th>
                    <th>Rating</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($pkt)){
                        foreach($pkt as $pkt){ ?>
                    <tr>
                                <td><?= $pkt->lls_id ?>
                                </td>
                                <td><?= $pkt->rup_id ?></td>
                                <td><?=$pkt->stk_nama?></td>
                                <td><?=$pkt->pkt_nama?></td>
                                <td><?=$pkt->rkn_nama?></td>
                                <td><?= $pkt->pkt_pagu?></td>
                                <td><?= $pkt->pkt_hps?></td>
                                <td><?= $pkt->nilai_kontrak?></td>
                                <td><?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender')?> <?=$pkt->nama_metode?></td>
                                <td><?=$pkt->nama_kualifikasi?></td>
                                <td><?=number_format($pkt->rating_nilai, 2, ',', ' ')?></td>
                            </tr>
                    
                    <?php        
                        }
                    }?>
                  
                </tbody>
                </table>
<?php
  header("Content-type: application/vnd-ms-excel");
  header('Content-Disposition: attachment;filename="'.time().'.xls"');
?>
