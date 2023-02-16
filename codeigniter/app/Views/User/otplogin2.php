
        <!-- ========== hero section ============== -->
        <section class="container hero ">
            <div class="left b">
                <!-- verse -->
                <h2>One page Bootstrap website Template</h2>
                <h6>One page Bootst</h2>
                <button class="readmore">Read More</button>
            </div>


            <?php display_flash_msg(); ?>

            <div class="hero-form ">
            <!-- register form -->

            <?=form_open('otplogin2')?> 

                <h4 class="heading mb">Login with OTP</h4>




                <div class="input mb">
                    <label for="cars">Enter OTP</label>
                    <input type="text" name="otpnumber" placeholder="" value="">
                    <span class="error">  <?=display_error($validation, 'otpnumber')?></span>
                </div>

                <div class="timer">

                    <p>05: 42 &nbsp; <a href="#">Resend</a></p>
                </div>

                <div class="submit">
                    <input type="submit" value="Submit">
                </div>
            <?=form_close()?>


            <div class="otplink">

                <a href="#">change email</a>
            </div>


        </div>

        </section>

    </body>
</html>