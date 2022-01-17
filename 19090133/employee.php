<div class="page-header">
    <h1>Daftar Data Employee</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="employee" />
            <div class="form-group">
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
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Job Title</th>
                <th>City</th>
                <th>Country</th>
            </tr>
        </thead>
        <?php
        $sql = mysqli_query($con, "SELECT * FROM dim_employee WHERE id_employee LIKE '%$q%' OR nama LIKE '%$q%' OR city  LIKE '%$q%'  OR country LIKE '%$q%'
        ORDER BY id_employee") or die (mysqli_error($con));
        if (mysqli_num_rows($sql) > 0) {
            $x = 0;
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?= $x+1; ?></td>
                <td><?= $data['id_employee']; ?></td>
                <td ><?= $data['nama']; ?></td>
                <td ><?= $data['jobTitle']; ?></td>
                <td ><?= $data['city']; ?></td>
                <td ><?= $data['country']; ?></td>
            </tr>
            <?php
            $x++;
        }
    }
?>
</table>
</div>