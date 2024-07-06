<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Chat</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                <li class="breadcrumb-item active">Chat</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php
            if (isset($_GET['user_id']) && !empty($action->database->text_filter($_GET['user_id']))) {
                $user_id = $action->database->text_filter($_GET['user_id']);
            ?>
                <div class="d-lg-flex">
                    <div class="chat-leftsidebar card">
                        <div class="p-3 px-4 border-bottom">
                            <div class="d-flex align-items-start ">
                                <div class="flex-shrink-0 me-3 align-self-center">
                                    <img src="assets/images/avtar-icon.png" class="avatar-sm rounded-circle" alt="">
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Admin <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                    <p class="text-muted mb-0">Available</p>
                                </div>


                            </div>
                        </div>

                        <div class="p-3">
                            <div class="search-box position-relative">
                                <input type="text" class="form-control rounded border" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>

                        <div class="chat-leftsidebar-nav">
                            <ul class="nav nav-pills nav-justified bg-light-subtle  p-1">
                                <li class="nav-item">
                                    <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Chat</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="chat">
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Recent</h5>
                                            </div>
                                            <ul class="list-unstyled chat-list">
                                                <?php
                                                $students_list = $action->database->query_sql("SELECT tbl_ask_teacher.id,tbl_ask_teacher.from_user,tbl_ask_teacher.to_user,tbl_ask_teacher.message,tbl_ask_teacher.date,tbl_user.user_uid,tbl_user.name, tbl_user.mobile,tbl_user.email FROM tbl_ask_teacher INNER JOIN tbl_user ON tbl_ask_teacher.from_user = tbl_user.user_uid GROUP BY from_user ORDER BY id DESC;");
                                                if ($students_list) {
                                                    foreach ($students_list as $data_students) {
                                                ?>
                                                        <li>
                                                            <a href="ask-question-students.php?user_id=<?= @$data_students['user_uid'] ?>">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="flex-shrink-0 user-img away align-self-center me-3">
                                                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="">
                                                                        <span class="user-status"></span>
                                                                    </div>

                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="text-truncate font-size-14 mb-1"><?= @$data_students['name'] ?></h5>
                                                                        <p class="text-truncate mb-0"><?= @$data_students['message'] ?></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0">
                                                                        <div class="font-size-11"><?= @$data_students['date'] ?></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- end chat-leftsidebar -->

                    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                        <div class="card">
                            <div class="p-3 px-lg-4 border-bottom">
                                <div class="row">
                                    <div class="col-xl-4 col-7">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">Jennie Sherlock</a></h5>
                                                <p class="text-muted text-truncate mb-0"><i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i> Online</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="chat-conversation p-3 px-2" data-simplebar>
                                <div class="read-content">
                                    <ul class="list-unstyled mb-0">
                                        <?php
                                        $select_chat_user_id = $action->database->query_sql("SELECT from_user,to_user,message,date FROM tbl_ask_teacher WHERE from_user = '{$user_id}' OR to_user = '{$user_id}';");
                                        if ($select_chat_user_id) {
                                            foreach ($select_chat_user_id as $data_chat_user) {
                                        ?>
                                                <li class="<?php
                                                            if ($data_chat_user['to_user'] !== 'A') {
                                                            ?>
                                                        right
<?php
                                                            }
?>">
                                                    <div class="conversation-list">
                                                        <div class="ctext-wrap">
                                                            <div class="ctext-wrap-content">
                                                                <!-- <h5 class="conversation-name"><a href="#" class="user-name">Jennie Sherlock</a> <span class="time">10:00</span></h5> -->
                                                                <p class="mb-0"><?= @$data_chat_user['message'] ?></p>
                                                            </div>
                                                            <div class="dropdown align-self-start">
                                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>
                                                

                                        <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="p-3 border-top">
                                <div class="row">
                                    <form id="form_data_send_message">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="position-relative">
                                                    <input type="hidden" name="to_user" value="<?= @$user_id ?>">
                                                    <input type="text" name="message" class="form-control border bg-light-subtle message_inp" placeholder="Enter Message...">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end user chat -->
                </div>
                <!-- End d-lg-flex  -->
            <?php
            } else {
            ?>
                <div class="d-lg-flex">
                    <div class="chat-leftsidebar card">
                        <div class="p-3 px-4 border-bottom">
                            <div class="d-flex align-items-start ">
                                <div class="flex-shrink-0 me-3 align-self-center">
                                    <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Admin <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                    <p class="text-muted mb-0">Available</p>
                                </div>


                            </div>
                        </div>

                        <div class="p-3">
                            <div class="search-box position-relative">
                                <input type="text" class="form-control rounded border" placeholder="Search...">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>

                        <div class="chat-leftsidebar-nav">
                            <ul class="nav nav-pills nav-justified bg-light-subtle  p-1">
                                <li class="nav-item">
                                    <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Chat</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="chat">
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Recent</h5>
                                            </div>
                                            <ul class="list-unstyled chat-list">
                                                <?php
                                                $students_list = $action->database->query_sql("SELECT tbl_ask_teacher.id,tbl_ask_teacher.from_user,tbl_ask_teacher.to_user,tbl_ask_teacher.message,tbl_ask_teacher.date,tbl_user.user_uid,tbl_user.name, tbl_user.mobile,tbl_user.email FROM tbl_ask_teacher INNER JOIN tbl_user ON tbl_ask_teacher.from_user = tbl_user.user_uid GROUP BY from_user ORDER BY id DESC;");
                                                if ($students_list) {
                                                    foreach ($students_list as $data_students) {
                                                ?>
                                                        <li>
                                                            <a href="ask-question-students.php?user_id=<?= @$data_students['user_uid'] ?>">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="flex-shrink-0 user-img away align-self-center me-3">
                                                                        <img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="">
                                                                        <span class="user-status"></span>
                                                                    </div>

                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="text-truncate font-size-14 mb-1"><?= @$data_students['name'] ?></h5>
                                                                        <p class="text-truncate mb-0"><?= @$data_students['message'] ?></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0">
                                                                        <div class="font-size-11"><?= @$data_students['date'] ?></div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- end chat-leftsidebar -->

                    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                        <div class="card">
                            <div class="p-3 px-lg-4 border-bottom">
                                <div class="row">
                                    <div class="col-xl-4 col-7">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                                <img src="assets/images/avtar-icon.png" alt="" class="img-fluid d-block rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">Admin User</a></h5>
                                                <p class="text-muted text-truncate mb-0"> <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i> Online</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="chat-conversation p-3 px-2" data-simplebar>

                            </div>


                        </div>
                    </div>
                    <!-- end user chat -->
                </div>
                <!-- End d-lg-flex  -->
            <?php
            }

            ?>


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Minia.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->
<?php
require_once("./inc/footer.php");
require_once("./inc/script.php");
?>