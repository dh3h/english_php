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
            <div style="position: relative; width: 100vw;height: 100vh;z-index: 1000;display: none;" id="showLessonPup"  >
                <div class="p-2" style="position: relative;">
                    <p class="d-flex w-100 justify-content-end py-2" style="position: absolute;left: -10px;top: 12px;">
                        <ion-icon name="close-outline" class="h3" id="hideLessonPup"></ion-icon>
                    </p>
                    <h2 class="text-white" id="lesson_title">Lesson 1</h2>
                    <p class="text-white" id="lesson_name">नाम पूछो और नाम बताओ</p>
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
                            <a class="item lesson_links openLessonInPopUp">
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
                            <a href="rearrangement.php?lesson_id=" class="item lesson_links openLessonInPopUp">
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
                            <a class="item lesson_links openLessonInPopUp">
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
                            <a class="item lesson_links openLessonInPopUp">
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
                            <a class="item lesson_links openLessonInPopUp">
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
                            <a class="item lesson_links openLessonInPopUp">
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
                        $image_urls = [
                            "icard.png",
                            "sakehand.png",
                            "map.png",
                            "earth.png",
                        ];

                        $colors = [
                            "rgb(102, 12, 190)",
                            "rgb(102, 12, 34)",
                            "rgb(102, 190, 190)",
                        ];


                        $select_lesson_list = $action->database->query_sql("SELECT * FROM `tbl_lesson` WHERE phase_id = '{$phase_id_data}' AND status = 1;");

                        if ($select_lesson_list) {
                            $image_counter = 0;
                            foreach ($select_lesson_list as $data_sesson_list) {
                                $current_image = $image_urls[$image_counter % count($image_urls)];
                        ?>
                                <li class="open_lesson_modal" data-bg="<?= $colors[$image_counter % count($image_urls)]; ?>" data-name="<?= @$data_sesson_list['lesson_name'] ?>" data-desc="<?= @$data_sesson_list['lesson_discriptions'] ?>" data-lesson_id="<?= @$data_sesson_list['id'] ?>">
                                    <a class="item openLessonInPopUp ">
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
                                $image_counter++;
                            }
                        }
                        ?>

                    </ul>
                </li>
        <?php
            }
        }
        ?>
    </ul>

</div>
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>

<script>
 $(document).on('click', '.open_lesson_modal', function (e) {
        const element = $(this);
        const title = element.data('name');
        const lesson_id = element.data('lesson_id');
        const desc = element.data('desc');
        const bg = element.data('bg');


        $('#lesson_title').text(title);
        $('#lesson_name').text(desc);

        $('.lesson_links').each(function () {
            let href = $(this).attr('href');
            if(typeof href == 'undefined'){
                return;
            }
            href = href.split('lesson_id=');
            href[1] = lesson_id;
            href = href.join('lesson_id=');
            $(this).attr('href', href);
        });

        $('#showLessonPupParent').show();
        $('#showLessonPup').css({'background-color': bg }).show(300, () => {
            $('.showPopOptions').slideDown(300);
        });
    });
</script>