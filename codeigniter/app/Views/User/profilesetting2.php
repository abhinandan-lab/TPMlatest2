    <?php
$session = \Config\Services::session();
$request = \Config\Services::request();

// echo '<pre>';
// print_r($userinfo);
// print_r($data);
// echo '</pre>';
// print_r($pics);
// echo get_images_with_path($pics);
// exit;
// echo $pics[0]['img_path'];

//  print_r(get_images_with_path($userinfo['pics'], false));

$mypics = get_images_with_path($userinfo['pics'], false);

// var_dump($userinfo['about_me']);

$qualif = $data;

?>

<?php display_flash_msg();?>
<div class="foot">

<div class="container">
    <div class="top">
        <img src="<?=get_images_with_path($userinfo['pics'])?>" alt="profile pic">
    </div>

    <div class="nameinfo">
        <h2><?=ucfirst($userinfo['fname'])?> &nbsp;<?=ucfirst($userinfo['lname'])?> </h2>
        <p>Edit profile</p>
        <div class="mb2"></div>
    </div>

    <form>

        <div class="pictures">
            <p>Pictures</p>
            <div class="imglist">

                <?php foreach ($mypics as $key => $value): ?>
                    <div>
                        <img src="<?=$value['img']?>" id="<?=$value['id']?>">
                        <a href="#"> <i class="fa-solid fa-xmark"></i></a>
                    </div>
                <?php endforeach;?>

            </div>

            <div id="preview">

            </div>
            <div class="input">

                <label for="myfile">Choose pictures</label>
                <input type="file" id="files" accept="image/*" name="myfile" multiple>
            </div>
        </div>
    </form>

    <div class="aboutme">
        <div>
            <label>About me / Spiritual life</label>
            <textarea name="aboutme" rows="6" > <?=$userinfo['about_me']?> </textarea>

        </div>
    </div>

    <form action="">
    <div class="aboutme">
        <div>
            <label>Personal Information</label>

            <div class="det-info-inp mb">
                <label for="">First Name</label>
                <input type="text" value="<?=ucfirst($userinfo['fname'])?>" placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Last Name</label>
                <input type="text" value="<?=ucfirst($userinfo['lname'])?>" placeholder="your name">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Highest Qualification</label>
                <!-- <input type="text" value="abcd phalana " placeholder="your name"> -->
                <select name="highestQuallification" id="highQual">
                            <option selected disabled>Highest Qualification</option>
                            <?php foreach ($data['qualif'] as $optTitle => $list) {?>
                                <optgroup label="<?=$optTitle?>">
                                    <?php foreach ($list as $index => $value) {?>
                                        <span><?=  $index ?></span>

                                    <option <?php if ($userinfo['highest_qualification'] == ($optTitle . '|' . $index)) {echo 'selected';}?> value="<?=$optTitle?>|<?=$index?>"> <?=$value?> </option>

                                    <?php }?>
                                </optgroup>

                            <?php }?>
                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Height</label>
                <select name="height" id="height">
                            <option selected disabled>Select Height</option>
                            <?php foreach ($data['height'] as $key => $value): ?>
                                <option <?php if ($userinfo['height'] == $key) {echo 'selected';}?> value="<?=$key?>" > <?=$key?> cm &nbsp; ( <?=$value?> f ) </option>
                            <?php endforeach;?>
                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Weight</label>
                <select name="weight" id="weight">
                            <option selected disabled>Select Weight</option>
                            <?php foreach ($data['weight'] as $key => $value): ?>
                                <option <?php if ($userinfo['weight'] == $key) {echo 'selected';}?>  value="<?=$key?>" > <?=$value?> kg </option>
                             <?php endforeach; ?>

                </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Country</label>
                <select onchange="callStates()" name="country" id="country">
                            <option selected disabled >Country*</option>
                            <?php foreach ($data['country'] as $key => $value) {?>
                                <option <?php if ($userinfo['location_country'] == $value['id']) {echo 'selected';}?>  value="<?=$value['id']?>" > <?=$value['name']?> </option>
                             <?php }?>
                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your State</label>
                <select onchange="callCities()" name="state" id="state">
                            <option selected disabled>State*</option>
                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your City</label>
                <select name="city" id="city">
                            <option selected disabled>State*</option>

                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Occupation</label>
                <select name="occupation" id="occupation">
                            <option selected disabled>occupation</option>
                            <?php foreach ($data['occupation'] as $optTitle => $list): ?>
                                <optgroup label="<?= $optTitle ?>">
                                    <?php foreach($list as $index => $value) { ?>

                                    <option <?php if ($userinfo['occupation'] == ($optTitle.'|'.$index)) {echo 'selected';}?> value="<?= $optTitle ?>|<?= $index ?>"> <?= $value ?> </option>

                                    <?php } ?>
                                </optgroup>

                            <?php endforeach; ?>
                        </select>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your Hobbies</label>
                <textarea name="aboutme" class="" rows="3" placeholder="hobbies"><?=$userinfo['hobbies']?></textarea>
                    <span class="error"></span>
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
            <div class="radio">
                        <p>Baptized</p>
                        <div>
                            <label for="baptyes">
                            <input <?php if ($userinfo['baptized'] == "yes") {echo "checked";}?>  type="radio" id="baptyes" name="baptized" value="yes">
                            Yes</label>
                        </div>

                        <div><label for="baptno">
                            <input <?php if ($userinfo['baptized'] == "no") {echo "checked";}?> type="radio" id="baptno" name="baptized" value="no">
                            No</label>
                        </div>
                    </div>
                <span>sdfa</span>
            </div>


        </div>
    </div>

    <div class="aboutme">
        <div>
            <label>Contact Details</label>

            <div class="det-info-inp mb">
                <label for="">Your email</label>
                <input type="text" disabled value="<?=$userinfo['email']?>" placeholder="email">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp mb">
                <label for="">Your whatsapp</label>
                <input type="text" value="<?=$userinfo['whatsapp_number']?>" placeholder="phone number">
                <span>sdfa</span>
            </div>

            <div class="det-info-inp submit mb">
               <input type="submit" value="Save" >
            </div>

        </div>
    </div>
</form>


</div>




</div>
</section>



<script type="text/javascript">

const preview = (file) => {
const fr = new FileReader();
fr.onload = () => {
    const img = document.createElement("img");
    img.src = fr.result;  // String Base64
    img.alt = file.name;
    document.querySelector('#preview').append(img);
};
fr.readAsDataURL(file);
};

document.querySelector("#files").addEventListener("change", (ev) => {
if (!ev.target.files) return; // Do nothing.
[...ev.target.files].forEach(preview);
});

</script>

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


            callStates();
            callCities();
        </script>



</body>

</html>