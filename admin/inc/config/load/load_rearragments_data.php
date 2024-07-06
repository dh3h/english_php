<?php
require_once("../function/load.php");
$sno = 0;
$select_Sentences = $action->database->query_sql("SELECT tbl_rearrangements.id,tbl_rearrangements.lesson_id,tbl_rearrangements.rearragments_text, tbl_rearrangements.date,tbl_rearrangements.hw_status, tbl_rearrangements.status,tbl_lesson.lesson_name FROM `tbl_rearrangements` INNER JOIN tbl_lesson ON tbl_rearrangements.lesson_id = tbl_lesson.id ORDER BY id DESC;");
if ($select_Sentences) {
    foreach ($select_Sentences as $data_sentences) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_sentences['lesson_name'] ?></td>
            <td><?php echo @$data_sentences['rearragments_text'] ?></td>
            
            <td><?php echo @$data_sentences['date'] ?></td>
            <td class="text-center"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_rearragments_tbl" switch="bool" <?php if ($data_sentences['status'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> data-checkid="<?= @$data_sentences['id']; ?>">
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
                        <li><a class="dropdown-item delete_rearragments_tbl" data-delid="<?= @$data_sentences['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>