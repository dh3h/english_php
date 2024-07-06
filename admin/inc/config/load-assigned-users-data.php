<?php
require_once("function/load.php");
$sno = 0;
$select_role = $action->database->query_sql("SELECT tbl_admin.id, tbl_admin.uid, tbl_admin.user_name, tbl_admin.user_email, tbl_admin.phone_no,tbl_admin.user_password, tbl_admin.date, tbl_admin.status,tbl_admin.role, tbl_role.role_name,tbl_role.role FROM `tbl_admin` INNER JOIN tbl_role ON tbl_admin.role = tbl_role.id WHERE NOT tbl_admin.uid = 'Super Admin' ORDER BY id DESC;");
if ($select_role) {
    foreach ($select_role as $data_role) {
        $sno++
?>
        <tr>
            <td><?= @$sno ?></td>

            <td>
                <?php
                $string = $data_role['user_name'];
                if (strlen($string) >= 15) {
                    $user_name = (substr($string, 0, 15) . "..." . substr($string, 15, 0)); //This is a ...script
                } else {
                    $user_name = $data_role['user_name'];
                }
                ?>
                <?= @$user_name ?>
            </td>
            <td class="text-primary"><?= @$data_role["role_name"] ?></td>
            <td class="text-primary"><?= @$data_role["phone_no"] ?></td>

            <td>
                <input type="checkbox" id="switch<?= @$count; ?>" class="check_role" data-checkid="<?= $data_role['id'] ?>" switch="bool" <?php
                                                                                                                                            if ($data_role['status'] == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } elseif ($data_role['status'] == 0) {
                                                                                                                                                echo ' ';
                                                                                                                                            } ?>>
                <label for="switch<?= @$count++; ?>" data-on-label="Yes" data-off-label="No"></label>
            </td>
            <td>
                <a href="javascript: void(0);" data-delid="<?= @$data_role['id'] ?>" class="btn btn-danger waves-effect waves-light delete_role">Button</a>
            </td>
        </tr>

<?php
    }
}
?>
<script>
    $('#data1-table').DataTable();
</script>