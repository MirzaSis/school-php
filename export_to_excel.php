<?php require_once("database.php"); ?>
<?php require_once("yaracode_balout.php"); ?>
<?php require_once("extends.php"); ?>
<?php require_once("src/jdf.php"); ?>
<?php
$data = json_decode(urldecode($_REQUEST['data']));
$object = isset($_REQUEST['object']) ? $_REQUEST['object'] :  "base";
switch ($object) {
	case "posts":
		$base = new POSTS($conn);
		$base->excel_report($data);
		break;
	default:
		$str = '$obj= new ' . strtoupper($object) . '($conn);';
		eval($str);
		$obj->excel_report($data);
		break;
}
