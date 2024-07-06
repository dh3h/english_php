<?php
require_once("../function/load.php");
$sno = 0;
$select_FTB = $action->database->query_sql("SELECT tbl_fill_in_the_blank.id,tbl_fill_in_the_blank.lesson_id,tbl_fill_in_the_blank.question,tbl_fill_in_the_blank.config,tbl_fill_in_the_blank.date,tbl_fill_in_the_blank.hw_status,tbl_fill_in_the_blank.status,tbl_lesson.lesson_name FROM tbl_fill_in_the_blank INNER JOIN tbl_lesson ON tbl_fill_in_the_blank.lesson_id = tbl_lesson.id ORDER BY id DESC;");
if ($select_FTB) {
    foreach ($select_FTB as $data_FTB) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_FTB['lesson_name'] ?></td>
            <td><?php echo @$data_FTB['question'] ?></td>
            
            <td><?php echo @$data_FTB['date'] ?></td>
            <td class="text-center">  <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate"></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_lesson_tbl" switch="bool" <?php if ($data_FTB['status'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> data-checkid="<?= @$data_FTB['id']; ?>">
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
                        <li><a class="dropdown-item delete_lesson_tbl" data-delid="<?= @$data_FTB['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>