
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



            <?=form_open('otplogin1')?> 

                <h4 class="heading mb">Login with OTP</h4>


                <div class="input mb">
                    <label for="email">Enter email</label>
                    <input type="email" name="email" placeholder="" value="<?=set_value('email')?>">
                    <span class="error"> <?=display_error($validation, 'email')?></span>
                </div>



                <div class="submit">
                    <input type="submit" value="Get OTP">
                </div>
            <?=form_close()?>


            <div class="otplink">

                <a href="#">back to Login</a>
            </div>


        </div>
        </section>

    </body>
</html>