<?php
require_once("../function/load.php");
$sno = 0;
$select_tip = $action->database->query_sql("SELECT * FROM `tbl_tip_day` ORDER BY id DESC;");
if ($select_tip) {
    foreach ($select_tip as $data_tip) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_tip['tip_text'] ?></td>
            <td><?php echo @$data_tip['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_tip['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                <input type="checkbox" id="switch-<?= $ch2;
                                                                $ch2++; ?>" class="status_tip_day_tbl " switch="bool" <?php if ($data_tip['status'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> data-checkid="<?= @$data_tip['id']; ?>">
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
                        <li><a class="dropdown-item delete_tip_day_tbl" data-delid="<?= @$data_tip['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>