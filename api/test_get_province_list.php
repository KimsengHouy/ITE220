<?php
require_once '../Form.php';
$form = new Form("get_province_list.php", false);
$form->startForm("Test get_province_list.php");
$form->emitText("country_id (integer):");
$form->emitInputText("country_id");
$form->emitSubmitBtn("Test");
$form->endForm();