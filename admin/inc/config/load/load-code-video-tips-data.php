<?php
require_once("../function/load.php");
$sno = 0;
$select_video_code = $action->database->query_sql("SELECT tbl_code_video_tips.id,tbl_code_video_tips.lesson_id,tbl_code_video_tips.question,tbl_code_video_tips.config,tbl_code_video_tips.hw_status, tbl_code_video_tips.date, tbl_code_video_tips.status, tbl_lesson.lesson_name FROM `tbl_code_video_tips` INNER JOIN tbl_lesson ON tbl_code_video_tips.lesson_id = tbl_lesson.id ORDER BY id DESC;");
if ($select_video_code) {
    foreach ($select_video_code as $data_video_code) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_video_code['lesson_name'] ?></td>
            <td><?php echo @$data_video_code['question'] ?></td>
            
            <td><?php echo @$data_video_code['date'] ?></td>
            <td class="text-center">  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate"></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_code_video_tips_tbl" switch="bool" <?php if ($data_video_code['status'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> data-checkid="<?= @$data_video_code['id']; ?>">
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
                        <li><a class="dropdown-item delete_code_video_tips_tbl" data-delid="<?= @$data_video_code['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>