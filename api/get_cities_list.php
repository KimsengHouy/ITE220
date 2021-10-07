<?php

require_once '../MySQL.php';

header('Content-type: text/xml');

header('Cache-Control: no-cache');

header('Cache-Control: no-store', false);

$dom = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->xmlVersion = '1.0';
$dom->formatOutput = true;
$root = $dom->createElement('cities');
$dom->appendChild($root);
$error = $dom->createElement('error');
$root->appendChild($error);
if (isset($_POST['province_name'])) {
    $province_name = SanitizeString($_POST['province_name']);
    $mysql = new MySQL();

    try {
        $data = $mysql->where("city", "province_name, name", "province_name LIKE " . "'$province_name'");
        if ($data->num_rows != 0) {
            foreach ($data as $row) {
                //list of province is received from MySQL at this time
                $city_node = $dom->createElement('city');
                $attr_city_name = new DOMAttr('city_name', $row['name']);
                $city_node->setAttributeNode($attr_city_name);
                $root->appendChild($city_node);
            }
        } else {
            $err_msg = new DOMAttr('message', "No province with ID=" . $province_name . " was found.");
            $error->setAttributeNode($err_msg);
        }
    } catch (Exception $e) {
        $err_msg = new DOMAttr('message', $e);
        $error->setAttributeNode($err_msg);
    }
} else {
    $err_msg = new DOMAttr('message', "province_name missing.");
    $error->setAttributeNode($err_msg);
}

echo $dom->saveXML();

function SanitizeString($var)
{

    $var = strip_tags($var);

    $var = htmlentities($var);

    return stripslashes($var);

}