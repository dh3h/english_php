<?php
require_once("function/load.php");
$select_admin = $action->database->query_sql("SELECT * FROM `tbl_admin` WHERE NOT tbl_admin.uid = 'Super Admin' ORDER BY id DESC;");
if ($select_admin) {
    foreach ($select_admin as $data_user) {
?>
        <tr>
            <th scope="row">
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                    <label class="form-check-label" for="contacusercheck1"></label>
                </div>
            </th>
            <td>
                <?= @$data_user['user_name'] ?>
            </td>
            <td><?= @$data_user['user_email'] ?></td>
            <td><?= @$data_user['phone_no'] ?></td>
            <td><?= @$data_user['date'] ?></td>
            <td>
                <input type="checkbox" id="switch<?= @$count; ?>" class="check_admin_user" data-checkid="<?= $data_user['id'] ?>" switch="bool" <?php
                                                                                                                                                if ($data_user['status'] == 1) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } elseif ($data_user['status'] == 0) {
                                                                                                                                                    echo ' ';
                                                                                                                                                } ?>>
                <label for="switch<?= @$count++; ?>" data-on-label="Yes" data-off-label="No"></label>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item text-danger delete-admin-user" data-delid="<?= @$data_user['id'] ?>">Delete</a></li>
                        <li><a class="dropdown-item text-primary" href="add-admin-user.php?user_id=<?= @$data_user['uid'] ?>">Edit</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>
<script>
    $('#data1-table').DataTable();
</script>