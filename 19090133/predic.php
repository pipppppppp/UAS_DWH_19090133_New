
            </div>
        </div>
    </div>
    <section class="section colored" id="pricing-plans">
       <center>
            <div class="container">
                <!-- ***** Pricing Item Start ***** -->
                <div class="col-xs-6 col-sm-8 col-lg-10" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title" id="predict">Prediction</h3>
                        </div>
                        <form action="?m=result" method="POST">
                            <div class="pricing-body">
                                <p>predictions for the next
                                <select name="tahun" id="tampil_tahun" required>
                                    <?php
                                        for ($i=1; $i <= 10 ; $i++) { 
                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                                years.</p>
                            </div>
                            <div class="pricing-footer">
                                <button type="submit" name="predict" value="PREDICT" id="form-submit" class="main-button">Predict</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </center>
    </section>
