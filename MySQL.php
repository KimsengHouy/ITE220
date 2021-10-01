<?php
//
//
//class MySQL
//{
//    private static $hn;
//    private static $db;
//    private static $un;
//    private static $pw;
//    static private $conn;
//    static private $info = array(
//        'last_query' => null,
//        'num_rows' => null,
//        'insert_id' => null
//    );
//
//    function __construct($hostname = 'localhost',
//                         $database = 'mutexxo',
//                         $username = 'mutexxo_admin',
//                         $password = 'Hbeep6VfUqDfSaT74P4a')
//    {
//        self::$hn = $hostname;
//        self::$db = $database;
//        self::$un = $username;
//        self::$pw = $password;
//    }
//
//    function __destruct()
//    {
//        if (is_resource(self::$conn)) self::$conn->close();
//    }
//
//    /**
//     *  * @return mysqli|void returns a mysql connection
//     */
//    private static function connect()
//    {
//        if (!is_resource(self::$conn) || empty(self::$conn)) {
//            if ($conn = new mysqli(self::$hn, self::$un, self::$pw, self::$db)) {
//                self::$conn = $conn;
//            } else {
//                die(self::$conn->connect_error);
//            }
//        }
//        return self::$conn;
//    }
//
////    public function insert($table, $data)
////    {
////        self::$conn = self::connect();
////        $fields = '';
////        $values = '';
////        foreach ($data as $col => $value) {
////            $fields .= sprintf("'%s',", $col);
////            $values .= sprintf("'%s',", self::$conn->real_escape_string($value));
////        }
////    }
//
//
//
//
//
//
//
//
//
//
//
//    public function select($table, $fields) {
//     self::$conn = self::connect();
//     $sql = sprintf("SELECT %s FROM %s", $fields, $table);
//     self::set('last_query', $sql);
//     $result = self::$conn->query($sql);
//     if(!$result) {
//         throw new Exception('Error executing MySQL query: ' . $sql . '. MySQL error ' .
//             self::$conn->error . ': ' . self::$conn->error);
//     }
//     else {
//         self::set('num_rows', $result->num_rows);
//         return $result;
//     }
// }
//
// public function where($table, $fields, $cond) {
//     self::$conn = self::connect();
//     $sql = sprintf("SELECT %s FROM %s WHERE %s", $fields, $table, $cond);
//     self::set('last_query', $sql);
//     $result = self::$conn->query($sql);
//     if(!$result){
//         throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.
//            self::$conn->error.': '. self::$conn->error);
//     }
//     else
//     {
//         self::set('num_rows', $result->num_rows);
//         return $result;
//     }
// }
//
//
//
//
//
//
//
//    static private function set($field, $value)
// {
//     self::$info[$field] = $value;
// }
//
//
// public function last_query()
// {
//    return self::$info['last_query'];
//     }
// public function num_rows()
//{
//    return self::$info['num_rows'];
//     }
//public function insert_id()
//{
//    return self::$info['insert_id'];
//     }
// }

























class MySQL {

    private static $hn;
    private static $db;
    private static $un;
    private static $pw;

    static private $conn;

    static  private $info = array(
        'last_query' => null,
        'num_rows' => null,
        'insert_id' => null
    );



    /**
     * @param string $hostname
     * @param string $database
     * @param string $username
     * @param string $password
     */

    function __construct($hostname = 'localhost',
                         $database = 'mutexxo',
                         $username = 'mutexxo_admin1',
                         $password = 'VMGc82LA3I5331ovdQrq') {
        self::$hn = $hostname;
        self::$db = $database;
        self::$un = $username;
        self::$pw = $password;
    }

    function __destruct(){
        if(is_resource(self::$conn)) self::$conn->close();
    }

    /**
     * @return mysqli/void return a mysql connection
     */
    private static function connect(){
        if(!is_resource(self::$conn) || empty(self::$conn)) {
            if ($conn = new mysqli(self::$hn, self::$un, self::$pw, self::$db)) {
                self::$conn = $conn;
            } else {
                die(self::$conn->connect_error);
            }

        }
        return self::$conn;
    }

    /**
     * @param $table
     * @param $data
     * @return bool
     * @throws Exception
     */

//    public function insert($table, $data)
//    {
//        self::$conn = self::connect();
//        $fields = '';
//        $values = '';
//        foreach ($data as $col => $value) {
//            $fields .= sprintf('"%s",', $col);
//            $values .= sprintf("'%s',", self::$conn->real_escape_string($value));
//        }


//    public function insert($table, $data) {
//        self::$conn = self::connect();
//        $fields = '';
//        $values = '';
//        $table = sprintf('"%s"', $table);
//        foreach ($data as $col => $value) {
//            $fields .= sprintf('"%s",', $col);
//            $values .= sprintf("'%s',", self::$conn->real_escape_string($value));
//        }


    public function insert($table, $data) {
        self::$conn = self::connect();
        $fields = '';
        $values = '';
        $table = sprintf('`%s`', $table);
        foreach ($data as $col => $value) {
            $fields .= sprintf('`%s`,', $col);
            $values .= sprintf("'%s',", self::$conn->real_escape_string($value));
        }
        //remove the last commas
        $fields = substr($fields,0,-1);
        $values = substr($values,0,-1);
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);
        self::set('last query', $sql);
        if(!self::$conn->query($sql)) {
            throw new Exception('Error executing MySQL query: ' . $sql . ' . MySQL error' . self::$conn->error . ': ' . self::$conn->error);
        }else {
            self::set('insert_id', self::$conn->insert_id);
            return true;
        }







    }
    /**
     * Setter method
     */
    static private function set($field, $value){
        self::$info[$field] = $value;

}
/**
 * Getter methods
 */
    public  function  last_query(){
    return self::$info['last_query'];
}

    public  function  num_rows(){
        return self::$info['num_rows'];
    }

    public  function  insert_id(){
        return self::$info['insert_id'];
    }

    /**
     * @param $table
     * @param $fields
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function select($table, $fields) {
        self::$conn = self::connect();
        $sql = sprintf("SELECT %s FROM %s", $fields, $table);
        self::set('last_query', $sql);
        $result = self::$conn->query($sql);
        if(!$result) {
            throw new Exception('Error executing MySQL query: ' . $sql . ' . MySQL error ' .
            self::$conn->errno . ':' . self::$conn->error);
        } else{
            self::set('num_rows', $result->num_rows);
    return $result;
        }
    }

    /**
     * @param $table
     * @param $fields
     * @param $cond
     * @return bool|mysqli_result
     * @throws Exception
     */
    public function where($table, $fields, $cond) {
        self::$conn = self::connect();
        $sql = sprintf("SELECT %s FROM %s WHERE %s", $fields, $table, $cond);
        self::set('last_query', $sql);
        $result = self::$conn->query($sql);
        if(!$result) {
            throw new Exception('Error executing MySQL query: ' . $sql . ' . MySQL error ' .
            self::$conn->errno . ' : ' . self::$conn->error);
        }
            else{
                self::set('num_rows', $result->num_rows);
                return $result;
            }
    }
}