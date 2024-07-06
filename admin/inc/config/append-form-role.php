   <?php
    require_once('./function/load.php');
    ##extract($data, EXTR_PREFIX_ALL, 'var');
    if (isset($_POST['role_ed']) && !empty($_POST['role_ed'])) {
        $id = $action->database->text_filter($_POST['role_ed']);
        $select = $action->database->query_sql("SELECT * FROM `tbl_role` WHERE id = '{$id}';");
        if ($select) foreach ($select as $data) {
            $role_id = $data['id'];
            $role_name = $data['role_name'];
            $role = $data['role'];
        }
        $ex_role = explode("@@@", $role);
        $role_new = array_values($ex_role);
    ?>
       <div class="form-group">
           <input type="hidden" name="hidden_id" value="<?= @$role_id; ?>">
           <label for="new_role_name1">Role Name</label>
           <input type="text" name="new_role_name1" id="new_role_name1" value="<?= $role_name; ?>" class="form-control" placeholder="Role Name">
           <span class="new_role_name1"></span>
       </div>

       <label class="mt-2" for="">Role Permission</label>
       <br>
       <span class="role_permisson mt-2"></span>
       <div class="row">
           <?php
            $a = array('All', 'Manage Staff', 'Banner', 'About Us', 'Our Service', 'Testimonials','Blogs', 'Gallery Image','Client Logos','Why Choose Us','Our Employee','Manage Projects');
            $r = 0;
            foreach ($a as $b) {
                $r++;
            ?>
               <div class="col-6">
                   <div class="checkbox">
                       <input type="checkbox" <?php foreach ($role_new as $c) {
                                                    if ($b == $c) {
                                                        echo 'checked';
                                                    }
                                                } ?> name="role1[]" value="<?= @$b; ?>" id="role<?= $r; ?>" placeholder="Role Name">
                       <label for="role<?= $r; ?>"><?= @$b; ?></label>
                   </div>
               </div>
           <?php
            }
            ?>
       </div>
       <button class="btn btn-primary submit_btn"> Save Changes</button>
   <?php } ?>