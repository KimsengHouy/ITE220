<?php
require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";


if (isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['password2']) &&
    isset($_POST['email']) &&
    isset($_POST['name']) &&
    isset($_POST['phone'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $country_id = 173;
    $city_name = "Pho Thong";
    $city_postal_code = "14120";
    $role = Role::Normal;
    $is_deleted = DeleteStatus::Normal;


    $fail = validate_username($username);
    $fail .= validate_password($password);
    $fail .= validate_repeat_password($password2, $password);
    $fail .= validate_email($email);
    $fail .= validate_name($name);
    $fail .= validate_surname($surname);
    $fail .= validate_phone($phone);



    if ($fail == "") {
        echo "PHP validation successful." . "<BR>";
        $hashed_password = password_hash($password, PASSWORD_ARGON2ID);
        $user = new user($username, $phone, $email, $hashed_password, $name, $surname,
        $country_id, $city_name, $city_postal_code, $role, $is_deleted);
        $user->insert();
    }
    else {
        echo "PHP validation failed : " . $fail . "<BR>";
    }
    echo "<a href = \"index.php\"> Home </a>";
}

$registrationFormTML = new HTML();
$css_files = array ("css/form.css");
$js_files = array("");
$registrationFormTML->title = "MutexXO";
$registrationFormTML->author = "Kimseng Houy";
$registrationFormTML->emitHeader($css_files, $js_files);
emitRegistrationForm();
$registrationFormTML->loadJS("js/reg_form_handling.js");
$registrationFormTML->emitFooter();


function emitRegistrationForm () {
    $form = new Form("registrations.php", true);
    $form->startForm("Registration", "validate_registration");
    $form->startRow();
    $form->emitText("username:");
    $form->emitInputText("username");
    $form->endRow();
    $form->startRow();
    $form->emitText("password:");
    $form->emitInputText("password");
    $form->endRow();

    $form->startRow();
    $form->emitText("confirm password:");
    $form->emitInputText("password2");
    $form->endRow();
    $form->startRow();
    $form->emitText("email:");
    $form->emitInputText("email");
    $form->endRow();


    $form->startRow();
    $form->emitText("name:");
    $form->emitInputText("name");
    $form->endRow();
    $form->startRow();
    $form->emitText("surname:");
    $form->emitInputText("surname");
    $form->endRow();

    $form->startRow();
    $form->emitText("phone:");
    $form->emitInputText("phone");
    $form->endRow();

    $form->startRow();
    $form->emitText("country:");
    $mysql = new MySQL();
    $country_list = [];
    try {
        $data = $mysql->select("country", "country_id, name");
         foreach ($data as $row) {
             $country['id'] = $row['country_id'];
             $country['name'] = $row['name'];
             array_push($country_list, $country);
         }
         $form->emitSelect("country", "form_country_select", $country_list);
    }
    catch (Exception $e) {
         die ('Caught exception: '. $e->getMessage() . "\n");
    }
    $form->endRow();

    $form->startRow();
    $form->emitText("province:");
    $country_id = 173; // Thailand
    $province_list = [];
    try {
        $data = $mysql->where("province", "country_id, name", "country_id LIKE " .
            $country_id);
      foreach ($data as $row) {
          $province['id'] = $row['name'];
          $province['name'] = $row['name'];
          array_push($province_list, $province);
      }
      $form->emitSelect("province", "form_province_select", $province_list);
    }
    catch (Exception $e) {
      die ('Caught exception: '. $e->getMessage() . "\n");
}

$country_id = 30; // Cambodia
$province_list_30 = array();
try {
        $data = $mysql->where("province", "country_id, name", "country_id LIKE " . $country_id);
         foreach ($data as $row) {
            array_push($province_list_30, $row['name']);
         }
         $form->emitHiddenSelect("province_30", "form_province_30_select",
             $province_list_30);

}
catch (Exception $e) {
         die ('Caught exception: '. $e->getMessage() . "\n");
}


$form->endRow();

    $form->startRow();
    $form->emitText("city:");
    $city_list = [];
    $province_name= "Bangkok";
    try {
        $data = $mysql->where("city", "name, postal_code", "province_name LIKE \"" .
    $province_name. "\"");
        foreach ($data as $row) {
            $city['id'] = $row['name'];
            $city['name'] = $row['name'];
            array_push($city_list, $city);
        }
        $form->emitSelect("city", "form_city_select", $city_list);
    }
    catch (Exception $e) {
         die ('Caught exception: '. $e->getMessage() . "\n");
    }
//    $city_list_30 = [];
//    $province_id = "Bangteay Meanchey";
//
//    try {
//        $data = $mysql->where("city", "name, postal_code", "province_name LIKE \"" .
//            $province_id . "\"");
//        foreach ($data as $row) {
//            $city['id'] = $row['name'];
//            $city['name'] = $row['name'];
//            array_push($city_list, $city);
//        }
//        $form->emitHiddenSelect("city_30", "form_city_30_select",
//            $city_list_30);
//
//    }
//    catch (Exception $e) {
//        die ('Caught exception: '. $e->getMessage() . "\n");
//    }


    $form->endRow();


    $form->startRow();
    $form->emitSubmitBtn("Register");
    $form->endForm();
}

function get_post($conn, $var) {
     return $conn->real_escape_string($_POST[$var]);
}

function validate_username ($field) {
     print_r($field);
if ($field === "")
    return "No Username was entered.\n";
else if (strlen($field) < 5)
    return "Usernames must be at least 5 characters.\n";
else if (preg_match("'/ˆ[a-zA-Z0-9_-]/'", $field))
    return "Only a-z, A-Z, 0-9, - and _ allowed in usernames.\n";
return "";
}
function validate_password ($field) {
    return ($field === "") ? "No password was entered.\n" : "";
}
function validate_repeat_password ($field, $password) {
    if ($field === "")
        return "No password2 was entered.\n";
else if ($field !== $password )
    return "passwords do not match\n";
else
    return "";
}

function validate_email($field) {
     return ($field === "") ? "No email was entered.\n" : "";
}

function validate_name($field) {
     return ($field === "") ? "No name was entered.\n" : "";
}

function validate_surname($field) {
   return ($field === "") ? "No surname was entered.\n" : "";
}


function validate_phone($field) {
   return ($field === "") ? "No phone was entered.\n" : "";
}
