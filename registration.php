<?php
//require_once "XO_setting.php";
//require_once "Form.php";
//require_once "HTML.php";
//require_once "User.php";
//
//
//if( isset($_POST['username']) &&
//isset($_POST['password']) &&
//isset($_POST['password2']) &&
//isset($_POST['email']) &&
//isset($_POST['name']) &&
//isset($_POST['phone']))
//{
//    $username = $_POST['username'];
//    $password = $_POST['password'];
//    $password2 = $_POST['password2'];
//    $email = $_POST['email'];
//    $name = $_POST['name'];
//    $surname = $_POST['surname'];
//    $phone = $_POST['phone'];
//    $country_id = 173;
//    $city_name = "Bang Bo";
//    $city_postal_code = "10560";
//    $role = Role::Normal;
//    $is_deleted = DeleteStatus::Normal;
//
//$fail = validate_username($username);
//$fail .= validate_password($password);
//$fail .= validate_repeat_password($password2,$password);
//$fail .= validate_email($email);
//$fail .= validate_name($name);
//$fail .= validate_surname($surname);
//$fail .= validate_phone($phone);
//
//if ($fail == ""){
//echo "PHP validation successful."."<br>";
//$hashed_password = password_hash($password, PASSWORD_ARGON2ID);
//$user = new User($username, $phone, $email,$hashed_password,$name, $surname, $country_id, $city_name, $city_postal_code,$role, $is_deleted);
//$user-> insert();
//}
//else {
//echo "PHP validation failed". $fail."<br>";
//}
//
//echo "<a href=\"index.php\">Home</a>"."<br>"."<br>";
//}
//
////link to homepage
////echo "<a href=\"index.php\">Home</a>"."<br>"."<br>";
//
//$registrationFormHTML = new html();
//$css_files = array("form.css");
//$js_files = array("");
//$registrationFormHTML->title = "MutexXO";
//$registrationFormHTML->author = "Kimseng Houy";
//$registrationFormHTML->emitHeader($css_files, $js_files);
//emitRegistrationForm();
//$registrationFormHTML->loadJS('js/reg_form_handling.js');
//$registrationFormHTML->emitFooter();
//
///**
//* emits registration form
//*/
//function emitRegistrationForm(){
//$form = new form("registration.php", true);
//$form->startForm("Registration","validate_registration");
//
//$form->startRow();
//$form->emitText('Username: ');
//$form->emitInputText('username');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Password: ');
//$form->emitInputText('password');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Re-enter Password: ');
//$form->emitInputText('password2');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Email: ');
//$form->emitInputText('email');
//$form->endRow();;
//
//$form->startRow();
//$form->emitText('Name: ');
//$form->emitInputText('name');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Surname: ');
//$form->emitInputText('surname');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Phone: ');
//$form->emitInputText('phone');
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Country: ');
////$form->emitInputText('country');
//$mysql = new MySQL();
//$country_list = [];
//try {
//$data = $mysql->select("country", "country_id, name");
//foreach ($data as $row) {
//$country['id'] = $row['country_id'];
//$country['name'] = $row['name'];
//array_push($country_list, $country);
//}
//$form->emitSelect("country", "form_country_select", $country_list);
//}
//catch (Exception $e) {
//die ('Caught exception: '.$e->getMessage() . "\n");
//}
//$form->endRow();
//
//$form->startRow();
//$form->emitText('Province: ');
////$form->emitInputText('city');
//$province_list =  [];
//$country_id = 173; // Thailand
//try {
//$data = $mysql->where("province", "country_id, name", "country_id LIKE " . $country_id);
//foreach ($data as $row) {
//$province['id'] = $row['name'];
//$province['name'] = $row['name'];
//array_push($province_list, $province);
//}
//$form->emitSelect("province", "form_province_select", $province_list);
//$form->emitHiddenSelect("province_173", "form_province_173_select", $province_list);
//}
//catch (Exception $e) {
//die ('Caught exception: '. $e->getMessage() . "\n");
//}
//
//$country_id = 30; // Cambodia
//    $province_list_30 = [];
//    try {
//        $data = $mysql->where("province", "country_id, name", "country_id LIKE " .$country_id);
//        foreach ($data as $row) {
//            $province['id'] = $row['name'];
//            $province['name'] = $row['name'];
//            array_push($province_list_30, $province);
//        }
//        $form->emitHiddenSelect("province_30", "form_province_30_select",$province_list_30);
//    }
//    catch (Exception $e) {
//        die ('Caught exception: '. $e->getMessage() . "\n");
//    }
//$form->endRow();
//
//$form->startRow();
//$form -> emitText('City: ');
//$form -> emitInputText('city_postal_code');
//$city_list = [];
//$province_id = "Bangkok";
//try {
//$data = $mysql->where("city", "name, postal_code", "province_name LIKE \"" . $province_id . "\"");
//foreach ($data as $row) {
//$city['id'] = $row['name'];
//$city['name'] = $row['name'];
//array_push($city_list, $city);
//}
//$form->emitSelect("city", "form_city_select", $city_list);
//}
//catch (Exception $e) {
//die ('Caught exception: '. $e->getMessage() . "\n");
//}
//$form->endRow();
//
//$form->startRow();
//$form -> emitSubmitButton('Register');
//$form -> endForm();
//}
//
//function validate_username($field){
//print_r($field);
//if($field ==="")
//return "No username was entered.";
//else if(strlen($field)<5)
//return "Usernames must be at least 5 characters.\n";
//else if (preg_match("'/[^a-zA-Z0-9_-]/'", $field))
//return "Only a-z, A-Z, 0-9, - and _ are allowed in usernames.\n";
//return "";
//}
//
//function validate_password($field){
//return ($field === "")? "No password was entered." : "";
//}
//
//function validate_repeat_password($field, $password){
//if ($field === "")
//return "No password2 was entered.\n";
//else if ($field !== $password)
//return "passwords do not match\n";
//else
//return "";
//}
//
//function validate_email($field){
//return ($field === "") ? "No email was entered.\n" : "";
//}
//
//function validate_name($field){
//return ($field === "") ? "No name was entered.\n" : "";
//}
//
//function validate_surname($field){
//return ($field === "") ? "No surname was entered.\n" : "";
//}
//
//function validate_phone($field) {
//return ($field === "") ? "No phone was entered.\n" : "";
//}