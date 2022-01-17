<div class="page-header">
    <h1>Data Result</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="result" />
        
        <div class="form-group">
        </div>
    </form>
</div>    
    
    <table class="table table-bordered table-hover table-striped">
<thead>
                        <tr class="nw">
                            <td>No.</td>
                            <td>Date</td>
                            <td>Amount</td>
                            <td>X</td>
                            <td>Y</td>
                            <td>XX</td>
                            <td>XY</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = mysqli_query($con, "SELECT * FROM fakta") or die (mysqli_error($con));
                            if (mysqli_num_rows($sql) > 0) {
                                $x = 0;
                                $jumlah_x = 0;
                                $jumlah_y = 0;
                                $jumlah_xx = 0;
                                $jumlah_xy = 0;
                                while ($data = mysqli_fetch_array($sql)) {
                                    $jumlah_x += $x;
                                    $jumlah_y += $data['amount'];
                                    $jumlah_xx += ($x * $x);
                                    $jumlah_xy += ($x * $data['amount']);
                                    ?>
                                    <tr>
                                        <td><?= $x+1; ?></td>
                                        <td><?= $data['sk_waktu']; ?></td>
                                        <td align="center"><?= $data['amount']; ?></td>
                                        <td align="center"><?= $x; ?></td>
                                        <td align="center"><?= $data['amount']; ?></td>
                                        <td align="center"><?= $x * $x; ?></td>
                                        <td align="center"><?= $x * $data['amount']; ?></td>
                                    </tr>
                                    <?php
                                        $x++;
                                }
                                ?>
                                <tr>
                                    <td colspan = "2">Jumlah</td>
                                    <td></td>
                                    <td><?= $jumlah_x; ?></td>
                                    <td><?= $jumlah_y; ?></td>
                                    <td><?= $jumlah_xx; ?></td>
                                    <td><?= $jumlah_xy; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Rata2</td>
                                    <td></td>
                                    <td>
                                        <?php 
                                            $rata2_x = $jumlah_x/$x;
                                            echo $rata2_x;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $rata2_y = $jumlah_y/$x;
                                            echo $rata2_y;
                                        ?>
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">B1</td>
                                    <td colspan="5">
                                        <?php
                                            $b1 = ($jumlah_xy - (($jumlah_x * $jumlah_y) / $x)) / ($jumlah_xx - ($jumlah_x * $jumlah_x) / $x);
                                            echo $b1;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">B0</td>
                                    <td colspan="5">
                                        <?php
                                            $b0 = $rata2_y - $b1 * $rata2_x;
                                            echo $b0;
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div> 
    </section>
    <section class="section colored" id="result">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Prediction</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Formula</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price"> Linear Regression </span>
                            </div>
                            <ul class="list">
                                <li class="active">
                                    <?php
                                        $y = $b0." + ".$b1.".x";
                                        echo $y;
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">Result</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="price">Prediction</span>
                            </div>
                            <ul class="list">
                                <?php
                                    if (isset($_POST['predict'])) {
                                        $tahun = $_POST['tahun'];
                                        $thn = ($x - 1) + $tahun;
                                        $prediksi = $b0 + ($b1 * $thn);
                                        ?>
                                        <li class="active">predictions for the next <?= $tahun; ?> years is <strong><?= $prediksi; ?></strong></li>
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <center>
                <a href="?m=predic" class="main-button">Re-predict</a>
            </center>
        </div>
    </section>
</div>
</div>

