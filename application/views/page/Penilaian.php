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
                                <td><b><?=$pkt->pkt_nama?></b><br>Penyedia : <?=$pkt->rkn_nama?></td>
                                <td><?= rupiah($pkt->pkt_pagu)?><br><?= rupiah($pkt->pkt_hps)?></td>
                                <td><?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender')?>
                                    <br>
                                    <?=$pkt->nama_kualifikasi?>
                                </td>
                                <td><?=number_format($pkt->rating_nilai, 2, ',', ' ')?></td>
                                <td><?php if($pkt->id_kualifikasi == null){
                                    echo '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-id="'.$pkt->id_paket.'" data-val="'.$pkt->pkt_nama.'" data-target="#exampleModal">Pilih Kualifikasi</button>';
                                }elseif($pkt->total_nilai == null){
                                    echo '<a type="button" href="'.base_url('penilaian/create/'.$pkt->id_kontrak).'" class="btn btn-sm btn-primary">Buat Penilaian</a>';
                                }else{
                                    echo '<a type="button" href="'.base_url('penilaian/update/'.$pkt->id_kontrak).'" class="btn btn-sm btn-warning">Edit Penilaian</a>';
                                } ?></td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="get" action="<?= base_url('C_Skoring/assign_klas')?>">
      <div class="modal-body">
          <input type="hidden" id="paketid" name="id_paket" />
          <select class="form-control" name="id_kualifikasi">
              <?php
              foreach($kls as $kls){
                  echo '<option value="'.$kls->id_kualifikasi.'">'.$kls->kode_kualifikasi.'-'.$kls->nama_kualifikasi.'</option>';
              }
              ?>
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#sampleTable').DataTable();
    
    $("#exampleModal").on('show.bs.modal', function(event) {
        var myVal = $(event.relatedTarget).data('val');
        var myId = $(event.relatedTarget).data('id');
        $("#paketid").val(myId);
        console.log(myVal);
        console.log(myId);
        $("#exampleModalLabel").html('Paket : '+myVal);
    });
    });
</script>