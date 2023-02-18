
    <?php
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        
        // echo '<pre>';
        // print_r($pics);
        // echo get_images_with_path($pics);
        // exit;
        // echo $pics[0]['img_path'];

        // print_r($userinfo)

    ?>

<?php display_flash_msg(); ?>

<div class="foot">

<div class="container">
    <div class="top">
        <img src="<?= get_images_with_path($userinfo['pics'])?>" alt="">
    </div>

    <div class="nameinfo">
        <h2> <?= ucfirst($userinfo['fname']) ?> &nbsp;<?= ucfirst($userinfo['lname']) ?> </h2>

        <div class="edits">
            <div>

                <a href="/home/edit-profile">Edit Profile</a>
            </div>
            <div>

                <a href="/home/edit-partner-preference">Edit Preference</a>
            </div>
        </div>

        <p>Account Type: <span><?= ucfirst( get_accountType($userinfo['account_type']) ) ?></span></p>
        <a href="#">Become a premium member</a>
    </div>

    <div class="activity">
        <p>Your activity summary</p>
        <div>
            <div>
                <p>100 <span>95 new </span></p>
                <p>Pending invitaions</p>
            </div>

            <div>
                <p>100 <span>95 new </span></p>
                <p>Pending invitaions</p>
            </div>

            <div>
                <p>100 <span>95 new </span></p>
                <p>Pending invitaions</p>
            </div>
        </div>
    </div>

    <div class="notif-parent">

        <div class="notif">
            <h6>Interest Sent ( 55 )</h6>
            <p>You have sent 155 interest, contact them now <a href="#">See now </a> </p>
        </div>
        
        <div class="notif">
            <h6>your Matches ( 55 )</h6>
            <p>You have sent 155 interest, contact them now <a href="#">See now </a> </p>
        </div>
    </div>
</div>



</div>



</body>

</html>