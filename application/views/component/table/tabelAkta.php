<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Akta</th>
            <th>Tanggal</th>
            <th>Notaris</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
         <?php if(!empty($akt)){
            $no = 1;
            foreach($akt as $akt){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$akt->lhk_no?></td>
            <td><?=fdate($akt->lhk_tanggal)?></td>
            <td><?=$akt->lhk_notaris?></td>
            <td></td>
        </tr>
        <?php
        $no = $no+1;
        }
            } else {
        echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
        }
        ?>
    </tbody>
</table>