
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
                    // echo '<pre>';
                    // print_r($_SESSION);

                    $countries = $data['countries'];
                    $occupations = $data['occupation'];
                ?>

                    <?=form_open('peinfo2/'.$session->get('user_id').'')?>

                    <h4 class="heading mb">Lets get to know your location and occupation!</h4>

                    <div class="select mb">
                        <select onchange="callStates()" name="country" id="country">
                            <option selected disabled >Country*</option>
                            <?php foreach ($countries as $key => $value) {?>
                                <option <?php if (set_value('country') == $value['id']) {echo 'selected';}?>  value="<?=$value['id']?>" > <?=$value['name']?> </option>
                             <?php }?>
                        </select>
                        <span class="error"><?=display_error($validation, 'country')?></span>
                    </div>

                    <div class="select mb">
                        <select onchange="callCities()" name="state" id="state">
                            <option selected disabled>State*</option>

                        </select>
                        <span class="error"><?=display_error($validation, 'state')?></span>
                    </div>

                    <div class="select mb">
                        <select name="city" id="city">
                            <option selected disabled >All City</option>

                        </select>
                        <span class="error"><?=display_error($validation, 'city')?></span>
                    </div>

                    <div class="select mb">
                        <select name="occupation" id="occupation">
                            <option selected disabled>occupation</option>
                            <?php foreach ($occupations as $optTitle => $list) { ?>
                                <optgroup label="<?= $optTitle ?>">
                                    <?php foreach($list as $index => $value) { ?>

                                    <option <?php if (set_value('occupation') == ($optTitle.'|'.$index)) {echo 'selected';}?> value="<?= $optTitle ?>|<?= $index ?>"> <?= $value ?> </option>

                                    <?php } ?>
                                </optgroup>

                            <?php } ?>
                        </select>
                        <span class="error"><?=display_error($validation, 'occupation')?></span>
                    </div>


                    <div class="input ta mb">

                        <textarea name="hobbies" class=""  rows="3" placeholder="Hobbies..."></textarea>
                            <span class="error"><?=display_error($validation, 'hobbies')?></span>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

            function callStates() {

                 let countryid = document.querySelector('#country').value;

                $.ajax({url: "<?=base_url();?>/getstates/" + countryid+ "", success: function(result){
                // console.log(JSON.parse(result));
                let myarr = JSON.parse(result);

                document.querySelector('#state').innerHTML = ' <option selected disabled>All State*</option>';
                myarr.forEach(element => {
                    document.querySelector('#state').innerHTML += '<option value="' + element.id + '"> '+ element.name +'</option>';
                });

                }});
            }


            function callCities() {
                let countryid = document.querySelector('#country').value;
                let stateid = document.querySelector('#state').value;
                // console.log(stateid);

                $.ajax({url: "<?=base_url();?>/getcities/" +stateid+"", success: function(result){
                // console.log(JSON.parse(result));
                let myarr = JSON.parse(result);

                document.querySelector('#city').innerHTML = ' <option selected disabled>All Cities</option>';
                myarr.forEach(element => {
                    document.querySelector('#city').innerHTML += '<option value="' + element.id + '"> '+ element.name +'</option>';
                });

                }});
            }

        </script>

    </body>
</html>