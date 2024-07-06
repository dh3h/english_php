<?php
require_once("./function/load.php");
$json = array();
$ext = array("png", "jpg", "jpeg");
function set_json($sts, $msg)
{
    $json["status"] = $sts;
    $json["msg"] = $msg;
    return $json;
}
$select_setting = $action->database->query_sql("SELECT * FROM tbl_setting WHERE id = 1");
if ($select_setting) {
    foreach ($select_setting as $dt_st) {
    }
}

if (isset($_POST["google_map"])) {
    if (!empty($action->database->text_filter($_POST["google_map"]))) {
        $map = ($_POST["google_map"]);

        $action->database->update_query("tbl_setting", ["map" => $map], "id = '1'");
        $json = set_json(40, "Updated Successfully");
    } else {
        $json = set_json(10, "Map Can't be empty");
    }
}

if (isset($_POST["address"])) {
    if (!empty(($_POST["address"]))) {
        $address = ($_POST["address"]);

        $action->database->update_query("tbl_setting", ["address" => $address], "id = '1'");
        $json = set_json(40, "Updated Successfully");
    } else {
        $json = set_json(10, "Address Can't be empty");
    }
}


if (isset($_POST["phone_no"])) {
    if (!empty($action->database->text_filter($_POST["phone_no"]) && !preg_match('/^[0-9]{10}+$/', $_POST['phone_no']))) {
        $phone = ($_POST["phone_no"]);

        $action->database->update_query("tbl_setting", ["phone" => $phone], "id = '1'");
        $json = set_json(40, "Updated Successfully");
    } else {
        $json = set_json(10, "Phone Can't be empty");
    }
}

if (isset($_POST["email_id"])) {
    if (!empty($action->database->text_filter($_POST["email_id"]))) {
        if (filter_var($_POST["email_id"], FILTER_VALIDATE_EMAIL)) {
            $email_id = $action->database->text_filter($_POST["email_id"]);
            $action->database->update_query("tbl_setting", ["email_id" => $email_id], "id = '1'");
            $json = set_json(40, "Updated Successfully");
        } else {
            $json = set_json(10, "Invalid Email");
        }
    } else {
        $json = set_json(10, "Email id Can't be empty");
    }
}

// ###### Social Links Start

if (isset($_POST["youtube"])) {
    if (!empty($action->database->text_filter($_POST["youtube"]))) {
        if (filter_var($_POST["youtube"], FILTER_VALIDATE_URL)) {
            $youtube = $action->database->text_filter($_POST["youtube"]);
        } else {
            $json = set_json(10, "Invalid Youtube URL");
        }
    } else {
        $json = set_json(10, "Youtube URL Can't be empty");
    }
}


if (isset($_POST["instagram"])) {
    if (!empty($action->database->text_filter($_POST["instagram"]))) {
        if (filter_var($_POST["instagram"], FILTER_VALIDATE_URL)) {
            $insta = $action->database->text_filter($_POST["instagram"]);
        } else {
            $json = set_json(10, "Invalid Instagran URL");
        }
    } else {
        $json = set_json(10, "Instagran URL Can't be empty");
    }
}
if (isset($_POST["facebook"])) {
    if (!empty($action->database->text_filter($_POST["facebook"]))) {
        if (filter_var($_POST["facebook"], FILTER_VALIDATE_URL)) {
            $facebook = $action->database->text_filter($_POST["facebook"]);

            if (isset($youtube) && isset($insta) && isset($facebook)) {
                $action->database->update_query("tbl_setting", ["facebook" => $facebook, "instagram" => $insta, "youtube" => $youtube], "id = '1'");
                $json = set_json(40, "Updated Successfully");
            }
        } else {
            $json = set_json(10, "Invalid Facebook URL");
        }
    } else {
        $json = set_json(10, "Facebook URL Can't be empty");
    }
}

// ######## Social Links End

if (isset($_FILES["logo"]["name"])) {
    if (!empty($action->database->text_filter($_FILES["logo"]["name"]))) {
        $filename = $_FILES['logo']['name'];
        $tmpname = $_FILES['logo']['tmp_name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($extension, $ext)) {
            $filename = "logo-" . strtotime(date("Y-m-d-h:i")) . "-" . rand(1000000, 9999999) . '.' . $extension;
            $path = "../../../upload/" . $filename;

            $action->database->update_query("tbl_setting", ["logo" => $filename], "id = 1");
            move_uploaded_file($tmpname, $path);
            if (isset($dt_st)) {
                $last_img = $dt_st["logo"];
                if (file_exists("../../../upload/" . $last_img)) {
                    unlink("../../../upload/" . $last_img);
                }
            }
            $json = set_json(40, "Updated Successfully");
        } else {
            $json = set_json(10, "Only Images Are Allowed");
        }
    } else {
        $json = set_json(10, "File Required");
    }
}



if (isset($_FILES["favicon"]["name"])) {
    if (!empty($action->database->text_filter($_FILES["favicon"]["name"]))) {
        $filename = $_FILES['favicon']['name'];
        $tmpname = $_FILES['favicon']['tmp_name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array($extension, $ext)) {
            $filename = "favicon-" . strtotime(date("Y-m-d-h:i")) . "-" . rand(1000000, 9999999) . '.' . $extension;
            $path = "../../../upload/" . $filename;

            $action->database->update_query("tbl_setting", ["favicon_icon" => $filename], "id = 1");
            move_uploaded_file($tmpname, $path);
            if (isset($dt_st)) {
                $last_img = $dt_st["favicon_icon"];
                if (file_exists("../../../upload/" . $last_img)) {
                    unlink("../../../upload/" . $last_img);
                }
            }
            $json = set_json(40, "Updated Successfully");
        } else {
            $json = set_json(10, "Only Images Are Allowed");
        }
    } else {
        $json = set_json(10, "File Required");
    }
}

// ######### SEO SETTINGS START

if (isset($_POST["meta_desc"])) {
    if (!empty($action->database->text_filter($_POST["meta_desc"]))) {
        $meta_desc = $action->database->text_filter($_POST["meta_desc"]);
    } else {
        $json = set_json(10, "Description Can't be empty");
    }
}

if (isset($_POST["seo_title"])) {
    if (!empty($action->database->text_filter($_POST["seo_title"]))) {
        $seo_title = $action->database->text_filter($_POST["seo_title"]);
    } else {
        $json = set_json(10, "SEO title Can't be empty");
    }
}
if (isset($_POST["site_name"])) {
    if (!empty($action->database->text_filter($_POST["site_name"]))) {
        $site_name = $action->database->text_filter($_POST["site_name"]);
        if (isset($seo_title) && isset($meta_desc)) {
            $action->database->update_query("tbl_setting", ["meta_desc" => $meta_desc, "seo_titile" => $seo_title, "site_name" => $site_name], "id = '1'");
            $json = set_json(40, "Updated Successfully");
        }
    } else {
        $json = set_json(10, "Site Name Can't be empty");
    }
}

if (isset($_POST["privacy_policy"])) {
    if (!empty(($_POST["privacy_policy"]))) {
        $privacy_policy = ($_POST["privacy_policy"]);

        $action->database->update_query("tbl_setting", ["privacy_policy" => $privacy_policy], "id = '1'");
        $json = set_json(40, "Updated Successfully");
    } else {
        $json = set_json(10, "Privacy Policy Can't be empty");
    }
}

if (isset($_POST["terms&conditions"])) {
    if (!empty(($_POST["terms&conditions"]))) {
        $termsconditions = ($_POST["terms&conditions"]);

        $action->database->update_query("tbl_setting", ["conditions" => $termsconditions], "id = '1'");
        $json = set_json(40, "Updated Successfully");
    } else {
        $json = set_json(10, "Terms & Conditions Can't be empty");
    }
}


// ######### SEO SETTINGS END

echo json_encode($json);
