<?php @session_start();
require_once("database.php");
require_once("yaracode_balout.php");




//////////////////////////////////////////////
if (isset($_REQUEST['actionPage'])) {
	require_once($_REQUEST['actionPage']);
} 
else {
	if (isset($_REQUEST['reqType']) && $_REQUEST['reqType'] != "") {
		$request = cleanData($_REQUEST['reqType']);
		switch ($request) {
			case "getFolderImage":
				$f = new FiLES();
				$add = cleanData($_REQUEST['address']);
				$list = ["address" => $add, "files" => $f->getDirPictures($add), "folders" => $f->getDirFolders($add)];
				echo json_encode($list);
				break;
			case "getFolderFiles":
				$f = new FiLES();
				$add = cleanData($_REQUEST['address']);
				$list = ["address" => $add, "files" => $f->getDirFiles($add), "folders" => $f->getDirFolders($add)];
				echo json_encode($list);
				break;
			case "croppedImage":
				$f = new FILES();
				$f->uploaddir = cleanData($_REQUEST['folder']);
				$f->upload_file("avatar");
				echo $f->fileName;
				break;
			case "orderDaste":
				$oldDaste = new DASTE($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new DASTE($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new DASTE($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
				$oldObj->update();
				$oldObj->reArrange($newOrder, ["id" => "!=0"]);
				$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
				$oldObj->update();
				break;
			case "orderPages":
				$oldDaste = new page_names($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new page_names($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new page_names($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
				$oldObj->update();
				$oldObj->reArrange($newOrder, ["id" => "!=0"]);
				$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
				$oldObj->update();
				break;
			case "orderStoreSetting":
				$oldDaste = new storeSETTING($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new storeSETTING($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new storeSETTING($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
				$oldObj->update();
				$oldObj->reArrange($newOrder, ["id" => "!=0"]);
				$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
				$oldObj->update();
				break;
			case "orderPublicSetting":
				$oldDaste = new publicSETTING($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new publicSETTING($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new publicSETTING($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
				$oldObj->update();
				$oldObj->reArrange($newOrder, ["id" => "!=0"]);
				$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
				$oldObj->update();
				break;
			case "orderMenu":
				$oldDaste = new DASTE($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new DASTE($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new MENUS($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				if ($_REQUEST['from'] == $_REQUEST['to']) {
					$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
					$oldObj->update();
					$oldObj->reArrange($newOrder, ["daste" => $newDaste->name]);
					$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
					$oldObj->update();
				} else {
					// مرتب کردن دسته جدید
					// شماره اندیس ورودی این تابع نادیده گرفته می شود
					$oldObj->reArrange($newOrder, ["daste" => $newDaste->name]);
					$oldObj->order_id = $newOrder;
					$oldObj->daste = $newDaste->name;
					$oldObj->update();
				}
				echo true;
				break;
			case "isFileChunkUploaded":
				$f = new FILES_VIEW();
				$f->isFileChunkUploaded();
				break;
			case "uploadBigFile":
				$f = new FILES_VIEW();
				$f->uploadBigFile();
				break;
			case "addNewFolder":
				$f = new FILES_VIEW();
				$f->makeDirIfNotExists(cleanData($_REQUEST["selectedFolder"]) . '/' . cleanData($_REQUEST['folderName']));
				break;
			case "changeFolder":
				$f = new FILES();
				$from = cleanData($_REQUEST['from']);
				$to = cleanData($_REQUEST['to']);
				$element = cleanData($_REQUEST['element']);
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$res = "";
				if (isset($to) && $to != "" && $to != "null") {
					if ($to == "deleteBox") {
						//باید فایل حذف شود
						$f->delete($element);
						$res = "delete";
					} elseif ($to == "addBox") {
						// باید فایل در پوشه خودش کپی شود
						$f->copyFileOrFolder($element);
						$res = "copy";
					} elseif ($to == "moveBox") {

						$path = pathinfo($element);
						$pathlist = explode('/', $path['dirname']);
						if (count($pathlist) > 1) {
							unset($pathlist[count($pathlist) - 1]);
						}
						$parentFolder = implode('/', $pathlist);
						if ($parentFolder != $path['dirname']) {
							$f->copyFileOrFolder($element, $parentFolder);
							$f->delete($element);
						}
						//$res= "move";
						$res = $parentFolder;
					} else {
						// باید فایل به آدرس جدید کپی شود
						$f->copyFileOrFolder($element, $to);
						$f->delete($element);
						$res = "move";
					}
				}
				if ($f->showErrorMessage() != "") {
					echo "error";
				} else {
					echo $res;
				}


				//echo "from : $from to: $to eleman: $element ";
				break;
			case "deleteFile":
				$f = new FILES();
				$from = cleanData($_REQUEST['from']);
				$to = cleanData($_REQUEST['to']);
				$element = cleanData($_REQUEST['element']);
				$newOrder = cleanData($_REQUEST['newOrder']);
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				$f->delete($element);
				echo "اطلاعات با موفقیت حذف شدند";
				//echo "from : $from to: $to eleman: $element ";
				break;
			case "orderAkhbar":
				$oldDaste = new MENUS($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new MENUS($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$elemanList = explode("_", cleanData($_REQUEST['element']));
				$oldObj = new POSTS($conn);
				$oldObj->get($elemanList[0]);
				//echo "Daste:" .$newDaste->name")."<br>";
				//echo "newIndex:" .
				$newOrder = cleanData($_REQUEST['newOrder']);
				//echo "<br>";
				//echo "oldIndex:" .
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				if ($_REQUEST['from'] == $_REQUEST['to']) {
					$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
					$oldObj->update();
					$oldObj->reArrange($newOrder, ["daste" => "like '%$newDaste->name%'"]);
					$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
					$oldObj->update();
				} else {
					// مرتب کردن دسته جدید
					$dasteha = "";
					$dastehaList = explode('_', $oldObj->daste);
					unset($dastehaList[array_search($oldDaste->name, $dastehaList)]);
					if (in_array($newDaste->name, $dastehaList)) {
						// فقط باید دسته قدیم حذف شود
						echo " 
						document.getElementById('" . cleanData($_REQUEST['element']) . "').remove();
							alert('این دسته از قبل وجود داشت');
							
						";
					} else {
						// هم دسته قدیم حذف شود و هم دسته جدید اضافه شود

						$dastehaList[] = $newDaste->name;
					}

					$oldObj->setDasteList($dastehaList);
					// شماره اندیس ورودی این تابع نادیده گرفته می شود
					$oldObj->reArrange($newOrder, ["daste" => "like '%" . $newDaste->name . "%'"]);
					$oldObj->order_id = $newOrder;
					//$oldObj->daste= $newDaste->name;
					$oldObj->update();
				}
				break;
			case "orderShohada":
				$oldDaste = new MENUS($conn);
				$oldDaste->get(cleanData($_REQUEST['from']));
				$newDaste = new MENUS($conn);
				$newDaste->get(cleanData($_REQUEST['to']));
				$oldObj = new SHOHADA($conn);
				$oldObj->get(cleanData($_REQUEST['element']));
				//echo "Daste:" .$newDaste->name"."<br>";
				//echo "newIndex:" .
				$newOrder = cleanData($_REQUEST['newOrder']);
				//echo "<br>";
				//echo "oldIndex:" .
				$oldOrder = cleanData($_REQUEST['oldOrder']);
				if ($_REQUEST['from'] == $_REQUEST['to']) {
					$oldObj->order_id = 1000000; // برای اینکه داده حاضر از بین داده ها در ردیف آخری قرار بگیرد
					$oldObj->update();
					$oldObj->reArrange($newOrder, ["daste" => $newDaste->name]);
					$oldObj->order_id = $newOrder; // باز گشت به ردیف صحیح
					$oldObj->update();
				} else {
					// مرتب کردن دسته جدید
					// شماره اندیس ورودی این تابع نادیده گرفته می شود
					$oldObj->reArrange($newOrder, ["daste" => $newDaste->name]);
					$oldObj->order_id = $newOrder;
					$oldObj->daste = $newDaste->name;
					$oldObj->update();
				}

				break;
			default:

				echo true;
				break;
		}
	} else {
		echo true;
	}
}


?>