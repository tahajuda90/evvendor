<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Rangking Penyedia</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-column-filter" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Penyedia</th>
                    <th>Bentuk Usaha</th>
                    <th>Asal Kota/Kabupaten</th>
                    <th>Paket Tender</th>
                    <th>Paket Non-Tender</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($rank)){
                    foreach($rank as $ra){ ?>
                <tr>
                    <td><?=$ra->rkn_nama?></td>
                    <td><?=$ra->btu_nama?></td>
                    <td><?=$ra->kbp?></td>
                    <td><?=$ra->jml_tndr?></td>
                    <td><?=$ra->jml_nontndr?></td>
                    <td><?=rating($ra->rating_nilai,3)?> </td>
                </tr>
                <?php
                    }
                }
                ?>                
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-main/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/frontend')?>/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
var dtTable = $('#datatable-column-filter').DataTable(
    { // use DataTable, not dataTable
            sDom: // redefine sDom without lengthChange and default search box
                    "t" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>"
    });
    $('#datatable-column-filter thead').append('<tr class="row-filter"><th></th><th></th><th></th><th></th><th></th><th></th></tr>');
    $('#datatable-column-filter thead .row-filter th').each(function()
    {
            $(this).html('<input type="text" class="form-control input-sm" placeholder="Search...">');
    });
    $('#datatable-column-filter .row-filter input').on('keyup change', function()
    {
            dtTable
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();
    });
});
</script>