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

// $mypics = get_images_with_path($partnerprof['pics'], false);

// var_dump($userinfo['about_me']);



$min_age = 18;
$max_age = 50;
$min_height = 154;
$max_height = 190;
$language = "Open to all";
$country_temp =  "Open to all";
$state_temp =  "Open to all";
$city_temp =  "Open to all";


if($partnerprof['age'] != null) {
    $min_age = explode('-', $partnerprof['age'])[0];
    $max_age = explode('-', $partnerprof['age'])[1];
}

if($partnerprof['height'] != null) {
    $min_height = explode('-', $partnerprof['height'])[0];
    $max_height = explode('-', $partnerprof['height'])[1];
}

// var_dump($data['countries']);

?>

<?php display_flash_msg(); ?>
<div class="foot">

    <div class="container">
        <div class="top">
            <img src="/images/download.jpeg" alt="">
        </div>

        <div class="nameinfo">
            <h2>Ranjan kumari </h2>
            <p>Edit Preference</p>
            <div class="mb2"></div>
        </div>

        <?=form_open('home/partner-preference')?>
        <div class="aboutme mb2 editpartner">
            <div>
                <label>Age</label>
                <div class="rangebox">
                    <div class="ageinfo">
                        <p><?= $min_age ?> - <?= $max_age ?></p>
                    </div>
                    <div id="slider-range-age">
                        <input type="hidden" name="age" id="ageRange" readonly>
                        <div id="age-range" class="slider"></div>
                    </div>

                </div>

                <label>Height</label>
                <div class="rangebox">
                    <div class="heightinfo">
                        <p><?= $min_height ?>cm - <?= $max_height ?>cm</p>
                    </div>
                    <div id="slider-range-height">
                        <input type="hidden" name="height" id="heightRange" readonly>
                        <div id="height-range" class="slider"></div>
                    </div>

                </div>


                <label>Language</label>
                <div class="rangebox">
                    <div class="multisel">
                        <select style="width:100%;" class="js-example-basic-multiple" name="language" id="language[]"
                            multiple="multiple">

                            <?php if($partnerprof['language'] == NULL) {
                                echo "<option selected> $language </option> ";
                            } ?>

                            <?php foreach ($data['language'][1] as $lang) {?>

                            <option <?php if ($language == $lang) {echo 'selected';}?> value="<?=$lang?>">
                                <?=$lang?> </option>

                            <?php }?>



                        </select>
                    </div>
                </div>

                <div class="loadmore">
                    <a href="Javascript:void(0);" class="">Load more</a>
                </div>

                <div class="foldable">
                    <label>Country</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select style="width:100%;" onchange="callStates()" class="js-example-basic-multiple" name="country[]" id="country"  multiple="multiple">
                                <option selected >Open to all</option>
                                <?php foreach ($data['countries'] as $key => $value) {?>
                                <option <?php if ($country_temp == $value['id']) {echo 'selected';}?>
                                    value="<?=$value['id']?>"> <?=$value['name']?> </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <label>State</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select multiple="multiple" style="width:100%;" class="js-example-basic-multiple" onchange="callCities()" name="state[]" id="state">
                            <option selected >Open to all</option>
                        </div>
                    </div>

                    <label>City f</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select multiple="multiple" class="js-example-basic-multiple" style="width:100%;" name="city[]" id="city">
                            <option selected disabled >All City</option>

                        </select>
                        </div>
                    </div>
                </div>


                <div class="det-info-inp submit mb">
                    <input type="submit" value="Save">
                </div>
            </div>
        </div>


        </form>


    </div>




</div>
</section>


<script>
let div_foldable = document.querySelector('.foldable');
div_foldable.style.display = 'none';

const loadmore_btn = document.querySelector('.loadmore');
loadmore_btn.addEventListener("click", togglePanel);

function togglePanel() {
    if (div_foldable.style.display === "none") {
        div_foldable.style.display = "block";
        document.querySelector('.loadmore > a ').innerHTML = "Hide more";
    } else {
        div_foldable.style.display = "none";
        document.querySelector('.loadmore > a ').innerHTML = "Load more";
    }
}



$(document).ready(function() {
    $('.js-example-basic-multiple').select2();


    $("#age-range").slider({
        range: true,
        min: <?= $min_age ?>,
        max: <?= $max_age ?>,
        values: [<?= $min_age ?>, <?= $max_age ?>],
        slide: function(event, ui) {
            $("#ageRange").val(ui.values[0] + " - " + ui.values[1]);
            $(".ageinfo > p").html(ui.values[0] + " - " + ui.values[1]);
        }
    });


    $("#height-range").slider({
        range: true,
        min: <?= $min_height ?>,
        max: <?= $max_height ?>,
        values: [<?= $min_height ?>, <?= $max_height ?>],
        slide: function(event, ui) {
            $("#heightRange").val(ui.values[0] + " - " + ui.values[1]);
            $(".heightinfo > p").html(ui.values[0] + " - " + ui.values[1]);
        }
    });

});
</script>



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