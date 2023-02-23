
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

$mypics = get_images_with_path($partnerprof['pics'], false);

// var_dump($userinfo['about_me']);

$qualif = $data;

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

    <form>
        <div class="aboutme mb2 editpartner">
            <div>
                <label>Age</label>
                <div class="rangebox">
                    <div class="ageinfo">
                        <p>14</p>
                    </div>
                    <div id="slider-range-age"></div>

                    <input type="hidden" value="" name="min-age" id="min-age-val">
                    <input type="hidden" value="" name="max-age" id="max-age-val">
                </div>

                <label>Height</label>
                <div class="rangebox">
                    <div class="heightinfo">
                        <p>14</p>
                    </div>
                    <div id="slider-range-height"></div>

                    <input type="hidden" value="" name="min-height" id="min-height-val">
                    <input type="hidden" value="" name="max-height" id="max-height-val">
                </div>


                <label>Language</label>
                <div class="rangebox">
                    <div class="multisel">
                        <select style="width:100%;" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Hindi</option>
                            <option value="WY">Englsih</option>
                            <option value="WY">Marathi</option>
                            <option value="WY">Telegu</option>
                            <option value="WY">Tamil</option>
                            <option value="WY">Malayalm</option>
                            <option value="WY">Bengali</option>
                            <option value="WY">Gujrati</option>
                        </select>
                    </div>
                </div>

                <div class="loadmore">
                    <a href="#" class="btn">Load more</a>
                </div>

                <div class="foldable">
                    <label>Country</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select style="width:100%;" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="AL">Hindi</option>
                                <option value="WY">Englsih</option>
                                <option value="WY">Marathi</option>
                                <option value="WY">Telegu</option>
                                <option value="WY">Tamil</option>
                                <option value="WY">Malayalm</option>
                                <option value="WY">Bengali</option>
                                <option value="WY">Gujrati</option>
                            </select>
                        </div>
                    </div>

                    <label>State</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select style="width:100%;" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="AL">Hindi</option>
                                <option value="WY">Englsih</option>
                                <option value="WY">Marathi</option>
                                <option value="WY">Telegu</option>
                                <option value="WY">Tamil</option>
                                <option value="WY">Malayalm</option>
                                <option value="WY">Bengali</option>
                                <option value="WY">Gujrati</option>
                            </select>
                        </div>
                    </div>

                    <label>City</label>
                    <div class="rangebox">
                        <div class="multisel">
                            <select style="width:100%;" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="AL">Hindi</option>
                                <option value="WY">Englsih</option>
                                <option value="WY">Marathi</option>
                                <option value="WY">Telegu</option>
                                <option value="WY">Tamil</option>
                                <option value="WY">Malayalm</option>
                                <option value="WY">Bengali</option>
                                <option value="WY">Gujrati</option>
                            </select>
                        </div>
                    </div>
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


<script>
$(document).ready(function () {
$('.js-example-basic-multiple').select2();
});
</script>

</body>

</html>