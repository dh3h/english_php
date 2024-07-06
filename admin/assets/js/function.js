function loadTable(target, url) {
    $(target).load(url, () => {
        $(target).parent().DataTable();
    });
}

$(document).ready(function () {
    $(".loader_btn").hide();

    function show_loader() {
        $(".loader_btn").hide();
        $(".submit_btn").show();
    }

    // --------------------------------------- Delete Functions -----------------------------------//

    function delete_table(button_class, table_name, table_load_data, load_data_url) {
        $(document).on("click", button_class, function (e) {
            e.preventDefault();

            let del_id = $(this).data("delid");
            show_delete(del_id, table_name, table_load_data, load_data_url);
        });
    }

    /* -------------  Delete Function for PHP --------------------------  */
    function show_delete(del_id, table_name, table_load_data, load_data_url) {

        new swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "inc/config/delete.php",
                        data: { del_id: del_id, table_name: table_name },
                        success: function (data) {

                            let json7 = JSON.parse(data);
                            if (json7.status == 1) {
                                swaMsg('success', "Data Successfully Deleted !!", "#0F843F");

                                $(table_load_data).load(load_data_url);
                                //  swaMsg('success',json7.msg,"#0F843F");

                            }
                            else if (json7.status == 2) {
                                swaMsg('error', json7.msg, "#a90228");
                            }
                        }
                    });



                } else {
                    swaMsg('success', "You Data is safe !!.", "#0F843F");
                }
            });

    }
    function delete_table(button_class, table_name, table_load_data, load_data_url) {
        $(document).on("click", button_class, function (e) {
            e.preventDefault();

            let del_id = $(this).data("delid");
            show_delete(del_id, table_name, table_load_data, load_data_url);
        });
    }


    /*  xxxxxxxxxxxxxxxxxxxxxxx  Sweet Alert swal function Function xxxxxxxxxxxxxxxxxxx */

    function inval(clas, color) {
        $(clas).css("color", color);
    }



    /* -------------------  User Name Validation ------------------------ */
    let name_input = "";
    function isNameValid(id, cls) {
        $(document).on("input", id, function () {
            name_input = $(this).val();
            if (name_input == "") {
                $(cls).text("Please enter your name.");
                inval(cls, "#a90228");
            }
            else if (name_input.length < 3) {
                $(cls).text(" Name should be minimum 3 character.");
                inval(cls, "#a90228");
            }
            else if (!name_input.match(/^[a-zA-Z\s]*$/)) {
                $(cls).text("Name should be maximum 30 character.");
                inval(cls, "#a90228");
            }
            else if (name_input.match(/^[a-zA-Z\s]*$/)) {
                $(cls).text(" ");
                inval(cls, "green");
            }
            else {
                $(cls).text("");
                return name_input;
            }

        });
    }



    /*  --------------------------  Sweet Alert swal function Function --------------------------------------- */
    function swaMsg(icon, message, bg) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: message,
            color: '#fff',
            background: bg,

        })
    }


    /* --------------   Status Active Inactive Code  For Php  --------------- */
    function check_status(button_class, load_data_id, load_data_url, table_name) {
        $(document).on("click", button_class, function () {
            if ($(this).prop("checked") == true) {
                let active = $(this).data("checkid");

                $.ajax({
                    type: "POST",
                    url: "inc/config/status.php",
                    data: { active: active, table_name: table_name },
                    success: function (data) {

                        let json11 = JSON.parse(data);
                        if (json11.status == 1) {
                            swaMsg('success', json11.msg, "#0F843F");
                            $(load_data_id).load(load_data_url);
                        }
                        else if (json11.status == 2) {
                            swaMsg('error', json11.msg, "#a90228");
                        }
                    }
                });
            }
            else if ($(this).prop("checked") == false) {
                let inactive = $(this).data("checkid");
                $.ajax({
                    type: "POST",
                    url: "inc/config/status.php",
                    data: { inactive: inactive, table_name: table_name },
                    success: function (data) {

                        let json12 = JSON.parse(data);
                        if (json12.status == 3) {
                            swaMsg('success', json12.msg, "#0F843F");

                            $(load_data_id).load(load_data_url);
                        }
                        else if (json12.status == 4) {
                            swaMsg('error', json12.msg, "#a90228");
                        }
                    }
                });
            }
        });
    }

    /// -----------------------------------------  Login Query here  ---------------------------------------- /////

    $(document).on('submit', '#login_form_id', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'inc/config/login_query.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 40) {
                    $('#login_form_id').trigger('reset');
                    // swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.assign('./')
                    });

                } else if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                }
                else if (json.status == 10) {
                    // swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });

    //  ================================== Phases Start =========================================== //
    loadTable('#load_phase_data', './inc/config/load/load_phase_data.php');
    delete_table(".delete_phase_tbl", "tbl_phase", "#load_phase_data", "./inc/config/load/load_phase_data.php");
    check_status(".status_phase_tbl", "#load_phase_data", './inc/config/load/load_phase_data.php', "tbl_phase");

    $(document).on('submit', '#phase_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-phase-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {

                    $('#add_form_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Phases End =========================================== //

    //  ================================== Lesson Start =========================================== //
    loadTable('#load_lesson_data', './inc/config/load/load_lesson_data.php');
    delete_table(".delete_lesson_tbl", "tbl_lesson", "#load_lesson_data", "./inc/config/load/load_lesson_data.php");
    check_status(".status_lesson_tbl", "#load_lesson_data", './inc/config/load/load_lesson_data.php', "tbl_lesson");

    $(document).on('submit', '#lesson_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-lesson-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {

                    $('#add_form_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Lesson End =========================================== //

    //  ================================== Bill in the Blank  Start =========================================== //
    loadTable('#load_FTB_data', './inc/config/load/load_FTB_data.php');
    delete_table(".delete_FTB_tbl", "tbl_fill_in_the_blank", "#load_FTB_data", "./inc/config/load/load_FTB_data.php");
    check_status(".status_FTB_tbl", "#load_FTB_data", './inc/config/load/load_FTB_data.php', "tbl_fill_in_the_blank");

    $(document).on('submit', '#fill_in_the_blank_form', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-fill-blank-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.href = 'fill-in-the-blank.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Bill in the Blank End =========================================== //

    //  ================================== rearragments Of the Sentences Start =========================================== //
    loadTable('#load_rearragments_data', './inc/config/load/load_rearragments_data.php');
    delete_table(".delete_rearragments_tbl", "tbl_rearrangements", "#load_rearragments_data", "./inc/config/load/load_rearragments_data.php");
    check_status(".status_rearragments_tbl", "#load_rearragments_data", './inc/config/load/load_rearragments_data.php', "tbl_rearrangements");


    $(document).on('submit', '#rearragments_Of_the_Sentences_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-rearragments-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#rearragments_Of_the_Sentences_submit_data').trigger('reset');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000); // Redirects after 3 seconds
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== rearragments Of the Sentences Ends =========================================== //

    //  ================================== find-out-the-correct-sentence Start =========================================== //
    loadTable('#load_correct_sentence_data', './inc/config/load/load-correct-sentence-data.php');
    delete_table(".delete_correct_sentence_tbl", "tbl_correct_sentence", "#load_correct_sentence_data", "./inc/config/load/load-correct-sentence-data.php");
    check_status(".status_correct_sentence_tbl", "#load_correct_sentence_data", './inc/config/load/load-correct-sentence-data.php', "tbl_correct_sentence");

    $(document).on('submit', '#find_correct_sentence_form_data', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-find-correct-sentence-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#find_correct_sentence_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'find-out-the-correct-sentence.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== find-out-the-correct-sentence End =========================================== //

    //  ================================== listen type Start =========================================== //
    loadTable('#load_listen_type_data', './inc/config/load/load-listen-type-data.php');
    delete_table(".delete_listen_type_tbl", "tbl_listen_type", "#load_listen_type_data", "./inc/config/load/load-listen-type-data.php");
    check_status(".status_listen_type_tbl", "#load_listen_type_data", './inc/config/load/load-listen-type-data.php', "tbl_listen_type");

    $(document).on('submit', '#listen_type_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-listen-type-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#listen_type_submit_data').trigger('reset');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000); // Redirects after 3 seconds
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== listen-type Ends =========================================== //

    //  ================================== conversation Start =========================================== //
    loadTable('#load_conversation_data', './inc/config/load/load-conversation-data.php');
    delete_table(".delete_conversation_tbl", "tbl_conversation", "#load_conversation_data", "./inc/config/load/load-conversation-data.php");
    check_status(".status_conversation_tbl", "#load_conversation_data", './inc/config/load/load-conversation-data.php', "tbl_conversation");

    $(document).on('submit', '#conversation_form', function (e) {
        e.preventDefault();


        let convo = [];

        $('.convos_text').each(function () {
            if ($(this).val()) {
                convo.push({
                    [$(this).closest('.convo_type_parent').prev().find('.convos_type').val()]: $(this).val()
                })
            }
        });
        console.log(convo);
        const form_data = new FormData(this);
        form_data.append('conversation', JSON.stringify(convo));

        $.ajax({

            url: "./inc/config/add-conversation-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#conversation_form').trigger('reset');
                    setTimeout(() => {
                        location.reload();
                    }, 1200);
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });

    });

    $(document).on('click', '.delete_convo_btn', function () {

    });


    $(document).on('click', '#add_more_convo_btn', function () {

        $('#add_more_convo').append(
            `<div class="col-6 mt-3">
            <div class="row">
                <div class="col-2 pe-0">
                    <select class="convos_type form-control" >
                        <option value="u">User</option>
                        <option value="b">Bot</option>
                    </select>
                </div>
                <div class="col-9 px-0 convo_type_parent">
                    <input type="text" class="rounded-0 convos_text form-control"
                placeholder="Enter Conversation">
                </div>
                 <div class="col-1 ps-0">
                                <button class="delete_convo_btn btn rounded-right btn-outline-danger w-100 h-100 btn-sm" type="button">-</button>
                            </div>
            </div>
        </div>`
        );
    })

    //  ================================== conversation End =========================================== //

    //  ================================== Story Start =========================================== //
    loadTable('#load_story_data', './inc/config/load/load-story-data.php');
    delete_table(".delete_story_tbl", "tbl_story", "#load_story_data", "./inc/config/load/load-story-data.php");
    check_status(".status_story_tbl", "#load_story_data", './inc/config/load/load-story-data.php', "tbl_story");

    $(document).on('submit', '#story_form_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-story-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#story_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000); // Redirects after 3 seconds
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Story Ends =========================================== //

    //  ================================== Answer The Question Start =========================================== //
    loadTable('#load_answer_the_questions_data', './inc/config/load/load-answer-the-questions-data.php');
    delete_table(".delete_answer_the_questions_tbl", "tbl_answer_the_questions", "#load_answer_the_questions_data", "./inc/config/load/load-answer-the-questions-data.php");
    check_status(".status_answer_the_questions_tbl", "#load_answer_the_questions_data", './inc/config/load/load-answer-the-questions-data.php', "tbl_answer_the_questions");

    $(document).on('submit', '#answer_the_questions_form_data', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-answer-the-questions-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#answer_the_questions_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'answer-the-questions.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Answer The Question Ends =========================================== //

    //  ================================== Finding The Gems Start =========================================== //
    loadTable('#load_finding_the_gems_data', './inc/config/load/load-finding-the-gems-data.php');
    delete_table(".delete_finding_the_gems_tbl", "tbl_finding_the_gems", "#load_finding_the_gems_data", "./inc/config/load/load-finding-the-gems-data.php");
    check_status(".status_finding_the_gems_tbl", "#load_finding_the_gems_data", './inc/config/load/load-finding-the-gems-data.php', "tbl_finding_the_gems");

    $(document).on('submit', '#finding_the_gems_form_data', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-finding-the-gems-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#finding_the_gems_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'finding-the-gems.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Finding The Gems Ends =========================================== //

    //  ================================== Listen Select The Correct Sentence Start =========================================== //
    loadTable('#load_LSTCS_data', './inc/config/load/load-LSTCS-data.php');
    delete_table(".delete_LSTCS_tbl", "tbl_listen_select_the_correct_sentence", "#load_LSTCS_data", "./inc/config/load/load-LSTCS-data.php");
    check_status(".status_LSTCS_tbl", "#load_LSTCS_data", './inc/config/load/load-LSTCS-data.php', "tbl_listen_select_the_correct_sentence");

    $(document).on('submit', '#listen_select_the_correct_sentence_form', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-listen-select-the-correct-sentence-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#listen_select_the_correct_sentence_form').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'listen-select-the-correct-sentence.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Listen Select The Correct Sentence Ends =========================================== //


    //  ================================== Fill The Code From Video Tips Start =========================================== //
    loadTable('#load_code_video_tips_data', './inc/config/load/load-code-video-tips-data.php');
    delete_table(".delete_code_video_tips_tbl", "tbl_code_video_tips", "#load_code_video_tips_data", "./inc/config/load/load-code-video-tips-data.php");
    check_status(".status_code_video_tips_tbl", "#load_code_video_tips_data", './inc/config/load/load-code-video-tips-data.php', "tbl_code_video_tips");

    $(document).on('submit', '#Code_video_tips_form_data', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-code-video-tips-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#Code_video_tips_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'fill-the-code-from-video-tips.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Fill The Code From Video Tips Ends =========================================== //


    //  ================================== Tip Start =========================================== //
    loadTable('#load_tip_data', './inc/config/load/load_tip_data.php');
    delete_table(".delete_tip_tbl", "tbl_tips", "#load_tip_data", "./inc/config/load/load_tip_data.php");
    check_status(".status_tip_tbl", "#load_tip_data", './inc/config/load/load_tip_data.php', "tbl_tips");

    $(document).on('submit', '#tip_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-tip-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    $('#tip_submit_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Tip End =========================================== //

    //  ================================== News Start =========================================== //
    loadTable('#load_news_data', './inc/config/load/load_news_data.php');
    delete_table(".delete_news_tbl", "tbl_news", "#load_news_data", "./inc/config/load/load_news_data.php");
    check_status(".status_news_tbl", "#load_news_data", './inc/config/load/load_news_data.php', "tbl_news");

    $(document).on('submit', '#news_form_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-news-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    $('#news_form_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== News End =========================================== //

    //  ================================== Artical's Start =========================================== //
    loadTable('#load_articals_data', './inc/config/load/load_articals_data.php');
    delete_table(".delete_articals_tbl", "tbl_articals", "#load_articals_data", "./inc/config/load/load_articals_data.php");
    check_status(".status_articals_tbl", "#load_articals_data", './inc/config/load/load_articals_data.php', "tbl_articals");

    $(document).on('submit', '#articals_form_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-articals-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    $('#articals_form_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.href = 'artical.php';
                    }, 1000); // Redirects after 3 seconds

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Artical's End =========================================== //

    //  ================================== Videos Start =========================================== //
    loadTable('#load_videos_data', './inc/config/load/load-videos-data.php');
    delete_table(".delete_videos_tbl", "tbl_videos", "#load_videos_data", "./inc/config/load/load-videos-data.php");
    check_status(".status_videos_tbl", "#load_videos_data", './inc/config/load/load-videos-data.php', "tbl_videos");

    $(document).on('submit', '#videos_form_data', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let opt_3 = $('#options3').val();
        let opt_4 = $('#options4').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !opt_3 || !opt_4 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            '3': opt_3,
            '4': opt_4,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-videos-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#videos_form_data').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'videos.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Videos Ends =========================================== //

    //  ================================== Book's Start =========================================== //
    loadTable('#load_books_data', './inc/config/load/load-books-data.php');
    delete_table(".delete_books_tbl", "tbl_books", "#load_books_data", "./inc/config/load/load-books-data.php");
    check_status(".status_books_tbl", "#load_books_data", './inc/config/load/load-books-data.php', "tbl_books");

    $(document).on('submit', '#books_submit_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-books-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {

                    $('#books_submit_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Book's End =========================================== //

    //  ================================== Book's chapter Start =========================================== //
    loadTable('#load_book_chapter_data', './inc/config/load/load-book_chapter-data.php');
    delete_table(".delete_book_chapter_tbl", "tbl_books_chapter", "#load_book_chapter_data", "./inc/config/load/load-book_chapter-data.php");
    check_status(".status_book_chapter_tbl", "#load_book_chapter_data", './inc/config/load/load-book_chapter-data.php', "tbl_books_chapter");

    $(document).on('submit', '#book_chapter_form', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-books-chapter-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    $('#book_chapter_form').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Book's chapter End =========================================== //

    //  =============================== ask teacher part ======================================== //
    const chat_window = document.getElementById('read-content');
    $(document).on('submit', '#form_data_send_message', function (e) {
        e.preventDefault();
        const form_data = new FormData(this);
        const msg = $('.message_inp').val();
        $.ajax({
            url: "./inc/config/add-ask-teacher-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {

                    // msg('success', json.()res);
                    $('.read-content').append(`
                                     
<li class="right">
                                                <div class="conversation-list">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <h5 class="conversation-name"><a href="#" class="user-name"></a> <span class="time">Now</span></h5>
                                                            <p class="mb-0">${msg}dfgfgfg</p>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </li>
                                  `);
                    chat_window.scrollTop = chat_window.scrollHeight;
                    $('.message_inp').val('');
                    // setTimeout(() => {
                    //     location.reload();
                    // }, 1200);
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    })


    // chat_window.scrollTop = chat_window.scrollHeight;
    //  =================================== Ask teacher  part end ================================== //

    //  ================================== Word of the day Start =========================================== //
    loadTable('#load_word_day_data', './inc/config/load/load-word-day-data.php');
    delete_table(".delete_word_day_tbl", "tbl_word_day", "#load_word_day_data", "./inc/config/load/load-word-day-data.php");
    check_status(".status_word_day_tbl", "#load_word_day_data", './inc/config/load/load-word-day-data.php', "tbl_word_day");
    $(document).on('submit', '#word_of_the_day_form', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-word-day-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {
                    $('#word_of_the_day_form').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== Word of the day End =========================================== //

    //  ================================== Tip Of the day Start =========================================== //
    loadTable('#load_tip_day_data', './inc/config/load/load-tip-day-data.php');
    delete_table(".delete_tip_day_tbl", "tbl_tip_day", "#load_tip_day_data", "./inc/config/load/load-tip-day-data.php");
    check_status(".status_tip_day_tbl", "#load_tip_day_data", './inc/config/load/load-tip-day-data.php', "tbl_tip_day");

    $(document).on('submit', '#tip_of_the_day_form', function (e) {
        // alert();  
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-tip-day-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 100) {

                    $('#tip_of_the_day_form').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();

                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    //  ================================== tip of the day End =========================================== //
    //  ====================================== Hang man Game Start ========================================== //

    $(document).on('click', '.delete_hangman', function () {
        $(this).parentsUntil('.delete_this').parent().hide(400, function () {
            $(this).remove();
        })
    })

    $(document).on('submit', '#hangman_form', function (e) {
        e.preventDefault();
        const form_data = new FormData(this);

        let convo = [];

        $('.english_words').each(function () {
            if ($(this).val()) {
                console.log($(this).parent().prev().find('.hindi_words').val());
                convo.push({
                    [$(this).parent().prev().find('.hindi_words').val()]: $(this).val()
                })
            }
        });
        // console.log(convo);
        form_data.append('hangman', JSON.stringify(convo));

        $.ajax({
            url: "./inc/config/add-hungman-game-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(() => {
                        location.reload();
                    }, 1200);
                } else if (json.status == 101) {
                    swaMsg('error', json.msg, "#a90228");
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });

    });




    $(document).on('click', '#add_more_hang_btn', function () {
        $('#add_more_hangman').append(
            `<div class="col-6 mt-3">
                                    <div class="row">
                                        <div class="col-5 pe-0">
                                            <input type="text" class="hindi_words form-control" placeholder="Enter Hindi Words">
                                        </div>
                                        <div class="col-5 ps-0">
                                            <input type="text" class="english_words form-control"
                                        placeholder="Enter English Words">
                                        </div>
                                        <div class="col-2 ps-0">
                                            <a class="btn btn-danger shadow btn-xs sharp delete_phase" data-id="12"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>`
        );
    })
    //  ===================================== Hangman Game End ============================================== //

    //  ======================================== Tea Game Start ============================================== //

    loadTable('#load_tea_game_data', './inc/config/load/load-tea-game-data.php');
    delete_table(".delete_tea_game_tbl", "tbl_tea_game", "#load_tea_game_data", "./inc/config/load/load-tea-game-data.php");
    check_status(".status_tea_game_tbl", "#load_tea_game_data", './inc/config/load/load-tea-game-data.php', "tbl_tea_game");

    $(document).on('submit', '#tea_game_form', function (e) {
        e.preventDefault();
        let opt_1 = $('#options1').val();
        let opt_2 = $('#options2').val();
        let ans = $('#correct_ans').val()

        if (!opt_1 || !opt_2 || !ans) {
            swaMsg('error', 'Fill all options and Answer', "#a90228");
            return;
        }
        let config = {
            '1': opt_1,
            '2': opt_2,
            ans
        }

        const form_data = new FormData(this);
        form_data.append('config', JSON.stringify(config));

        $.ajax({
            url: "./inc/config/add-tea-game-data.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: (response) => {
                const json = JSON.parse(response);
                if (json.status == 100) {
                    swaMsg('success', json.msg, "#0F843F");
                    $('#tea_game_form').trigger('reset');
                    setTimeout(function () {
                        window.location.href = 'tea-game.php';
                    }, 1000); // Redirects after 3 seconds
                } else {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });

    //  ======================================== Tea Game Start ============================================== //

    //// -------------------------------------------- Banner Submit script ------------------------------------------------ ////
    $(document).on('submit', 'form_banner_submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 40) {
                    $('#form_banner_submit').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();
                } else if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                }
            }
        })
    });


    /// --------------------------------------- admin Users  -------------------------------------- ///

    $('#load_permission_data').load('./inc/config/load-admin-permission-data.php');



    delete_table(".delete-admin-user", "tbl_admin", "#load_admin_user_data", "./inc/config/load-admin-user-data.php");
    $('#load_admin_user_data').load('./inc/config/load-admin-user-data.php');
    check_status(".check_admin_user", "#load_admin_user_data", './inc/config/load-admin-user-data.php', "tbl_admin");

    $(document).on('submit', '#admin_user_data', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-admin-user-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 40) {
                    $('#admin_user_data').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.assign('manage-admin-users.php')
                    });

                } else if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                    $("#reply_err").text(json.msg);
                }
                else if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });



    /// ---------------------------------------------    ROLE & PERMISSION     ---------------------------------------///

    $('#load_role_data').load('./inc/config/load-role-data.php');
    check_status(".role_checkbox", './inc/config/load-role-data.php', "#load_role_data", "tbl_role");
    delete_table(".delete_btn_role", "tbl_role", "#load_role_data", "./inc/config/load-role-data.php");

    $(document).on('submit', '#add_new_role', function (e) {
        e.preventDefault();
        $.ajax({
            url: './inc/config/add-role-data.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            caches: false,
            success: function (data) {
                // console.log(data);
                let json = JSON.parse(data);
                if (json.status == 40) {

                    $('#add_new_role').trigger('reset');
                    swaMsg('success', json.msg, "#0F843F");
                    window.location.reload();
                }
                else if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });

    /**********
    * UPDATE ROLE & PERMISSION *
    **********/
    $(document).on("click", "button.edit_role", function (e) {
        e.preventDefault();
        let role_ed = $(this).data("eid");
        // console.log(role_ed);
        $.ajax({
            url: "inc/config/append-form-role.php",
            type: "POST",
            data: {
                role_ed: role_ed
            },
            cache: false,
            success: function (data) {
                $("#update_role_form").html(data);
            }
        });
    });
    //###################  Role Based 
    $(document).on("submit", "#update_role_form", function (e) {
        e.preventDefault();
        $.ajax({
            url: "./inc/config/update-role.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 40) {
                    $("#update_role_form").trigger("reset");
                    $("button.btn-close").trigger("click");
                    swaMsg('success', json.msg, "#0F843F");
                    $("#load_role_data").load("./inc/config/load-role-data.php");
                } else if (json.status == 10 || json.status == 1 || json.status == 2) {
                    swaMsg('error', json.msg, "#a90228");
                }
            }
        });
    });
    // End //

    // alert();

    $(document).on('change', '#permission_staff', function (e) {
        e.preventDefault();
        let role_id = $(this).val();
        $.ajax({
            url: './inc/config/load-admin-users.php',
            type: 'POST',
            data: {
                role_id: role_id
            },
            success: function (data) {
                $("#load_role_for_permission").html(data);

            }
        })
    });


    check_status(".check_role", './inc/config/load-assigned-users-data.php', "#load_members_with_roles", "tbl_admin");
    delete_table(".delete_role", "tbl_admin", "#load_members_with_roles", "./inc/config/load-assigned-users-data.php");
    $('#load_members_with_roles').load('./inc/config/load-assigned-users-data.php');
    $(document).on("submit", "#add_form_assign_role", function (e) {
        e.preventDefault();
        $.ajax({
            url: "./inc/config/add-assign-role-data.php",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                let json = JSON.parse(data);
                if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                } else if (json.status == 50) {
                    swaMsg('success', json.msg, "#0F843F");
                } else if (json.status == 40) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.assign('manage-admin-permission.php')
                    });
                }
            }
        });
    });


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx WEb Site Setting xxxxxxxxxxxxxxxxxxxxxx//
    $(document).on("submit", "#add_form_settings", function (e) {
        e.preventDefault();

        $.ajax({
            url: "./inc/config/update-settings.php",
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                let json = JSON.parse(data);

                if (json.status == 10) {
                    swaMsg('error', json.msg, "#a90228");
                } else if (json.status == 50) {
                    swaMsg('success', json.msg, "#0F843F");
                } else if (json.status == 40) {
                    swaMsg('success', json.msg, "#0F843F");
                    setTimeout(function () {
                        window.location.assign('manage-setting.php')
                    });
                }
            }
        });
    });
});

/*------------  Usage Below function -------------- */
// isEmailValid("#ad_user_email", ".ad_user_email");
// isPassValid("#ad_user_pass", ".ad_user_pass");
// isNameValid("#ad_user_name", ".ad_user_name");
/*xxxxxxxxxxxx  Usage Below function xxxxxxxxxxxxxxxxxxxxx */