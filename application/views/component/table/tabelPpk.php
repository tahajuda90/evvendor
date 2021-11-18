<table class="table table-hover table-bordered" id="sampleTable">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Nip</td>
            <td>Pangkat</td>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($ppk)){
            $no = 1;
            foreach($ppk as $ppk){ ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$ppk->ppk_nama?></td>
                <td><?=$ppk->ppk_nip?></td>
                <td><?=$ppk->ppk_pangkat?></td>
            </tr>
        <?php    $no++;}
        }?>        
    </tbody>
</table>
<!-- Data table plugin-->
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#sampleTable').DataTable();
    });
</script>
