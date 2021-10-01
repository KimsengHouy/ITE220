<?php

require_once "MySQL.php";
require_once "MySQLEntity.php";
class User extends MySQLEntity
{
    public $entity_name = "user";

    public $user_id;
    public $username;
    public $phone;
    public $email;
    public $password;
    public $name;
    public $surname;
    public $country_id;
    public $city_name;
    public $city_postal_code;
    public $role;
    public $is_deleted;

    private $mysql_conn;

    function __construct($username, $phone, $email, $password, $name, $surname, $country_id, $city_name, $city_postal_code, $role, $is_deleted)
    {
        $this->username = $username;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->country_id = $country_id;
        $this->city_name = $city_name;
        $this->city_postal_code = $city_postal_code;
        $this->role = $role;
        $this->is_deleted = $is_deleted;
    }
    public function insert()
    {
        $mysql = new MySQL();
        $username = $this->username;
        $phone = $this->phone;
        $email = $this->email;
        $password = $this->password;
        $name = $this->name;
        $surname = $this->surname;
        $country_id = $this->country_id;
        $city_name = $this->city_name;
        $city_postal_code = $this->city_postal_code;
        $role = $this->role;
        $is_deleted = $this->is_deleted;
        $data = compact('username', 'phone', 'email', 'password', 'name', 'surname', 'country_id', 'city_name', 'city_postal_code', 'role', 'is_deleted');

        try {
            $mysql->insert($this->entity_name, $data);
        } catch (Exception $e) {
            die ('Caught exception: ' . $e->getMessage() . "\n");
        }
    }


    public function delete($id)
    {

    }
}











//require_once "MySQL.php";
//require_once "MySQLEntity.php";
//
//class User extends MySQLEntity{
//    public $entity_name ='user';
//
//    public $user_id;
//    public $username;
//    public $phone;
//    public $email;
//    public $password;
//    public $name;
//    public $surname;
//    public $country_id;
//    public $city_name;
//    public $city_postal_code;
//    public $role;
//    public $is_deleted;
//
//    private $mysql_conn;
//
//    function __construct($username, $phone, $email, $password, $name, $surname, $country_id, $city_name
//    , $city_postal_code, $role, $is_deleted) {
//        $this->username = $username;
//        $this->phone = $phone;
//        $this->email = $email;
//        $this->password = $password;
//        $this->name = $name;
//        $this->surname = $surname;
//        $this->country_id = $country_id;
//        $this->city_name = $city_name;
//        $this->city_postal_code = $city_postal_code;
//        $this->role = $role;
//        $this->is_deleted = $is_deleted;
//
//    }
//
//
//    public function insert()
//    {
//        $mysql = new MySQL();
//        $username = $this->username;
//        $phone = $this->phone;
//        $email = $this->email;
//        $password = $this->password;
//        $name = $this->name;
//        $surname = $this->surname;
//        $country_id = $this->country_id;
//        $city_name = $this->city_name;
//        $city_postal_code = $this->city_postal_code;
//        $role = $this->role;
//        $is_deleted = $this->is_deleted;
//        $data = compact('username', 'phone', 'email', 'password', 'name', 'surname', 'country_id',
//        'city_name', 'city_postal_code', 'role', 'is_deleted');
//        try{
//            $mysql->insert($this->entity_name, $data);
//        } catch (Exception $e) {
//            die ('caught exception: '. $e->getMessage(). "\n");
//        }
//
//    }
//
//    /**
//     * @param $id
//     */
//    public function delete($id)
//    {
//        // TODO: Implement delete() method.
//    }
//}