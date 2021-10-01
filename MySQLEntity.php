<?php


abstract class MySQLEntity{
    public $entity_name = "table_name";
    public $fields;

    public abstract function insert();

    public abstract function delete($id);

    public function get($id) {

    }
}
