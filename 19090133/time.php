<div class="page-header">
    <h1>Daftar Waktu</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="time" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Search" name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="nw">
                <th>No</th>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Bulan</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <?php
        
        $q =($_GET['q']);
        $sql = mysqli_query($con, "SELECT * FROM dim_waktu 
        WHERE tahun LIKE '%$q%' OR bulan LIKE '%$q%' 
        ORDER BY tahun") or die (mysqli_error($con));
        if (mysqli_num_rows($sql) > 0) {
            $x = 0;
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?= $x+1; ?></td>
                <td><?= $data['id']; ?></td>
                <td><?= $data['tanggal']; ?></td>
                <td><?= $data['bulan']; ?></td>
                <td><?= $data['tahun']; ?></td>
            </tr>
            <?php
            $x++;
        }
    }
?>
</table>
</div>
    