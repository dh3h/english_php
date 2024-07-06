<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
require_once('./inc/sidebar.php');
$select_user_list = $action->database->query_sql("SELECT * FROM `tbl_user` WHERE user_uid = '{$user_id}';");
if ($select_user_list) {
    foreach ($select_user_list as $data_user_list) {
    }
}
?>
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        /* margin: 50px auto; */
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        /* content: "\f040";
                        font-family: 'FontAwesome'; */
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 102px;
        height: 102px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Your Profile</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <div class="section mt-2">
        <div class="profile-head">
            <div class="avatar">

                <div class="container" style="padding-right: 0px;">
                    <div class="avatar-upload">
                        <div class="avatar-edit">

                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><ion-icon name="create-outline" style="margin-top: 0.5rem; margin-left: 0.5rem;"></ion-icon></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('./assets/img/app-assets/avtar-icon.png');">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <img src="./assets/img/app-assets/avtar-icon.png" alt="avatar" class="imaged w64 rounded"> -->
            </div>
            <div class="in">
                <h3 class="name"><?= @$data_user_list['name'] ?></h3>
                <h5 class="subtext"><?= @$data_user_list['class'] ?></h5>
                <h6>SUBHAM8394 &nbsp;&nbsp;<ion-icon name="copy-outline"></ion-icon></h6>
                <h5 class="subtext" style="font-size: 0.7rem;"><?= @$data_user_list['email'] ?></h5>
            </div>

        </div>
        <div class="row">
            <div class="col-7">
                <!-- <div class="in">
                <a href="#" class="btn btn-outline-primary btn-block">Follow</a>
                </div> -->
            </div>
            <div class="col-5" style="text-align: end;">
                <h5 class="subtext text-primary"><a href="edit-profile.php"><ion-icon name="create-outline"></ion-icon> Edit Profile</a></h5>
            </div>
        </div>
    </div>

    <div class="section full mt-2">
        <div class="profile-stats pl-2 pr-2">
            <a href="#" class="item">
                <strong>152</strong>City Rank
            </a>

            <a href="#" class="item">
                <strong>27k</strong>Air Rank
            </a>
            <a href="#" class="item">
                <strong>52</strong>Followers
            </a>
            <a href="#" class="item">
                <strong>506</strong>following
            </a>
        </div>
    </div>

    <div class="section mt-1 mb-2">
        <div class="profile-info">

            <div class=" bio">
                <?= @$data_user_list['bio'] ?>
            </div>
            <div class="link">
                    <a href="#"><ion-icon name="school-outline"></ion-icon> <?= @$data_user_list['institute_name'] ?></a>,<br>
                    <a href="#"><ion-icon name="location-outline"></ion-icon> <?= @$data_user_list['address'] ?></a>
                </div>
        </div>
    </div>

    <div class="section full">
        <div class="wide-block transparent p-0">
            <ul class="nav nav-tabs lined iconed" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#feed" role="tab">
                        <ion-icon name="grid-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#friends" role="tab">
                        <ion-icon name="people-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#bookmarks" role="tab">
                        <ion-icon name="earth-outline"></ion-icon>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                        <ion-icon name="podium-outline"></ion-icon>
                    </a>
                </li>


            </ul>
        </div>
    </div>

    <!-- tab content -->
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <ul class="listview image-listview">
                    <?php
                    $select_questions_ask_user = $action->database->query_sql("SELECT * FROM `tbl_students_questions_ask`");
                    if ($select_questions_ask_user) {
                        foreach ($select_questions_ask_user as $data_questions_ask_user) {
                            $inputString = $data_questions_ask_user['questions_users'];
                            $wordLimit = 9;
                            $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
                            $question_id = $data_questions_ask_user['id'];

                    ?>
                            <li class="multi-level">
                                <a href="all-anwers.php?question_id=<?= @$data_questions_ask_user['id'] ?>" class="item">
                                    <div class="icon-box bg-danger">
                                        <ion-icon name="help-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div><?= @$shortenedString ?></div>
                                    </div>
                                </a>
                                <!-- sub menu -->
                                <ul class="listview link-listview" style="display: none;">
                                    <?php
                                    $select_answere_ask_user = $action->database->query_sql("SELECT * FROM `tbl_student_answers` WHERE ques_id = '{$question_id}';");
                                    if ($select_answere_ask_user) {
                                        foreach ($select_answere_ask_user as $data_answere_ask_user) {
                                            $inputString = $data_answere_ask_user['answere'];
                                            $wordLimit = 6;
                                            $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
                                    ?>
                                            <li>
                                                <a href="all-anwers.php?question_id=<?= @$data_answere_ask_user['ques_id'] ?>" class="item">
                                                    <div class="in">
                                                        <div><?= @$shortenedString ?></div>
                                                    </div>
                                                </a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>

                                </ul>
                                <!-- * sub menu -->
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <!-- * feed -->

            <!-- * friends -->
            <div class="tab-pane fade" id="friends" role="tabpanel">
                <div class="m-1" style="background: antiquewhite;">
                    <div class="section-title">My Friends Rank</div>

                    <div class="profile-stats pl-2 pr-2">
                        <a href="#" class="item">
                            <strong style="font-size: xx-large;">152</strong>
                        </a>

                    </div>
                </div>

                <ul class="listview image-listview flush transparent">
                    <div class="listview-title mt-2">Friends Ranks</div>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Edward Lindgren
                                    <div class="text-muted">532 followers <span class="text-warning" style="padding-left: 7px;"><ion-icon name="star-outline"></ion-icon>Rank: 1</span></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emelda Scandroot
                                    Emelda Scandroot
                                    <div class="text-muted">120k followers <span class="text-warning" style="padding-left: 7px;"><ion-icon name="star-outline"></ion-icon>Rank: 2</span></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Henry Bove
                                    <div class="text-muted">920k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Ava Gregoraci
                                    <div class="text-muted">5092 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emmy Elsner
                                    <div class="text-muted">92 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Lisanne Viscaal
                                    <div class="text-muted">893 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Cecilia Pozo
                                    <div class="text-muted">51k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- * friends -->

            <!--  bookmarks -->
            <div class="tab-pane fade" id="bookmarks" role="tabpanel">
                <ul class="listview image-listview flush transparent pt-1">

                    <div class="m-1" style="background: antiquewhite;">
                        <div class="section-title">Global Rank Ranks</div>

                        <div class="profile-stats pl-2 pr-2">
                            <a href="#" class="item">
                                <strong style="font-size: xx-large;">2,846,122</strong>
                            </a>

                        </div>
                    </div>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Edward Lindgren
                                    <div class="text-muted">532 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emelda Scandroot
                                    <div class="text-muted">120k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Henry Bove
                                    <div class="text-muted">920k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Ava Gregoraci
                                    <div class="text-muted">5092 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emmy Elsner
                                    <div class="text-muted">92 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Lisanne Viscaal
                                    <div class="text-muted">893 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Cecilia Pozo
                                    <div class="text-muted">51k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- * bookmarks -->
            <!-- settings -->
            <div class="tab-pane fade" id="settings" role="tabpanel">
                <div class="m-1" style="background: antiquewhite;">
                    <div class="section-title">My Block Ranks</div>

                    <div class="profile-stats pl-2 pr-2">
                        <a href="#" class="item">
                            <strong style="font-size: xx-large;">152,945</strong>
                        </a>

                    </div>
                </div>

                <ul class="listview image-listview flush transparent">
                    <div class="listview-title mt-2">Friends Ranks</div>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Edward Lindgren
                                    <div class="text-muted">532 followers <span class="text-warning" style="padding-left: 7px;"><ion-icon name="star-outline"></ion-icon>Rank: 1</span></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emelda Scandroot
                                    Emelda Scandroot
                                    <div class="text-muted">120k followers <span class="text-warning" style="padding-left: 7px;"><ion-icon name="star-outline"></ion-icon>Rank: 2</span></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Henry Bove
                                    <div class="text-muted">920k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Ava Gregoraci
                                    <div class="text-muted">5092 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Emmy Elsner
                                    <div class="text-muted">92 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Lisanne Viscaal
                                    <div class="text-muted">893 followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <img src="./assets/img/app-assets/avtar-icon.png" alt="image" class="image">
                            <div class="in">
                                <div>
                                    Cecilia Pozo
                                    <div class="text-muted">51k followers</div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- * settings -->
        </div>
    </div>
    <!-- * tab content -->

    <div class="section full mt-2 mb-2">
        <div class="section-title">MY COINS</div>
        <div class="wide-block pt-2 pb-2">

            <a href="coin-hostory.php">
                <!-- comment block -->
                <div class="comment-block">
                    <!--item -->
                    <div class="item">
                        <div class="in">
                            <div class="comment-header">
                                <h6 class="title">Coins Won</h6>
                                <span class="time">12</span>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Other Coins</h4>
                                <span class="time">1,000</span>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Coins spent</h4>
                                <span class="time">0</span>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Coins left</h4>
                                <span class="time">1,012</span>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->

                    <!--item -->
                    <div class="item">
                        <div class="in">
                            <div class="comment-header">

                                <span class="time"></span>
                                <h4 class="title text-primary">Coins Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->

                </div>
                <!-- * comment block -->
            </a>
        </div>
    </div>


    <div class="section full mt-2">
        <div class="section-title">Your Progress</div>
        <div class="wide-block pt-2 pb-2">
            <div class="row">
                <div class="col-4">
                    <div class="text-center pb-1" style="font-size: x-small; line-height: normal;">
                        Lessions Completed (form Curriculum)
                    </div>
                    <div id="circle1" class="circle-progress">
                        <div class="in">
                            <div class="text">
                                <!-- <h3 class="value">590</h3> -->
                                1 out of 475
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-center pb-3" style="font-size: x-small; line-height: normal;">
                        Game played(form Curriculum)
                    </div>
                    <div id="circle2" class="circle-progress">
                        <div class="in">
                            <div class="text">
                                <!-- <h3 class="value">153</h3> -->
                                0 out of 950
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="text-center" style="padding-bottom: 20px;font-size: x-small; line-height: normal;">
                        Attendance
                    </div>
                    <div id="circle3" class="circle-progress">
                        <div class="in">
                            <div class="text">
                                <!-- <h3 class="value">21</h3> -->
                                15/51 Days
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="section-title">Connect</div>
        <div class="row mb-3">
            <div class="col-6">
                <div class="">
                    <a href="#" class="btn btn-outline-primary btn-block"><img src="./assets/img/app-assets/google-icon.png" style="padding-right: 3px;" alt=""> Google +</a>
                    <span style="font-size: small;">Login Via Google to win 400 coins</span>
                </div>
            </div>
            <div class="col-6">
                <div class="">
                    <a href="#" class="btn btn-primary btn-block"><img src="./assets/img/app-assets/facebook-icon.png" style="padding-right: 3px;" alt=""> Facebook</a>
                    <span style="font-size: small;">Login Via Facebook to win 400 coins</span>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- * App Capsule -->

<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });



    $('#circle1').circleProgress({
        value: 0.75,
        size: 500, // do not delete this
        fill: {
            gradient: ["#1E74FD", "#592BCA"]
        },
        animation: {
            duration: 2000
        }
    });
    $('#circle2').circleProgress({
        value: 0.25,
        size: 500, // do not delete this
        fill: {
            gradient: ["#EC4433", "#FE9500"]
        },
        animation: {
            duration: 2000
        }
    });
    $('#circle3').circleProgress({
        value: 0.55,
        size: 500, // do not delete this
        fill: {
            gradient: ["#00CDFF", "#1E74FD"]
        },
        animation: {
            duration: 2000
        }
    });
</script>