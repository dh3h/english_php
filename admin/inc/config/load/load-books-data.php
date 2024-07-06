<?php
require_once("../function/load.php");
$sno = 0;
$select_books = $action->database->query_sql("SELECT * FROM `tbl_books` ORDER BY id DESC;");
if ($select_books) {
    foreach ($select_books as $data_books) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_books['book_name'] ?></td>
         
            <td><?php echo @$data_books['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_books['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                <input type="checkbox" id="switch-<?= $ch2;
                                                                $ch2++; ?>" class="status_books_tbl " switch="bool" <?php if ($data_books['status'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> data-checkid="<?= @$data_books['id']; ?>">
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
                        <li><a class="dropdown-item delete_books_tbl" data-delid="<?= @$data_books['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>