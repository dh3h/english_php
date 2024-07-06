<?php
require_once("../function/load.php");
$sno = 0;
$select_news = $action->database->query_sql("SELECT * FROM `tbl_news` ORDER BY id DESC;");
if ($select_news) {
    foreach ($select_news as $data_news) {
        $sno++;

?>
        <tr>
            <th><?php echo @$sno ?></th>
            <?php
            $inputString = $data_news['news_title'];
            $wordLimit = 12;
            $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
            ?>
            <td><?php echo @$shortenedString ?>...</td>
            <td><?php echo @$data_news['date'] ?></td>
            <td>
                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_role" data-eid="<?php echo $data_news['id']; ?>"> <i class="fas fa-edit"></i></button> -->
                <div class="switch mx-2">


                    <input type="checkbox" id="switch-<?= $ch2;
                                                        $ch2++; ?>" class="status_news_tbl " switch="bool" <?php if ($data_news['status'] == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> data-checkid="<?= @$data_news['id']; ?>">
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
                        <li><a class="dropdown-item delete_news_tbl" data-delid="<?= @$data_news['id']; ?>" href="#">Delete</a></li>
                    </ul>
                </div>
            </td>
        </tr>

<?php
    }
}
?>