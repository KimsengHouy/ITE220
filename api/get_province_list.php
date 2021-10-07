<?php

require_once '../MySQL.php';

header('Content-type: text/xml');

header('Cache-Control: no-cache');

header('Cache-Control: no-store', false);


$dom = new DOMDocument();

$dom->encoding = 'utf-8';

$dom->xmlVersion = '1.0';

$dom->formatOutput = true;

$root = $dom->createElement('provinces');

$dom->appendChild($root);

$error = $dom->createElement('error');

$root->appendChild($error);


if (isset($_POST['country_id'])) {

    $country_id = SanitizeString($_POST['country_id']);

    $mysql = new MySQL();

    try {

        $data = $mysql->where("province", "name, country_id", "country_id LIKE " . $country_id);

        if ($data->num_rows != 0) {

            foreach ($data as $row) {

                $province_node = $dom->createElement('province');

                $attr_province_name = new DOMAttr('province_name', $row['name']);

                $province_node->setAttributeNode($attr_province_name);

                $root->appendChild($province_node);

            }

        } else {

            $err_msg = new DOMAttr('message', "No country with ID=" . $country_id . " was found.");

            $error->setAttributeNode($err_msg);

        }

    } catch (Exception $e) {

        $err_msg = new DOMAttr('message', $e);

        $error->setAttributeNode($err_msg);

    }

} else {

    $err_msg = new DOMAttr('message', "country_id missing.");

    $error->setAttributeNode($err_msg);

}
echo $dom->saveXML();

function SanitizeString($var)
{
    $var = strip_tags($var);

    $var = htmlentities($var);

    return stripslashes($var);
}