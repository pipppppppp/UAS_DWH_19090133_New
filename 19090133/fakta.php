<div class="page-header">
    <h1>Data Tabel Fakta</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="fakta" />
        <div class="form-group">
        <div class="form-group">
            </div>
        </div>
    </form>
</div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw">
        <th>No</th>
        <th>Sk  Waktu</th>
        <th>Sk Employee</th>
        <th>Sk Produk</th>
        <th>Sk Customer</th>
        <th>Amont</th>
    </tr>
</thead>
<?php
    $sql = mysqli_query($con, "SELECT * FROM fakta") or die (mysqli_error($con));
        if (mysqli_num_rows($sql) > 0) {
            $x = 0;
            while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td><?= $x+1; ?></td>
                <td><?= $data['sk_waktu']; ?></td>
                <td align="center"><?= $data['sk_employee']; ?></td>
                <td align="center"><?= $data['sk_employee']; ?></td>
                <td align="center"><?= $data['sk_customer']; ?></td>
                <td align="center"><?= $data['amount']; ?></td>
            </tr>
            <?php
            $x++;
        }
    }
?>
</table>
</div>