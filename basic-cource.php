<?php
require_once('./inc/head.php');
// require_once('./inc/menu.php');
require_once('./inc/sidebar.php')
?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="./" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Basic Cources</div>
    <div class="right">

    </div>
</div>
<!-- * App Header -->
<!-- App Capsule -->

<!-- App Capsule -->
<div id="appCapsule" style="position: relative;">
    <div id="showLessonPupParent" style="display: none;">
        <div style="position: fixed;z-index: 1000;width: 100vw;height: 100vh;top: 0;" class="d-flex align-items-center justify-content-center">
            <div style="position: relative; width: 100vw;height: 100vh;z-index: 1000;display: none;" id="showLessonPup" class="bg-danger">
                <div class="p-2" style="position: relative;">
                    <p class="d-flex w-100 justify-content-end py-2" style="position: absolute;left: -10px;top: 12px;">
                        <ion-icon name="close-outline" class="h3" id="hideLessonPup"></ion-icon>
                    </p>
                    <h2 class="text-white">Lesson 1</h2>
                    <p class="text-white">नाम पूछो और नाम बताओ</p>
                    <ul class="listview image-listview mt-4 border-0" style="background: none;">

                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Example
                                        <footer>8 Coins to wins</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Fill in the blanks
                                        <footer>8 Coins to wins</footer>
                                    </div>
                                </div>
                                <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a href="Rearrangement.php" class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Rearrangement of sentences
                                        <footer>Play a practice game with another learner</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        find out the correct sentence
                                        <footer>play a practice game with another learner</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Listen & Type
                                        <footer>play a practice game with another learner</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Conversation
                                        <footer>play a practice game with another learner</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="bg-white mb-1 showPopOptions" style="display: none;">
                            <a class="item openLessonInPopUp">
                                <img src="./assets/img/app-assets/spell.png" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Storys
                                        <footer>play a practice game with another learner</footer>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple Multi Listview -->
    <ul class="listview link-listview mb-2">
        <?php
        $select_phase_list = $action->database->query_sql("SELECT * FROM `tbl_phase` WHERE status = 1;");
        if ($select_phase_list) {
            foreach ($select_phase_list as $data_phase_list) {
                $phase_id_data = $data_phase_list['id'];
        ?>
                <li class="multi-level">
                    <a href="#" class="item ">
                        <?= @$data_phase_list['phase_name'] ?>
                    </a>
                    <!-- sub menu -->
                    <ul class="listview image-listview">
                        <?php
                        // Define an array of image URLs
                        $image_urls = [
                            "icard.png",
                            "sakehand.png",
                            "map.png",
                            "earth.png",
                            // Add more images as needed
                        ];
                        $select_lesson_list = $action->database->query_sql("SELECT * FROM `tbl_lesson` WHERE phase_id = '{$phase_id_data}' AND status = 1;");

                        if ($select_lesson_list) {
                            $image_counter = 0;
                            foreach ($select_lesson_list as $data_sesson_list) {
                                $current_image = $image_urls[$image_counter % count($image_urls)];
                                $image_counter++;
                        ?>
                                <li>
                                    <a class="item openLessonInPopUp">
                                        <img src="./assets/img/app-assets/<?php echo $current_image; ?>" alt="image" class="image">
                                        <div class="in">
                                            <div>
                                                <?= @$data_sesson_list['lesson_name'] ?>
                                                <footer> <?= @$data_sesson_list['lesson_discriptions'] ?></footer>
                                            </div>
                                        </div>
                                        <ion-icon name="lock-closed-outline"></ion-icon>
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
    <!-- * Simple Multi Listview -->

</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>