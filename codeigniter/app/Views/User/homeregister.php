    <?php $data['language'][0][0]?>

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

            <?=form_open('register')?>

            <h4 class="heading mb2">Register</h4>

            <div class="select mb">
                <label for="profile">Create profile for</label>

                <select class="capitalize" name="profilehtml" id="profile">

                    <?php foreach ($data['profileFor'] as $profile) {?>
                    <option <?php if (set_value('profilehtml') == $profile) {echo 'selected';}?> value="<?=$profile?>">
                        <?=$profile?> </option>
                    <?php }?>
                </select>
                <span class="error"> <?=display_error($validation, 'profile')?></span>

            </div>

            <div class="input mb">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" placeholder="dd-mm-yyyy" value="<?=set_value('dob')?>" min="1980-01-01">
                <span class="error"> <?=display_error($validation, 'dob')?></span>
            </div>

            <div class="select mb">
                <label for="language">Language</label>

                <select class="capitalize" name="language" id="language" >
                    <optgroup label="Frequently used">
                        <?php foreach ($data['language'][0] as $lang) {?>

                        <option value="<?=$lang?>"> <?=$lang?> </option>

                        <?php }?>
                    </optgroup>

                    <optgroup label="More">
                        <?php foreach ($data['language'][1] as $lang) {?>

                        <option <?php if (set_value('language') == $lang) {echo 'selected';}?> value="<?=$lang?>">
                            <?=$lang?> </option>

                        <?php }?>
                    </optgroup>


                </select>

                <span class="error"> <?=display_error($validation, 'language')?></span>
            </div>

            <div class="mb">
                <div class="radio">
                    <p>Select gender</p>
                    <div>
                        <input <?php if (set_value("gender") == "male") {echo "checked";}?> type="radio" id="male"
                            name="gender" value="male">
                        <label for="male">Male</label>
                    </div>

                    <div>
                        <input <?php if (set_value("gender") == "female") {echo "checked";}?> type="radio" id="female"
                            name="gender" value="female">
                        <label for="female">Female</label>
                    </div>
                </div>
                <span class="error"> <?=display_error($validation, 'gender')?></span>

            </div>

            <div class="submit">
                <input type="submit" value="Continue">
            </div>
            <?=form_close();?>

        </div>
    </section>

</body>

</html>