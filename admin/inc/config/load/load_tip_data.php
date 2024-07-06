<?php
require_once("../function/load.php");
$sno = 0;
$select_tips = $action->database->query_sql("SELECT * FROM `tbl_tips` ORDER BY id DESC;");
if ($select_tips) {
    foreach ($select_tips as $data_tips) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_tips['title_name'] ?></td>
            <td><?php echo @$data_tips['youtube_link'] ?></td>
            <td><?php echo @$data_tips['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_tips['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                <input type="checkbox" id="switch-<?= $ch2;
                                                                $ch2++; ?>" class="status_tip_tbl " switch="bool" <?php if ($data_tips['status'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> data-checkid="<?= @$data_tips['id']; ?>">
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
                        <li><a class="dropdown-item delete_tip_tbl" data-delid="<?= @$data_tips['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>