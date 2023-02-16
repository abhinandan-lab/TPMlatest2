
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

            <?=form_open('login')?> 

                <?php
                    $validation = \Config\Services::validation();
                    if (isset($validation)) {

                        $validation->listErrors();
                    }
                ?>

                <h4 class="heading mb">Login</h4>


                <div class="input mb">
                    <label >Enter email</label>
                    <input type="email" name="email" placeholder="Enter your email" value="<?=set_value('email')?>">
                    <span class="error">  <?=display_error($validation, 'email')?></span>
                </div>

                <div class="input mb">
                    <label >Enter Password</label>
                    <input type="password" name="password" placeholder="Enter your password" value="">
                    <span class="error">  <?=display_error($validation, 'password')?></span>
                </div>



                <div class="submit">
                    <input type="submit" value="Login">
                </div>
            </form>


            <div class="otplink">

                <a href="<?= base_url() ?>/otplogin1">or login with OTP</a>
            </div>


        </div>
        </section>

    </body>
</html>
