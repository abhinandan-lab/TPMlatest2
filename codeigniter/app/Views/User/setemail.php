
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
 
                <?php display_flash_msg(); ?>

                <?=form_open('setemail')?> 

                    <?php
                        $validation = \Config\Services::validation();
                        if (isset($validation)) {

                            $validation->listErrors();
                        }
                    ?>

                    <h4 class="heading mb2">Create Email Password</h4>


                    <div class="input mb">
                        <label for="email">Enter email</label>
                        <input required type="email" name="email" placeholder="" value="<?=set_value('email')?>">
                        <span class="error">  <?=display_error($validation, 'email')?></span>
                    </div>

                    <div class="input mb">
                        <label for="password">Set Password</label>
                        <input required type="text" name="password" placeholder="" value="<?=set_value('password')?>">
                        <span class="error">  <?=display_error($validation, 'password')?></span>
                    </div>



                    <div class="submit">
                        <input type="submit" value="Submit">
                    </div>
                <?=form_close()?>

                <div class="otplink">

                    <a href="<?=base_url();?>">or new Register </a>
                </div>


            </div>
        </section>

    </body>
</html>