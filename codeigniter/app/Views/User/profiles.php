
    <?php
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        
        // $newprofile
        $pics = $newprofile['pics'];
        // echo '<pre>';
        // print_r($pics);
        // echo get_images_with_path($pics);
        // exit;
        // echo $pics[0]['img_path'];

    ?>

<?php display_flash_msg(); ?>

        <div class="foot" style="background-image:
                url('<?= get_images_with_path($pics)?>');">

            <div class="backgroundimg">

            </div>
            <div class="btnlayer">
                <div class="top">
                    <div class="row1">
                        <i class="fa-solid fa-camera"></i>
                        <span>3</span>
                    </div>
                    <div class="row2">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <div class="center">
                    <a href="#">
                        <div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                    </a>
                    <a href="#">
                        <div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </a>
                </div>
                <div class="bottom">
                    <div class="row3">
                        <div class="info">
                            <p><?= $newprofile['fname'] ?>&nbsp;<?= $newprofile['lname'] ?></p>
                            <p><?= get_age($newprofile['dob']) ?>yrs</p>
                            <p><?= cm_to_feet_converter($newprofile['height'])?> ft</p>
                        </div>

                        <div class="location">
                            <p><?= get_state_name($newprofile['location_state']) ?>,  <?= get_city_name($newprofile['location_city']) ?></p>
                        </div>
                    </div>

                    <div class="row4">
                        <div class="btn">
                            <a href="#">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                            <span>Not Now</span>
                        </div>
                        <div class="btn">
                            <a href="#">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                            <span>Call/Whatsapp</span>
                        </div>
                        <div class="btn">
                            <a href="<?= base_url(); ?>/peinfo1/<?= $session->get('user_id') ?>">
                                <i class="fa-solid fa-user-check"></i>
                            </a>
                            <span>Connect</span>
                        </div>
                    </div>
                </div>
            </div>

            <img src="<?= get_images_with_path($pics)?>" alt="profile pic">


        </div>
    </section>


    <!-- detailed information -->
    <section id="detailed-info">
        <h4 class="text-center heading">Detailed information</h4>
        <div class="row">
            <div class="col">
                <div class="profile-name">
                    <p><?= ucfirst($newprofile['fname']) ?>&nbsp;<?= ucfirst($newprofile['lname']) ?></p>
                    <p>Created for <?= $newprofile['profile_for'] ?></p>
                </div>

                <ul>
                    <li><i class="fa-solid fa-language"></i>
                        <p><?= ucfirst($newprofile['language']) ?></p>
                    </li>
                    <li><i class="fa-solid fa-location-dot"></i>
                        <p><?= get_country_name($newprofile['location_country'])?>, <?= get_state_name($newprofile['location_state']) ?>,  <?= get_city_name($newprofile['location_city']) ?></p>
                    </li>
                    <li><i class="fa-solid fa-cake-candles"></i>
                        <p><?= formated_date($newprofile['dob']) ?> | <?= get_age($newprofile['dob']) ?>yrs</p>
                    </li>
                    <li> <i class="fa-solid fa-person-arrow-up-from-line"></i>
                        <p>height <?= $newprofile['height'] ?>cm  ( <?= cm_to_feet_converter($newprofile['height']) ?> ft )</p>
                    </li>
                    <li> <i class="fa-solid fa-weight-scale"></i>
                        <p>weight <?= get_weight($newprofile['weight']) ?> kg</p>
                    </li>
                    <li> <i class="fa-solid fa-briefcase"></i>
                        <p><?= get_occupation($newprofile['occupation']) ?></p>
                    </li>
                    <li><i class="fa-solid fa-user-graduate"></i>
                        <p><?= get_education($newprofile['highest_qualification']) ?></p>
                    </li>
                    <li><i class="fa-solid fa-gamepad"></i>
                        <p><?= $newprofile['hobbies']? $newprofile['hobbies']: 'hobbies Unknown' ?></p>
                    </li>
                    <li><i class="fa-solid fa-person-drowning"></i>
                        <p>baptized <?= strtoupper($newprofile['baptized'])? strtoupper($newprofile['baptized']): 'Unknown'  ?></p>
                    </li>
                </ul>
            </div>
            <div class="col left-line">

                <h5>About me / Spirtual life</h5>
                <p><?= $newprofile['about_me'] ?></p>


                <h5>Contact Details</h5>
                <ul>
                    <li><i class="fa-regular fa-envelope"></i>
                        <p><?= get_emailaddress($newprofile['account_type'], $newprofile['email']) ?></p>
                    </li>
                    <li><i class="fa-brands fa-whatsapp"></i>
                        <p> <?= get_whatsapNumber($newprofile['account_type'], $newprofile['whatsapp_number']) ?></p>
                    </li>
                    <li> <a href="#"><p>Go Premium</p> <span>To view contact's</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </section>

</body>

</html>