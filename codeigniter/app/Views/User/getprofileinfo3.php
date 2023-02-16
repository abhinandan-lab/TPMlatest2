
        <!-- ========== hero section ============== -->
        <section class="container hero ">
            <div class="left b">
                <!-- verse -->
                <h2>One page Bootstrap website Template</h2>
                <h6>One page Bootst</h2>
                <button class="readmore">Read More</button>
            </div>

            <div class="hero-form ">
            <!-- register form -->
            <?php

                $validation = \Config\Services::validation();

                if (isset($validation)) {

                    $validation->listErrors();
                }

                $session = \Config\Services::session();
            ?>

            <?=form_open('peinfo3/'.$session->get('user_id').'')?>

                <h4 class="heading mb">Some info about you!</h4>

                <div class="input mb">
                    <textarea name="aboutme" class="" rows="8" placeholder="About me / About my spirtual..."><?= set_value("aboutme") ?></textarea>
                    <span class="error"><?=display_error($validation, 'aboutme')?></span>
                </div>

                <div class="input mb">
                    <!-- <label for="cars">Enter email</label> -->
                    <input type="text" name="whatnumber" placeholder="Whatsapp number*" value="<?= set_value("whatnumber") ?>">
                    <span class="error"><?=display_error($validation, 'whatnumber')?></span>
                </div>

                <div class="mb">
                    <div class="radio">
                        <p>Baptized</p>
                        <div>
                            <input <?php if (set_value("baptized") == "yes") {echo "checked";}?>  type="radio" id="baptyes" name="baptized" value="yes">
                            <label for="html">Yes</label>
                        </div>

                        <div>
                            <input <?php if (set_value("baptized") == "no") {echo "checked";}?> type="radio" id="baptno" name="baptized" value="no">
                            <label for="css">No</label>
                        </div>
                    </div>
                    <span class="error"><?=display_error($validation, 'baptized')?></span>
                </div>





                <div class="submit">
                    <input type="submit" value="Next">
                </div>
            <?=form_close()?>


            <div class="otplink">

                <a href="#">Go back </a>
            </div>


        </div>
        </section>

    </body>
</html>