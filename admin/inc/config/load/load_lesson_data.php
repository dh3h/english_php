<?php
require_once("../function/load.php");
$sno = 0;
$select_lesson = $action->database->query_sql("SELECT tbl_lesson.id, tbl_lesson.phase_id,tbl_lesson.lesson_name,tbl_lesson.date, tbl_lesson.status,tbl_phase.phase_name FROM tbl_lesson INNER JOIN tbl_phase ON tbl_lesson.phase_id = tbl_phase.id ORDER BY id DESC;");
if ($select_lesson) {
    foreach ($select_lesson as $data_lesson) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_lesson['phase_name'] ?></td>
            <td><?php echo @$data_lesson['lesson_name'] ?></td>
            <td><?php echo @$data_lesson['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                <input type="checkbox" id="switch-<?= $ch2;
                                                                $ch2++; ?>" class="status_lesson_tbl" switch="bool" <?php if ($data_lesson['status'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> data-checkid="<?= @$data_lesson['id']; ?>">
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
                        <li><a class="dropdown-item delete_lesson_tbl" data-delid="<?= @$data_lesson['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>