<?php
require_once("function/load.php");
$sno = 0;
$sql = $action->database->query_sql('SELECT * FROM `tbl_role` ORDER BY tbl_role.id DESC;');
if ($sql) {
    $counter = $ch1 = $ch2 = 1;
    foreach ($sql as $se_data) { ?>
        <tr>
            <td><?= @$counter;
                $counter++; ?></td>
            <td class="text-capitalize"><?= @$se_data['role_name']; ?></td>
            <td class="text-capitalize"><?= @str_replace("@@@", ", ", $se_data['role']); ?></td>
            <td><?= @$se_data['date']; ?></td>
            <td>
                <?php
                $data_roliee = str_replace("@@@", ", ", $se_data['role']);

                if ($data_roliee != "All") { ?>
                    <div class="d-flex m-auto text-center">
                        <button class="text-success border-0 mx-auto h4 edit_role" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $se_data['id']; ?>"><i class="fas fa-edit"></i></button>
                        <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $se_data['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                        <div class="switch mx-2">


                            <input type="checkbox" id="switch-<?= $ch2;
                                                                $ch2++; ?>" class="role_checkbox" switch="bool" <?php if ($se_data['status'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> data-checkid="<?= @$se_data['id']; ?>">
                            <label for="switch-<?= $ch1;
                                                $ch1++; ?>" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                        <button class="text-danger border-0 mx-auto h4 delete_btn_role" data-delid="<?= @$se_data['id']; ?>"><i class="fas fa-trash"></i></button>
                    </div>
                <?php } ?>
            </td>
        </tr>

<?php }
} else {
    echo "<tr><td class='text-center'><span class='badge badge-danger py-2 px-3 h6'>No Record Found</span></td></tr>";
}
?>
<script>
    $('#data1-table').DataTable();
</script>