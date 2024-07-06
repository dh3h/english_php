<?php
require_once("function/load.php");
$sno = 0;
$select_testm = $action->database->query_sql("SELECT * FROM `tbl_testimo` ORDER BY id DESC;");
if ($select_testm) {
    foreach ($select_testm as $data_testm) {
        $sno++;
?>
        <tr>
            <th scope="row">
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="contacusercheck1">
                    <label class="form-check-label" for="contacusercheck1"> &nbsp;<?= @$sno ?></label>
                </div>
            </th>
            <td>
                <img src="../upload/<?= @$data_testm['client_image'] ?>" alt="" class="avatar-sm rounded-circle me-2">
                <a href="#" class="text-body"><?= @$data_testm['client_name'] ?></a>
            </td>
            <td><?= @$data_testm['client_degi'] ?></td>
            <td>
                <?php
                $email = $data_testm['client_email'];
                if ($email != ""  && $email != null) {
                    $echo_email = $email;
                } else {
                    $echo_email = "INVALLID EMAIL";
                }
                ?>
                <?= @$echo_email ?>
            </td>
            <td>
                <input type="checkbox" id="switch<?= @$count; ?>" class="check_testimonial" data-checkid="<?= $data_testm['id'] ?>" switch="bool" <?php
                                                                                                                                                    if ($data_testm['status'] == 1) {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } elseif ($data_testm['status'] == 0) {
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
                        <li><a class="dropdown-item text-danger delete_testm" data-delid="<?= @$data_testm['id'] ?>">Delete</a></li>
                        <li><a class="dropdown-item text-primary" href="add-testimonial.php?testmonial_id=<?= @$data_testm['id'] ?>">Edit</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>
<script>
    $('#datatable-buttons_wrapper').DataTable();
</script>