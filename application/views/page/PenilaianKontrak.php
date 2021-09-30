<div class="app-title">
    <div>
        <h1>Penilaian Hasil Pekerjaan</h1>
        <p>Penilaian pekerjaan <?=$pkt->pkt_nama?> yang dikerjakan <?=$rekanan->rkn_nama?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Penilaian Kinerja Penyedia</h3>
            <div class="tile-body">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <b>Satuan Kerja :</b> <?= ucfirst($pkt->stk_nama) ?><br>
                    <b>Nama Paket :</b> <?= ucfirst($pkt->pkt_nama) ?><br>
                    <b>Kode Tender :</b> <?= ucfirst($pkt->lls_id) ?><br>
                    <b>Kode Sirup :</b> <?= ucfirst($pkt->rup_id) ?><br> 
                    <b>Nomor Kontrak :</b> <?= $kontrak->kontrak_no?><br>
                    <b>Penyedia :</b> <?=$rekanan->rkn_nama?> / NPWP : <?=$rekanan->rkn_npwp?>
                </div>
                <div class="col-5">
                    <b>Metode Pemilihan : </b> <?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender') ?><br>
                    <b>Jenis Pekerjaan :</b> <?= ucfirst($pkt->nama_kualifikasi) ?><br>
                    <b>Nilai Pagu : </b> <?= rupiah($pkt->pkt_pagu) ?><br>
                    <b>Nilai HPS : </b> <?= rupiah($pkt->pkt_hps) ?><br>
                    <b>Nilai Kontrak : </b> <?= rupiah($kontrak->nilai_kontrak) ?><br>
                    <b> Tanggal Kontrak :</b> <?= fdate($kontrak->kontrak_mulai)?> s/d <?= fdate($kontrak->kontrak_akhir)?>
                </div>
            </div>
            
        </div>
            </div>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form method="post" action="<?=$action?>">
                <?php if($button=='Simpan')
                {
                    $this->load->view('component/table/tabelNilaiCreate');                        
                }else{
                    $this->load->view('component/table/tabelNilaiUpdate'); 
                } ?>
                <button class="btn btn-primary offset-11" type="submit"><?=$button?></button>
                </form>
            </div>
        </div>
    </div>
</div>