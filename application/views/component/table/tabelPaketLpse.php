<table class="table table-hover table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Paket</th>
                <th style="width: 20%">Anggaran</th>
                <th>Tahun</th>
                <th>Satuan Kerja</th>
                <th style="width: 10%">Jenis Pengadaan</th>
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
                <td><?=$pkt->pkt_nama?></td>
                <td>Pagu : <?= rupiah($pkt->pkt_pagu)?><br>HPS : <?= rupiah($pkt->pkt_hps)?></td>
                <td><?= fdatetahun($pkt->pkt_tgl_buat)?></td>
                <td><?= $pkt->stk_nama?></td>
                <td><?= ($pkt->status == 1 ? '<span class="badge badge-pill badge-info">Non-Tender</span>' : '<span class="badge badge-pill badge-info">Tender/Seleksi</span>')?></td>
                <td><a type="button" data-toggle="modal" class="btn btn-primary btn-sm openBtn" href="<?= base_url('C_Integrasi/paket?lls_id='.$pkt->lls_id)?>"><i class="fa fa-download"></i> Tarik Data</a></td>
            </tr>
            <?php        
                        }
                    }?>
        </tbody>
    </table>