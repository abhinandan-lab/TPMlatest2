

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

                    // $session = \Config\Services::session();

                    $qualif = $data['qualifications'];
                    $heights = $data['heights'];
                    $weights = $data['weights'];

                ?>


                <?= form_open() ?>

                    <h4 class="heading mb">Please give some details so your partner quickly finds you!</h4>

               
                    <div class="input mb">
                        <!-- <label for="cars">Enter email</label> -->
                        <input type="text" name="fname" placeholder="First Name*"
                            value="<?= set_value('fname') ?>">
                            <span class="error"><?=display_error($validation, 'fname')?></span>
                    </div>

                    <div class="input mb">
                        <input type="text" name="lname" placeholder="Last Name*"
                            value="<?= set_value('lname') ?>">
                            <span class="error"><?=display_error($validation, 'lname')?></span>
                    </div>

                    <div class="select mb">
                    <select name="highestQuallification" id="highQual">
                            <option selected disabled>Highest Qualification</option>
                            <?php foreach ($qualif as $optTitle => $list) { ?>
                                <optgroup label="<?= $optTitle ?>">
                                    <?php foreach($list as $index => $value) { ?>

                                    <option <?php if (set_value('highestQuallification') == ($optTitle.'|'.$index)) {echo 'selected';}?> value="<?= $optTitle ?>|<?= $index ?>"> <?= $value ?> </option>

                                    <?php } ?>
                                </optgroup>

                            <?php } ?>
                        </select>
                        <span class="error"><?=display_error($validation, 'highestQuallification')?></span>
                    </div>

                    <div class="select mb">
                        <select name="height" id="height">
                            <option selected disabled>Select Height</option>
                            <?php foreach($heights as $key => $value) { ?>
                                <option <?php if (set_value('height') == $key) {echo 'selected';}?> value="<?= $key ?>" > <?= $key ?> cm &nbsp; ( <?=$value?> f ) </option>
                             <?php } ?>
                        </select>
                        <span class="error"><?=display_error($validation, 'height')?></span>
                    </div>

                    <div class="select mb">
                        <select name="weight" id="weight">
                            <option selected disabled>Select Weight</option>
                            <?php foreach($weights as $key => $value) { ?>
                                <option <?php if (set_value('weight') == $key) {echo 'selected';}?>  value="<?= $key ?>" > <?= $value ?> kg </option>
                             <?php } ?>

                        </select>
                        <span class="error"><?=display_error($validation, 'weight')?></span>
                    </div>
               
                    <div class="submit">
                        <input type="submit" value="Next">
                    </div>
                <?= form_close() ?>


                <div class="otplink">

                    <a href="Javascript:void(0)">Go back </a>
                </div>
                

            </div>
        </section>

    </body>
</html>
