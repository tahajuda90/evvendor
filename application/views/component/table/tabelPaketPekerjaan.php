<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Paket</th>
                    <th>Pagu</th>
                    <th>HPS</th>
                    <th>Satuan Kerja</th>
                    <th>Jenis Pengadaan</th>
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
                                <td><?= rupiah($pkt->pkt_pagu)?></td>
                                <td><?= rupiah($pkt->pkt_hps)?></td>
                                <td><?= $pkt->stk_nama?></td>
                                <td><?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender/Seleksi')?>
                                    <br>
                                    <?=$pkt->nama_kualifikasi?>
                                </td>
                                <td><?php
                                if($pkt->id_kualifikasi == null){
                                    echo '<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-id="'.$pkt->id_paket.'" data-val="'.$pkt->pkt_nama.'" data-target="#exampleModal">Pilih Kualifikasi</button>';
                                }
                                if(($pkt->child == 0)&&($pkt->is_nontender == 1)||($pkt->pkt_id == null)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('paket/kontrak/create/'.$pkt->id_paket).'">Buat Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }
                                else if(($pkt->child == 0)&&($pkt->pkt_id != null)&&($pkt->is_nontender == 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('C_Integrasi/kontrak_save/').$pkt->id_paket.'">Tarik Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }else if(($pkt->child > 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('paket/kontrak/'.$pkt->id_paket).'">Detail Paket</a>';
                                }else{
                                    echo '<a type="button" class="btn btn-sm btn-primary">Detail</a>';
                                }
                                ?>
                                    <br><a type="button" class="btn btn-sm btn-warning" href="<?= base_url('paket/update/'.$pkt->id_paket)?>">Edit</a>
                                </td>
                            </tr>
                    
                    <?php        
                        }
                    }?>
                  
                </tbody>
                </table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="get" action="<?= base_url('C_PaketKontrak/assign_klas')?>">
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
<script type="text/javascript">
    $( document ).ready(function() {
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


