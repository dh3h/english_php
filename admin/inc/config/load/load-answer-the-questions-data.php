<?php
require_once("../function/load.php");
$sno = 0;
$select_answere_the_questions = $action->database->query_sql("SELECT tbl_answer_the_questions.id,tbl_answer_the_questions.lesson_id,tbl_answer_the_questions.question,tbl_answer_the_questions.config, tbl_answer_the_questions.hw_status, tbl_answer_the_questions.date,tbl_answer_the_questions.status, tbl_lesson.lesson_name FROM `tbl_answer_the_questions`INNER JOIN tbl_lesson ON tbl_answer_the_questions.lesson_id = tbl_lesson.id ORDER BY id DESC;");
if ($select_answere_the_questions) {
    foreach ($select_answere_the_questions as $data_ATQ) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_ATQ['lesson_name'] ?></td>
            <td><?php echo @$data_ATQ['question'] ?></td>
            
            <td><?php echo @$data_ATQ['date'] ?></td>
            <td class="text-center">  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate"></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_answer_the_questions_tbl" switch="bool" <?php if ($data_ATQ['status'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> data-checkid="<?= @$data_ATQ['id']; ?>">
                    <label for="switch-<?= $ch1;
                                        $ch1++; ?>" data-on-label="Yes" data-off-label="No"></label>
                </div>
            </td>

            <!-- <td>$320,800</td> -->
            <td>
                <div class="dropdown">
                    <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item delete_answer_the_questions_tbl" data-delid="<?= @$data_ATQ['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>