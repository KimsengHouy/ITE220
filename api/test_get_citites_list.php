<?php
require_once '../Form.php';
$form = new Form("get_cities_list.php", false);
$form->startForm("Test get_cities_list.php");
$form->emitText("province_name (varchar):");
$form->emitInputText("province_name");
$form->emitSubmitBtn("Test");
$form->endForm();