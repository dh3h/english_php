<?php
require_once("../function/load.php");
$sno = 0;
$select_books_chapter = $action->database->query_sql("SELECT tbl_books_chapter.id,tbl_books_chapter.book_id,tbl_books_chapter.lession_title,tbl_books_chapter.lession_details, tbl_books_chapter.date,tbl_books_chapter.status, tbl_books.book_name FROM `tbl_books_chapter`INNER JOIN tbl_books ON tbl_books_chapter.book_id = tbl_books.id ORDER BY id DESC;");
if ($select_books_chapter) {
    foreach ($select_books_chapter as $data_books_chapter) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <td><?php echo @$data_books_chapter['book_name'] ?></td>
            <td><?php echo @$data_books_chapter['lession_title'] ?></td> 
            
            <td><?php echo @$data_books_chapter['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_phase['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_book_chapter_tbl" switch="bool" <?php if ($data_books_chapter['status'] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> data-checkid="<?= @$data_books_chapter['id']; ?>">
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
                        <li><a class="dropdown-item delete_book_chapter_tbl" data-delid="<?= @$data_books_chapter['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>