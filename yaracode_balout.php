<?php
# یارا کد بلوط
# نسخه شماره 1
# تاریخ انتشار 1402/09/27
# کد نویس حمید رضا رشیدی جهان آباد
# شماره تماس 09179414597
# تغغیر در کد ها به دلخواه شما مجاز است
# حق نشر محفوظ است و چنانچه مشاهده شود کهاین کد ها را می فروشید شرعا حرام و حق پیگیری برای صاحب کد محفوظ است
# منبع: https://rashidi1401.ir
#yasojema@gmail.com

// این می شود پیشوند نام جدول های دیتابیس شما
define("PREFIX","school");
define("isDebogeOn",true);

 

class BASE
{
	// کلاسی پایه برای مدیریت دیتا بیس 
	// برای اضافه کردن ستون دارای خاصیت اتواینکریمنت (خود افزایشی) بهتر است جدول قبلی کاملا 
	// حذف شده و جدول جدید ساخته شود
	// ارتباط با دیتابیس
	protected $conn;
	public $autoIdName; // نام ستونی که بصورت اتوماتیک افزایش پیدا می کند
	// نام دیتا بیس اصلی سایت را وارد کنید
	public $DATABASE_NAME = "";

	// نام جدول مد نظر خود را وارد کنید
	public $TABLENAME = 'testTable';

	protected $defaultType = self::TYPE_TEXT50;

	// بعضی ستون هایی که نیاز داریم پس از ذخیره مقادیر آنها تغییر نکند
	// مقادیری که باید توسط سیستم تنظیم شوند نه کاربر
	// ستونهایی که جنبه فایلی دارند نمی توانند مقدار ثابت بپذیرند

	// نکته باید اطلاعات به صورت کلید مقدار همیشه اینجا وارد شود تا به درستی عمل کند
	// مثلا $fixedColumns=['name'=>"","family"=>""]
	public $fixedColumns = [];
	public $isLogin = false;
	///////////////////////////////////////////////////////////////////////////////////////////////
	// انواع داده دیتابیس
	const TYPE_AUTOID = "autoid";
	const TYPE_ID = "id";
	const TYPE_TEXT10 = "text10";
	const TYPE_TEXT20 = "text20";
	const TYPE_TEXT30 = "text30";
	const TYPE_TEXT40 = "text40";
	const TYPE_TEXT50 = "text50";
	const TYPE_TEXT100 = "text100";
	const TYPE_PASSWORD = "password";
	const TYPE_PASS = "pass";
	const TYPE_SECRET = "secret";
	const TYPE_TEXT200 = "text200";
	const TYPE_SELECT = "select";
	const TYPE_CHECKBOX = "checkbox";
	const TYPE_RADIO = "radio";
	const TYPE_FILE = "file";
	const TYPE_IMG = "img";
	const TYPE_ALBUM = "album";
	const TYPE_BIGFILE = "bigfile";
	const TYPE_TEXT400 = "text400";
	const TYPE_URL = "url";
	const TYPE_TEXT = "text";
	const TYPE_TEXT_RICH = "text_rich";
	const TYPE_NUMBER = "number";
	const TYPE_CODE = "code";
	const TYPE_DOUBLE = "double";
	const TYPE_COLOR = "color";
	const TYPE_TIME = "time";
	const TYPE_DATE = "date";
	const TYPE_TEL = "tel";
	const TYPE_EMAIL = "email";
	const TYPE_RANGE = "range";
	const TYPE_BOLEAN = "bolean";
	const TYPE_TIMESTAMP = "timestamp";
	const TYPE_LAST_TIMESTAMP = "last_timestamp";
	const TYPE_LABLE = "lable";
	const TYPE_HIDDEN = "hidden";
	///////////////////////////////////////////////////////////////////////////////////////////////


	// اگر وضعیت فعال باشد
	const STATUS_ACTIVE = 0;
	// اگر غیر فعال شده باشد
	const STATUS_DISACTIVE = 1;



	const SHOW_EDIT_BTN = "ذخیره <img src='src/site_images/edit2.png' class='rounded-3' width='25px' alt=''>";
	const SHOW_SELECT_BTN = "انتخاب";
	// ایجاد افزودن جدید ساختن 
	const SHOW_ADD_BTN = "ثبت جدید<img src='src/site_images/add.jpg' class='rounded-circle' width='25px' alt=''>";
	const SHOW_DELETE_BTN = "حذف <img src='src/site_images/delete3.png' class='rounded-3' width='25px' alt=''>";
	const SHOW_COPY_BTN = "رونوشت";
	const SHOW_LOGIN_BTN = "ورود";
	const SHOW_LOGOUT_BTN = "خروج";
	const SHOW_CHECK_BTN = "بررسی";
	const SHOW_SIGNUP_BTN = "ثبت نام";
	const SHOW_CLOSE_BTN = "بستن <img src='src/site_images/tik_type1_false.png' class='rounded-circle' width='25px' alt=''>";
	const SQL_ORDER_ASC = "ASC"; // مرتب کردن نتایج از کم به زیاد
	const SQL_ORDER_DESC = "DESC"; // مرتب کردن نتایج از زیاد به کم

	const colType = [
		self::TYPE_AUTOID => ["def" => "", "type" => "int(11)", "isnull" => "NOT NULL", "other" => "AUTO_INCREMENT", "collate" => ""],
		self::TYPE_ID => ["def" => "0", "type" => "int(11)", "isnull" => "NOT NULL", "other" => "", "collate" => ""],
		self::TYPE_TEXT10 => ["def" => "NULL", "type" => "varchar(10)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT20 => ["def" => "NULL", "type" => "varchar(20)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT30 => ["def" => "NULL", "type" => "varchar(30)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT40 => ["def" => "NULL", "type" => "varchar(40)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT50 => ["def" => "NULL", "type" => "varchar(50)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT100 => ["def" => "NULL", "type" => "varchar(100)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_PASSWORD => ["def" => "NULL", "type" => "varchar(100)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_PASS => ["def" => "NULL", "type" => "varchar(100)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_SECRET => ["def" => "NULL", "type" => "varchar(100)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT200 => ["def" => "NULL", "type" => "varchar(200)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_SELECT => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_CHECKBOX => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_RADIO => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_FILE => ["def" => "NULL", "type" => "varchar(400)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_IMG => ["def" => "NULL", "type" => "varchar(400)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_ALBUM => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_BIGFILE => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT400 => ["def" => "NULL", "type" => "varchar(400)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_URL => ["def" => "NULL", "type" => "varchar(400)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEXT_RICH => ["def" => "NULL", "type" => "text", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_NUMBER => ["def" => "0", "type" => "int(11)", "isnull" => "", "other" => "", "collate" => ""],
		self::TYPE_CODE => ["def" => "0", "type" => "int(11)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_DOUBLE => ["def" => "0", "type" => "double", "isnull" => "", "other" => "", "collate" => ""],
		self::TYPE_COLOR => ["def" => "NULL", "type" => "varchar(30)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TEL => ["def" => "NULL", "type" => "varchar(15)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_EMAIL => ["def" => "NULL", "type" => "varchar(100)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_RANGE => ["def" => "0", "type" => "int(11)", "isnull" => "", "other" => "", "collate" => ""],
		self::TYPE_BOLEAN => ["def" => "0", "type" => "tinyint(4)", "isnull" => "NOT NULL", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TIMESTAMP => ["def" => "CURRENT_TIMESTAMP", "type" => "timestamp", "isnull" => "NOT NULL", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_TIME => ["def" => "NULL", "type" => "varchar(15)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_DATE => ["def" => "NULL", "type" => "varchar(15)", "isnull" => "", "other" => "", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_LAST_TIMESTAMP => ["def" => "CURRENT_TIMESTAMP", "type" => "timestamp", "isnull" => "NOT NULL", "other" => "ON UPDATE CURRENT_TIMESTAMP", "collate" => "utf8mb4_persian_ci"],
		self::TYPE_LABLE => ["def" => "", "type" => "", "isnull" => "", "other" => "", "collate" => ""],
		self::TYPE_HIDDEN => ["def" => "", "type" => "", "isnull" => "", "other" => "", "collate" => ""],
	];

	// اطلاعات مربوط به ستون های جدول
	protected $columns = [
		"id" => ["val" => "", "lbl" => "شماره", "type" => "autoid", "require" => false, "list" => []],
	];
	private $listOfCols = [];
	protected $errors = [];
	protected $hides = []; // در هنگام حستحو عبارات جستجو شده قبلی را نگه می دارد
	protected $sql_limit_start = 0; // محدودیت در جستجوی نتایج جایگاه شروع نتایح
	public $sql_limit_count = 0; // محدودیت در جستجوی تعداد نتایج
	public $sql_limit_page = -1; // محدودیت در جستجو صفحه فعال
	public $search_count_result = 0; // تعداد نتایج جستجو 
	public $search_count_page = 0; // تعداد صفحات حاصل از جستجو
	public $sql_order_list = []; // نام ستون ها برای مرتب کردن نتایح
	public $sql_order_type = self::SQL_ORDER_ASC; // تنظیم نوع مرتب کردن کوچک به بزرگ یا برعکس
	public $sql_group_list = []; // گروه بندی نتایح براساس نام ستونها

	public function __construct($conn = NULL, $table_name, $ListOfCols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// ارایه باید تو د رتو باشد و در سطح اول اسم ستون و در سطح دوم نوع و برچسب آن مشخص شود
		$this->DATABASE_NAME=$GLOBALS['dbName'];
		$newCols = [];
		$this->TABLENAME = $table_name;
		$this->listOfCols = $ListOfCols;
		$this->setCols($ListOfCols);
		$this->getAutoIdName();
		if (isset($conn)) $this->setConection($conn);


		// اجزای کلاس مقدار دهی اولیه می شود
		$this->setDefaults();
		
		// این کد برای بروز رسانی دیتابیس مورد استفاده قرار می گیرد
		//$this->safeUpdateDataBase();
	}

	public function setConection($conn)
	{
		// اتصال به دیتا بیس باید موقع ایجاد شی ارسال شود
		$this->conn = $conn;
		// سه دستور زیر که به صورت کامنت هستند در صورت فعال شدن باعث کاهش سرعت سایت خواهند شد
		// پس تنها در ابتدای کار و یا زمانی که قصد تغییر در ستونهای سایت را دارید فعال شوند 


		// این گزینه برای بارگذاری سایت در هاست
		//وقتی که قصد دارید ستونی جدید اضافه کنید ولی اطلاعات ستونهای حذف شده از دیتابیس حذف نشوند
		if(isDebogeOn){
			$this->checkColumns();
		}

		// ستونهای جدول را بروز می کند و اطلاعات نا موجود در لیست ستونهای شی از لیست ستونهای دیتابیس حذف می شوند 
		//$this->updateDataBase(); 

		// استفاده از گزینه زیر صرفا در مراحل راه اندازی سایت توصیه می شود
		// چرا که کلیه اطلاعات داخل دیتابیس را حذف می کند
		// اگر ایندکس تغییر کند ریست نیاز است
		//$this->resetDataBase();
	}

	private function checkColumns($i = 0)
	{
		$sql = "SELECT * FROM information_schema.`COLUMNS` WHERE `TABLE_SCHEMA`='" . $this->DATABASE_NAME . "' and TABLE_NAME='" . PREFIX . "_" . $this->TABLENAME . "';";
		//echo "<br>".$sql."<br>";
		$result = mysqli_query($this->conn, $sql); //or $this->errorManger(mysqli_error($this->conn)."line:".__LINE__);
		//var_dump($result);
		$found = mysqli_num_rows($result);
		$list = [];
		$autoidname = "";
		if ($found) {
			while ($row = mysqli_fetch_assoc($result)) {
				$list[] = $row['COLUMN_NAME'];
				if ($row['EXTRA'] == "auto_increment") $autoidname = $row['COLUMN_NAME'];
			}
		}
		$colNames = $this->getCols();
		$flag = false;
		$errorCol = "";
		if (count($list) > 0) {
			foreach ($colNames as $col) {
				if (
	!in_array($col, $list)
	&& $this->columns[$col]['type'] != self::TYPE_HIDDEN
	&& $this->columns[$col]['type'] != self::TYPE_LABLE
				) {
	$flag = true;
	$errorCol = $col;
				}
			}
		} else {
			$flag = true;
		}

		if ($flag == true) {
			$this->safeUpdateDataBase();

			if ($i > 0) $this->errorManger("ساختار دیتابیس مشکل دارد <br>
				ستون مشکل دار $errorCol است<br>
				ستون خودافزایشی فعلی $autoidname نام دارد <br>
				line: " . __LINE__ . "<br> i=$i;" .
				"<br> اطلاعات جدول : " . $this->TABLENAME);
			//echo "<h1>نوع بعضی از ستونها از جمله ایندکس ها و تاریخ ها به صورت اتوماتیک غیر قابل ویرایش هستند و باید به صورت دستی در دیتابیس اصلاح گردند</h1>";
			$i++;
			$this->checkColumns($i);
		}
	}
	public function __set($name, $value)
	{
		if (isset($this->columns[$name])) {
			// اطلاعات ستون های
			// lable , hidden
			// بابقیه متفاوت هستند و از دیتا بیس خوانده نمی شوند
			// و صرفا در فرم ها استفاده دارند 
			// البته ستون مخفی مقدارش مثل بقیه پاس داده می شود 
			//ولی ستون برچسب نوشته آن به عنوان برچسب به خود ستون داده می شود
			if ($this->columns[$name]['type'] == self::TYPE_LABLE) {
				$this->columns[$name]['lbl'] = $value;
			} else {
				$this->columns[$name]['val'] = $value;
			}
		} else {

			trigger_error("خطا! <br> ستون $name در جدول وجود ندارد");

			die("خطا! <br> ستون $name در جدول وجود ندارد");
		}
	}
	public function __get($name)
	{
		if (isset($this->columns[$name])) {
			if ($this->columns[$name]['type'] == self::TYPE_LABLE) {
				return $this->columns[$name]['lbl'];
			} else {
				return $this->columns[$name]['val'];
			}
		} else {
			trigger_error("خطا! <br> ستون $name در جدول وجود ندارد");

			die("خطا! <br> ستون $name در جدول وجود ندارد");
		}
	}
	private function setCols($ListOfCols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// اگر جدول از قبل وجود ندارد ساخته می شود
		if (is_array($ListOfCols) && count($ListOfCols) > 0) {
			$newCols = $this->standardCols($ListOfCols);
			if ($newCols === false) {
				echo "نام ستون ها مشکل دارد" . "<br>" . "name=>[lbl=>,type=>]";
				exit();
			} else {

				$this->columns = $newCols;
			}
		} else {
		}
	}
	private function standardCols($ListOfCols = [], $checkAutoid = true)
	{
		$this->errors[] = "شروع " . __METHOD__;
		$colnameHasError = false;
		$types = SELF::colType;
		$newCols = [];
		if (is_array($ListOfCols) && count($ListOfCols) > 0) {

			foreach ($ListOfCols as $col => $detail) {
				// اگر آرایه بدون نام باشد
				if (is_numeric($col)) {
	// دو وضعیت دارد یا فقط اسم ستون هست و یا یک آرایه

	if (!is_array($detail)) {
		// اینجا زمانی اجرا می شود که فقط اسم ستون باشد
		if (isset($detail) && $detail != "") {
			// اگر نام ستون به تنهایی وارد شده باشد
			$newCols[$detail] = ["type" => $this->defaultType, "lbl" => $detail, "require" => false, "val" => "", "list" => []];
		} else {
			// نام ستون خالی باشد
			$colnameHasError = true;
		}
	} else {
		// یک آرایه ارسال شده
		if (isset($detail["name"])) {
			// اگر در آرایه نام ستون آورده شده باشد
			$newCols[$detail["name"]] = ["type" => $this->defaultType, "lbl" => $detail["name"], "require" => false, "val" => "", "list" => []];
			if (isset($detail["type"])) {
				// اگر در آرایه نوع هم مشخص شده باشد
				// و اگر نوع مشخص شده معتبر باشد
				if (isset($types[$detail["type"]])) {
					$newCols[$detail["name"]]["type"] = $detail["type"];
				}
			}
			if (isset($detail["lbl"])) {
				// اگر در آرایه برچسب ستون هم مشخص باشد
				$newCols[$detail["name"]]["lbl"] = $detail["lbl"];
			}
			if (isset($detail["require"])) {
				// اگر در آرایه ضرورت تکمیل هم مشخص باشد
				$newCols[$detail["name"]]["require"] = $detail["require"];
			}
			if (isset($detail["val"])) {
				// اگر در آرایه مقدار اولیه هم مشخص باشد
				$newCols[$detail["name"]]["val"] = $detail["val"];
			}
			if (isset($detail["list"]) && is_array($detail["list"])) {
				// اگر در آرایه لیست داده های ستون هم مشخص باشد
				$newCols[$detail["name"]]["list"] = $detail["list"];
			}
		} else {
			// اگر در آرایه نام مشخص نشده باشد
			$colnameHasError = true;
		}
	}
				} else {
	// اگر هر آرایه یک نام داشته باشد
	$newCols[$col] = ["type" => $this->defaultType, "lbl" => $col, "require" => false, "val" => "", "list" => []];
	if (is_array($detail)) {
		// اگر تایپ مشخص شده باشد
		if (isset($detail["type"])) {

			// اگر تایپ مشخص شده معتبر باشد
			if (isset($types[$detail["type"]])) {
				$newCols[$col]["type"] = $detail["type"];
			}
		}
		if (isset($detail["list"]) && is_array($detail["list"])) {
			// اگر در آرایه لیست داده های ستون هم مشخص باشد
			$newCols[$col]["list"] = $detail["list"];
		}
		if (isset($detail["require"])) {
			// اگر در آرایه ضرورت داده های ستون هم مشخص باشد
			$newCols[$col]["require"] = $detail["require"];
		}
		if (isset($detail["lbl"])) $newCols[$col]["lbl"] = $detail["lbl"];
		if (isset($detail["val"])) {
			// اگر در آرایه مقدار اولیه هم مشخص باشد
			$newCols[$col]["val"] = $detail["val"];
		}
	} else {
		// تشخیص دادن نوع اطلاعات ورودی در زمانی که بصورت کلید مقداری وارد شدن
		if (isset($types[$detail])) {
			// تلاش برای ثبت مقدار کلید به عنوان تایپ ستون
			// اگر تایپ مشخص شده معتبر باشد
			$newCols[$col]["type"] = $detail;
		} else {
			// مقدار برچسب وارد شده است
			$newCols[$col]["lbl"] = $detail;
		}
	}
				}
			}
		}
		if ($colnameHasError == true) {
			return false;
		} else {

			if (count($newCols)) {
				if ($checkAutoid == true) {
	$notAutoid = true;
	$firstCol = "";
	foreach ($newCols as $col => $detail) {
		if ($newCols[$col]['type'] == "autoid") {
			$notAutoid = false;
		}
		if ($firstCol == "") $firstCol = $col;
	}
	// اگر کد زیر اجرا شود یعنی ستون اتوایدی در داده ها وجود نداشته است 
	// پس ما یک ستون اتوایدی به آن اضافه می کنیم

	if ($notAutoid == true) {
		$newCols[$firstCol]["type"] = self::TYPE_AUTOID;
	}
				}
				return $newCols;
			} else {
				return false;
			}
		}
	}
	protected function createTable($deleteOtherCols = false, $deleteOldTable = false)
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع در دیتا بیس جدول مورد نیاز این شی را می سازد 
		// اگر جدول موجود نباشد آن را می سازد
		if ($deleteOldTable == true) {
			$sql = "DROP TABLE IF EXISTS`" . PREFIX . "_" . $this->TABLENAME . "`";
			//echo $sql;
			//mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn)."line:".__LINE__);
			mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
		}

		$sql = "";
		$PRIMARY_KEY = null;
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_LABLE) continue;
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == "autoid") {
				$PRIMARY_KEY = $col;
			}
			if ($sql != "") $sql = $sql . ',';
			$ColData = self::colType[$detail['type']];
			$row = "`" . $col . "` " . $ColData['type'] . ' ';
			if (isset($ColData['isnull']) && $ColData['isnull'] != "") {
				$row .= 'NOT NULL ';
			}
			if (isset($ColData['collate']) && $ColData['collate'] != "") {
				$row .= 'COLLATE ' . $ColData['collate'] . ' ';
			}
			if (isset($ColData['def']) && $ColData['def'] != "") {
				$row .= 'DEFAULT ' . $ColData['def'] . ' ';
			}
			if (isset($ColData['other']) && $ColData['other'] != "") {
				$row .= $ColData['other'] . ' ';
			}
			$sql = $sql . $row;
		}
		$sql = "CREATE TABLE IF NOT EXISTS `" . PREFIX . "_" . $this->TABLENAME . "` (" . $sql;
		if (isset($PRIMARY_KEY) && $PRIMARY_KEY != "") {
			$sql = $sql . ", PRIMARY KEY (`" . $PRIMARY_KEY . "`) ";
		}
		$sql = $sql . " ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;";
		//echo $sql."<br>";
		mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);


		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$ColData = self::colType[$detail['type']];
			$row = '`' . $col . '` ' . $ColData['type'] . ' ';
			if (isset($ColData['null']) && $ColData['null'] != "") {
				$row .= 'NOT NULL ';
			}
			if (isset($ColData['collate']) && $ColData['collate'] != "") {
				$row .= 'COLLATE ' . $ColData['collate'] . ' ';
			}
			if (isset($ColData['def']) && $ColData['def'] != "") {
				$row .= 'DEFAULT ' . $ColData['def'] . ' ';
			}
			if (isset($ColData['other']) && $ColData['other'] != "") {
				$row .= $ColData['other'] . ' ';
			}

			$sql = "SELECT * FROM information_schema.`COLUMNS` WHERE `TABLE_SCHEMA`='" . $this->DATABASE_NAME . "' and TABLE_NAME='" . PREFIX . "_" . $this->TABLENAME . "' and COLUMN_NAME='$col';";
			//echo "<br>".$sql."<br>";
			$result = mysqli_query($this->conn, $sql); //or $this->errorManger(mysqli_error($this->conn)."line:".__LINE__);
			//var_dump($result);
			$found = mysqli_num_rows($result);
			if ($found) {
				$sql = "ALTER TABLE `" . PREFIX . "_" . $this->TABLENAME . "` CHANGE `$col` $row;";
				//	echo "<br>".$sql."<br>";
				mysqli_query($this->conn, $sql);
			} else {
				$sql = "ALTER TABLE `" . PREFIX . "_" . $this->TABLENAME . "` ADD $row;";
				//echo "<br>".$sql."<br>";
				mysqli_query($this->conn, $sql); // or $this->errorManger(mysqli_error($this->conn)."line:".__LINE__);
			}
			mysqli_free_result($result);
		}
		if ($deleteOtherCols == true) {
			$sql = "SELECT * FROM information_schema.`COLUMNS` WHERE `TABLE_SCHEMA`='" . $this->DATABASE_NAME . "' and TABLE_NAME='" . PREFIX . "_" . $this->TABLENAME . "' ;";
			//echo "<br>".$sql."<br>";
			$result = mysqli_query($this->conn, $sql);
			//var_dump($result);
			$found = mysqli_num_rows($result);
			if ($found) {
				while ($row = mysqli_fetch_assoc($result)) {
	if (!isset($this->columns[$row['COLUMN_NAME']])) {
		$sql = "ALTER TABLE `" . PREFIX . "_" . $this->TABLENAME . "` DROP " . $row['COLUMN_NAME'] . ";";
		mysqli_query($this->conn, $sql);
	}
				}
			}
			mysqli_free_result($result);
		}
	}
	// باز سازی دیتابیس از اول همه اطلاعات قبلی حذف می شوند
	public function resetDataBase($ListOfCols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (is_array($ListOfCols) && count($ListOfCols) > 0) $this->setCols($ListOfCols);
		$this->createTable(false, true);
	}

	// بازسازی دیتا بیس، حذف داده های ستونهای حذف شده 
	public function updateDataBase($ListOfCols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (is_array($ListOfCols) && count($ListOfCols) > 0) $this->setCols($ListOfCols);
		$this->createTable(true, false);
	}

	// بازسازی دیتابیس با حفظ اطلاعات قبلی
	public function safeUpdateDataBase($ListOfCols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (is_array($ListOfCols) && count($ListOfCols) > 0) $this->setCols($ListOfCols);
		$this->createTable(false, false);
	}

	// تنظیمات کارخانه
	public function setDefaults()
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع مقادیر داخل شی را خالی می کند و مقادیر پیش فرض را درون آن قرار می دهد
		// ستون آیدی همیشه باید اولین خانه باشد و خانه های مربوط به زمان با همین نام های زیر باشد 
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			// برای ستون های عددی، مقدار 0 را در نظر می گیرد
			// برای ستونهای غیر عددی مقدار خالی "" را در نظر می گیرد
			if (isset($this->listOfCols[$col]["val"])) {
				$this->columns[$col]["val"] = $this->listOfCols[$col]["val"];
			} else {
				$this->columns[$col]["val"] = "";
				if ($detail['type'] == "autoid" || $detail['type'] == "id" || $detail['type'] == "boli" || $detail['type'] == "number" || $detail['type'] == "double") {
	$this->columns[$col]["val"] = 0;
				}
			}
		}
	}

	// گرفتن اطلاعات یک ردیف از دیتا بیس
	public function get($id = NULL)
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع یک ردیف از اطلاعات دیتا بیس را بر اساس آیدی آن استخراج می کند

		// اگر آیدی به تابع داده نشود آیدی خود شی به عنوان آیدیی که باید حستحو شود استفاده خواهد شد
		$new_id = (isset($id)) ? $id : $this->columns[$this->autoIdName]["val"];
		$new_id = (!(isset($new_id) && $new_id != "")) ? -1 : $new_id;
		// ساخت دستور 
		$sql = "SELECT *	FROM `" . PREFIX . "_" . $this->TABLENAME . "` WHERE `" . $this->autoIdName . "`='$new_id';";
		//echo $sql;	

		// دریافت نتایح
		// $this->errorManger مرگ کدها است
		$result = mysqli_query($this->conn, $sql);
		if (!$result) {
			$this->checkColumns();
			$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
		}
		// شمارش تعداد نتایج
		$found = mysqli_num_rows($result);

		// محل ذخیره نتیجه خروجی
		$res = [];

		if ($found) {
			// اگر نتیجه ای وجود داشته باشد
			// کد های زیر احرا می شود

			// دسترسی به صورت انجمنی به نتایح
			$res[] = mysqli_fetch_assoc($result);

			// قرار دادن نتایج جستجو در این شی
			$row2 = [];
			foreach ($res[0] as $key => $val) {
				$row2[$key] = html_entity_decode($val, ENT_QUOTES);
			}
			$res = $row2;
			$this->set($res);
		}
		mysqli_free_result($result);

		return $res;
	}

	// دریافت نام ستونهایی که ماهیت آنها فایل است
	public function getAllColTypeFile()
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون هایی که از نوع تصویر و فایل هستند رابر می گرداند
		// یک آرایه انجمنی از فایل و آدرس ها
		$names = [];
		foreach ($this->columns as $col => $detail) {
			if (($detail['type'] == "file" || $detail['type'] == "img")) {
				$names[$col] = $detail['val'];
			}
		}
		return $names;
	}

	// گرفتن اطلاعات یک ردیف از دیتا بیس براساس اطلاعات ستونهای خاص
	public function getByCols($cols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع یک ردیف از اطلاعات دیتا بیس را بر اساس ستون یا ستونهای خواسته شده استخراج می کند
		// و مقادیر متغیر های این شی را براساس آن پر می کند
		// محل ذخیره نتیجه خروجی
		$newCols = [];
		foreach ($cols as $col => $val) {

			if (isset($this->columns["$col"]['type'])) {
				if ($this->columns["$col"]['type'] == self::TYPE_HIDDEN) continue;
				if ($this->columns["$col"]['type'] == self::TYPE_LABLE) continue;
				$type = $this->columns["$col"]['type'];
				if (!($type == SELF::TYPE_TEXT200 || $type == SELF::TYPE_TEXT400 || $type == SELF::TYPE_TEXT || $type == SELF::TYPE_TEXT_RICH)) {
	$newCols["$col"] = $val;
				}
			}
		}
		$res = $this->search($newCols);
		if (count($res) >= 1) {
			$this->set($res[0]);
			return $res[0];
		} else {
			return [];
		}
	}

	// بازنشانی به تنظیمات کارخانه و ثبت مقادیر جدید
	public function set($associationData = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// داده های استخراج شده از دیتابیس به صورت یک آرایه
		// به این تابع داده می شود 
		// این تابع اطلاعات را بر اساس نام داده و مقدار آن در 
		// متغییر مربوط به این شی ذخیره می کند
		// یعنی شی فعال، تبدیل می شود به آنچه در دیتا بیس بوده است

		if (!is_array($associationData)) {
			return false;
		}
		// شرط بالا بررسی می کند که داده ورودی حتما از نوع آرایه باشد


		// خالی کردن این شی
		$this->setDefaults();

		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$this->columns[$col]["val"] = isset($associationData[$col]) ? $associationData[$col] : $this->columns[$col]["val"];
		}
		return true;
	}

	// ثبت مقادیر جدید بدون بازنشانی به تنظیمات کارخانه
	public function setForEdit($associationData = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نکته: تفاوت با قبلی در این است که اطلاعات پیشفرض ثبت نمی شود
		// داده های استخراج شده از دیتابیس به صورت یک آرایه
		// به این تابع داده می شود 
		// این تابع اطلاعات را بر اساس نام داده و مقدار آن در 
		// متغییر مربوط به این شی ذخیره می کند
		// یعنی شی فعال دچار تغییراتی می شود

		if (!is_array($associationData)) {
			return false;
		}
		// شرط بالا بررسی می کند که داده ورودی حتما از نوع آرایه باشد


		// خالی کردن این شی
		//$this->setDefaults();

		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$this->columns[$col]["val"] = isset($associationData[$col]) ? $associationData[$col] : $this->columns[$col]["val"];
		}
		return true;
	}

	// گرفت برچسب فارسی یک ستون بدون ساخت شی
	public function getColLable($colName)
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع نام فارسی ستون داده وارد شده را بر می گرداند
		if (isset($this->columns[$colName])) {
			return $this->columns[$colName]["lbl"];
		} else {
			return "";
		}
	}

	// دریافت نام فارسی با ساخت شی
	public function getLable($name)
	{
		$this->errors[] = "شروع " . __METHOD__;
		return self::getColLable($name);
	}
	// دریافت تمامی برچسب های فارسی
	public function getLabels()
	{
		$this->errors[] = "شروع " . __METHOD__;
		// برای دانستن نام ستون های داده که در این کلاس قرار دارند
		//این تابع نام ستون های انگلیسی را بصورت آرایه برمی گرداند
		$names = [];
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$names[$col] = $detail["lbl"];
		}
		return $names;
	}

	// دسافت نام انگلیسی ستونها
	public function getCols()
	{
		$this->errors[] = "شروع " . __METHOD__;
		// برای دانستن نام ستون های داده که در این کلاس قرار دارند
		//این تابع نام ستون های انگلیسی را بصورت آرایه برمی گرداند
		$names = [];
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$names[] = $col;
		}
		return $names;
	}

	// ردیافت نام انگلیسی اولین ستونی که خودکار افزایش می یابد
	private function getAutoIdName()
	{
		$this->errors[] = "شروع " . __METHOD__;
		foreach ($this->columns as $col => $detail) {
			if ($detail["type"] == "autoid") {
				$this->autoIdName = $col;
				return $col;
			}
		}
	}

	// ذخیره در دیتابیس
	public function insert()
	{
		$this->errors[] = "شروع " . __METHOD__;
		$count = count($this->columns);
		$i = 0;
		$data = "";
		$colNames = "";
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			// در این قسمت داده های وارد شده 
			// برای ساختن دستور اس کیو ال 
			// آنالیز می شوند و مرتب می گردند
			$i++;
			if ($detail["type"] == 'autoid') $autoIdName = $col;
			if ($detail["type"] != 'autoid' && $detail["type"] != 'timestamp' && $detail["type"] != 'last_timestamp') {

				// به جز سه ستون به نام های بالا بقیه ستون ها در دستور اینزرت ثبت می شوند
				// ستون های بالا توسط خود اس کیو ال جایگزین می شود
				if ($i <= $count && $colNames != "") {
	$colNames .= ' ,';
	//$colNames=$colNames.' ,';

	$data .= " ,";
				}
				$colNames .= '`' . $col . '`';
				$data .= "'" . htmlentities(trim($detail["val"]), ENT_QUOTES) . "'";
			}
		}
		// ساخت دستور
		$sql = "INSERT INTO `" . PREFIX . "_" . $this->TABLENAME . "` ($colNames ) VALUES ($data) ;";
		//echo $sql;
		// اجرای دستور
		// اگر دستور با خطا مواجه شود 
		// خط فرمان می میرد و کدها دیگر ادامه پیدا نمی کنند
		// به دلیل استفاده از دستور 
		// DIE()
		// بعد از شرط 
		// OR
		// یعنی یا صحیح اجرا می شود و یا می میرد
		$result = mysqli_query($this->conn, $sql);
		if (!$result) {
			$this->checkColumns();
			$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
		}
		//از طریق دستور
		//mysqli_insert_id
		// شماره آیدی آخرین ردیفی که در جدول وارد شده را برمی گرداند 
		// به عنوان آیدی شی ذخیره می کند
		$this->columns[$autoIdName]["val"] = mysqli_insert_id($this->conn);

		// در آخر این تابع آیدی شی فعال را بر می گرداند
		return $this->columns[$autoIdName]["val"];
	}

	// حذف از دیتابیس
	public function delete($id = NULL)
	{
		$this->errors[] = "شروع " . __METHOD__;
		$autoIdName = $this->autoIdName;
		// حذف یک ردیف از اطلاعات بر اساس آیدی داده شده

		// اگر آیدی به تابع داده نشود آیدی داده فعال جایگزین می شود
		$new_id = (isset($id)) ? $id : $this->columns[$autoIdName]["val"];
		$sql = "DELETE FROM `" . PREFIX . "_" . $this->TABLENAME . "` WHERE `" . $autoIdName . "`=$new_id;";
		//echo "<br>".$sql."<br>";
		$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);

		// اگر آیدی تحویل نشود یعنی داده ی فعال حذف شده پس
		// در کد زیر اطلاعات حافظه شی نیز به صورت پیش فرض در می آید تا اطلاعات شی نیز پاک شود
		if (!isset($id)) $this->setDefaults();

		// در آخر یک ترو برمی گرداند
		return true;
	}

	public function deleteWhere($strWhere = "0")
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (!isset($strWhere) || $strWhere == "") $strWhere = "0";
		// حذف همه اطلاعات بر اساس شرط داده شده

		$sql = "DELETE FROM `" . PREFIX . "_" . $this->TABLENAME . "` WHERE $strWhere ;";
		$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);

		// اگر آیدی تحویل نشود یعنی داده ی فعال حذف شده پس
		// در کد زیر اطلاعات حافظه شی نیز به صورت پیش فرض در می آید تا اطلاعات شی نیز پاک شود
		if (!isset($id)) $this->setDefaults();

		// در آخر یک ترو برمی گرداند
		return true;
	}

	// ویرایش در دیتابیس
	public function update($id = NULL)
	{
		$this->errors[] = "شروع " . __METHOD__;
		$autoIdName = $this->autoIdName;
		// اگر آیدی را به تابع ندهد به صورت زیر آن را پر می کند
		$new_id = (isset($id)) ? $id : $this->columns[$autoIdName]["val"];

		// شمارش تعداد عناصر آرایه
		$count = count($this->columns);

		// یه شمارش گر از صفر
		$i = 0;
		// داده هایی که باید ویرایش شوند
		$data = "";

		// بررسی داده های وارد شده برای ایجاد دستور اس کیو ال
		foreach ($this->columns as $col => $detail) {
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$i++;

			if ($detail["type"] != 'autoid' && $detail["type"] != 'timestamp' && $detail["type"] != 'last_timestamp') {
				// در ویرایش اطلاعات همه ستون حق ویرایش شدن دارند ولی سه ستون بالا نباید دستی تغییر کنند
				if ($i <= $count && $data != "") {
	$data .= " ,";
				}
				$data .= '`' . $col . '`=' . "'" . htmlentities(trim($detail["val"]), ENT_QUOTES) . "'";
			}
		}
		// ساخت دستور 
		$sql = "UPDATE `" . PREFIX . "_" . $this->TABLENAME . "` SET $data WHERE `" . $autoIdName . "`='" . $new_id . "';";
		//echo $sql;

		// اجرای دستور
		// اگر خطا داشته باشد کد ها متوقف می شوند 
		// به دلیل استفاده از دستور 
		// $this->errorManger
		// این دستور یعنی مرگ فرایند اجرای کد ها
		// که با دستور اصلی 
		// or 
		// شده است
		$result = mysqli_query($this->conn, $sql);
		if (!$result) {
			$this->checkColumns();
			$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
		}

		// در صورتی که کدها نمیرند این تابع یک مقدار ترو یا صحیح بر می گرداند
		return true;
	}
	public function errorManger($error){
		$this->safeUpdateDataBase();
		//die($error);
		// برای حفظ امنیت سایت دستور بالا غیر فعال شده است در زمان 
		// عیب یابی متوانید آن را فعال کنید
		die("<h3 class='alert alert-danger'>خطایی رخ داد لطفا دوباره تلاش کنید</h3>");
	}
	// ویرایش در دیتابیس
	public function updateWhere($colDataList, $where)
	{

		$this->errors[] = "شروع " . __METHOD__;
		if (!isset($colDataList) || !is_array($colDataList) || !isset($where) || ($where == "")) return false;
		// ورودی اول این تابع باید مثل زیر وارد شود
		// colDataList=["name"=>"hamid","fi","20",...];
		$autoIdName = $this->autoIdName;
		// اگر آیدی را به تابع ندهد به صورت زیر آن را پر می کند
		$new_id = (isset($id)) ? $id : $this->columns[$autoIdName]["val"];

		// شمارش تعداد عناصر آرایه
		$count = count($this->columns);

		// یه شمارش گر از صفر
		$i = 0;
		// داده هایی که باید ویرایش شوند
		$data = "";

		// بررسی داده های وارد شده برای ایجاد دستور اس کیو ال
		foreach ($this->columns as $col => $detail) {
			if (!array_key_exists($col, $colDataList)) continue;
			if ($detail['type'] == self::TYPE_HIDDEN) continue;
			if ($detail['type'] == self::TYPE_LABLE) continue;
			$i++;

			if ($detail["type"] != 'autoid' && $detail["type"] != 'timestamp' && $detail["type"] != 'last_timestamp') {
				// در ویرایش اطلاعات همه ستون حق ویرایش شدن دارند ولی سه ستون بالا نباید دستی تغییر کنند
				if ($i <= $count && $data != "") {
	$data .= " ,";
				}
				$data .= '`' . $col . '`=' . "'" . htmlentities(trim($colDataList[$col]), ENT_QUOTES) . "'";
			}
		}
		// ساخت دستور 
		$sql = "UPDATE `" . PREFIX . "_" . $this->TABLENAME . "` SET $data WHERE $where;";
		//echo $sql;

		// اجرای دستور
		// اگر خطا داشته باشد کد ها متوقف می شوند 
		// به دلیل استفاده از دستور 
		// $this->errorManger
		// این دستور یعنی مرگ فرایند اجرای کد ها
		// که با دستور اصلی 
		// or 
		// شده است
		$result = mysqli_query($this->conn, $sql);
		if (!$result) {
			$this->checkColumns();
			$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
		}

		// در صورتی که کدها نمیرند این تابع یک مقدار ترو یا صحیح بر می گرداند
		return true;
	}
	// جستجو در دیتابیس
	public function search($colsVals = [], $andor = 'and')
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون و شرط جستجو بصورت آرایه باید وارد شوندمثل این
		// ['colName'=>'<>2',...]
		// اگر علامات شرط وارد نشود جستجو بر اساس مساوی خواهد بود

		// ['colName'=>'=2'];

		$count = count($colsVals);
		$res = [];
		if (is_array($colsVals) && $count > 0) {

			$i = 0;
			$data = "";
			foreach ($colsVals as $col => $val) {
				if (!isset($this->columns[$col])) {
	// اگر در اسن ستون پرانتز باشد در دادهای اصلی پیدا نمی شود پس چک می کنیم که
	// اگر در اسم ستون از پرانتز استفاده نشده باشه
	// کدها ادامه پیدا نکنند
	if (!preg_match('/.*\(.*\).*/i', $col)) {
		continue;
	}
				}
				// استخراج اطلاعات از آرایه وارد شده به این تابع
				$i++;
				if ($i <= $count && $data != "") {
	// به صورت پیش فرض بین شرط ها 
	// and 
	// اضافه می شود
	// ولی کاربر می تواند 
	//or 
	// را جایگزین کند در ورودی تابع
	$data .= " " . $andor . " ";
				}

				// ، در این جا نوع شرط چک می شود اگر کاربر مخالف، بزرگتر، مساوی، کوچکتر ویا 
				// like
				// استفاده نکرده باشد علامت مساوی در نظر گرفته می شود


				// عبارات با قاعده
				if (preg_match('/(^=)|(^!=)/', $val) || preg_match('/(^<)|(^>)/', $val) || preg_match('/^is /i', $val) || preg_match('/^like/i', $val)) {

	// نوع شرط را در داده ها مشخص کرده اند
	// اگر در اسم ستون از پرانتز استفاده شده باشه
	if (preg_match('/.*\(.*\).*/i', $col)) {
		$data .= ' ' . $col . ' ' . $val;
	} else {
		$data .= ' `' . $col . '` ' . $val;
	}
				} else {
	// نوع شرط مساوی درنظر گرفته می شود
	if (preg_match('/.*\(.*\).*/i', $col)) {
		$data .= ' ' . $col . ' = ' . "'" . $val . "'";
	} else {
		$data .= ' `' . $col . '` = ' . "'" . $val . "'";
	}
				}
			}

			// ساخت دستور اس کیو ال
			$sql = "select * from `" . PREFIX . "_" . $this->TABLENAME . "` where $data ";

			//echo $sql;

			$columnNames = $this->getCols();
			// افزودن گروه بندی 
			// افزودن علامت ` به عنوان ستون ها 
			// چک کردن نام ستونها برای ایجاد درخواست
			if (is_array($this->sql_group_list) and count($this->sql_group_list) > 0) {
				$newSqlGroupList = [];
				foreach ($this->sql_group_list as $sg) {
	if (in_array($sg, $columnNames)) $newSqlGroupList[] = "`$sg`";
				}
				// اگر بعد از اعمال شرایط ستونی باشد دستور متناسب ایجاد می شود
				if (count($newSqlGroupList) > 0) $sql .= " GROUP BY " . implode(",", $newSqlGroupList) . " ";
			}

			// مرتب کردن نتایج
			// افزودن علامت ` به عنوان ستون ها 
			// افزودن نوع مرتب کردن نتایح به عنوان ستون ها
			// چک کردن نام ستونها برای ایجاد درخواست
			if (is_array($this->sql_order_list) and count($this->sql_order_list) > 0) {
				$newSqlOrderList = [];
				foreach ($this->sql_order_list as $so) {

	if (in_array($so, $columnNames)) $newSqlOrderList[] = "`$so` " . $this->sql_order_type;
				}

				// اگر بعد از اعمال شرایط ستونی باشد دستور متناسب ایجاد می شود
				if (count($newSqlOrderList) > 0) $sql .= " ORDER BY " . implode(",", $newSqlOrderList) . " ";
			}
			//echo $sql."<br>";
			$this->search_count_result = $this->pagination_count_result($sql . ";");
			$this->search_count_page = ($this->sql_limit_count > 0) ? ceil($this->search_count_result / $this->sql_limit_count) : 1;
			if ($this->sql_limit_page >= 0) $this->sql_limit_start = $this->sql_limit_count * $this->sql_limit_page;

			if ($this->sql_limit_start >= 0 and $this->sql_limit_count > 0) {
				$sql .= " limit {$this->sql_limit_start} , {$this->sql_limit_count}";
			}
			// بستن دستور sql
			$sql .= ";";

			// نمایش دستور ساخته شده
			//echo $sql."<br>";

			// اجرای دستور
			$result = mysqli_query($this->conn, $sql) or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__);
			// بررسی تعداد نتایج جستجو
			$found = mysqli_num_rows($result);
			if ($found) {

				// دسترسی به نتایج به صورت انجمنی یا همان کلید مقدار
				while ($row = mysqli_fetch_assoc($result)) {

	// ذخیره هر ردیف از نتایج در یک آزایه جدید
	$row2 = [];
	foreach ($row as $key => $val) {
		$row2[$key] = html_entity_decode($val, ENT_QUOTES);
	}
	$res[] = $row2;
				}
			}
			// آزاد سازی فضای حافظه استفاده شده برای نتایج جستجو
			mysqli_free_result($result);
		}
		// نتایج به صورت آرایه برگردانده می شود
		return $res;
	}
	public function searchLike($colsVals = [], $andor = "and")
	{

		$list = [];
		foreach ($colsVals as $col => $val) {
			$list[$col] = " like '%$val%' ";
		}
		return $this->search($list, $andor);
	}
	// آیا مقداری در دیتابیس وجود دارد
	public function isExist($id)
	{
		$this->errors[] = "شروع " . __METHOD__;
		// این تابع بررسی می کند که آیا یک داده وجود دارد یا نه
		$option = [$this->autoIdName => $id];
		// اگر آیدی در جستجو پیدا شود یعنی از قبل وجود دارد 
		return count($this->search($option));
	}

	// تنظیم دستورات لازم برای دریافت اطلاعات فرم ها
	// این قسمت همیشه باید قبل از نمایش فرم ها قرار داده شود
	public function SET_REQUEST_RECIVER($btnOption = [self::SHOW_LOGIN_BTN, self::SHOW_LOGOUT_BTN], $formId)
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (!isset($_REQUEST['hrjBaseformId'])) return false; // اگر اطلاعات ارسال نشده باشد
		if ($formId != $_REQUEST['hrjBaseformId']) return false; // اگر اطلاعات ارسالی مربوط به این فرم نباشد
		$hrjtoken = "counter" . $_SESSION["counter$formId"];
		if (!isset($_REQUEST["hrjtoken"])) return false; // اطلاعات ارسالی ناشناس هستند 
		if ($hrjtoken != SECURE::decoder($_REQUEST["hrjtoken"])) {
			echo "<h1 class='alert alert-danger'>خطا در توکن ارسالی</h1>";
			return false; // اطلاعات ارسالی تکراری هستند
		}
		$data = $this->getlistOfSendedData(); // دریافت اطلاعات ارسال شده توسط کاربر به صورت پست
		$newfiles = $this->getlistOfSendedFiles(); // دریافت اسم و مقدار ستونهایی از فایل که مقدار جدید دریافت کرده اند
		// مقادیری که باید توسط سیستم تنظیم شوند نه کاربر
		// ستونهایی که جنبه فایلی دارند نمی توانند مقدار ثابت بپذیرند
		foreach ($this->fixedColumns as $fixedCol => $fixedVal) {
			$data[$fixedCol] = $fixedVal;
		}
		$f = new FILES();
		if (isset($_REQUEST["selected_id"]) || isset($_REQUEST["id"])) {
			// اگر آیدی پست نشده باشد مقدار ارسالی به صورت گت جایگزین آن می شود
			$id = isset($_REQUEST["selected_id"]) ? $_REQUEST["selected_id"] : $_REQUEST["id"];
			if (!isset($_POST[$this->autoIdName])) $data[$this->autoIdName] = $id;
		}
		// بروز رسانی یا آپدیت می شود
		if (isset($_REQUEST['editData']) && in_array(self::SHOW_EDIT_BTN, $btnOption)) {
			// بروزرسانی داده موجود
			// اعمال داده های دریافتی به شی

			// دریافت اطلاعات قدیمی از دیتابیس با آیدی
			$this->get($data[$this->autoIdName]);

			// مقادیری که توسط سیستم تنظیم شده اند نباید ویرایش شوند
			foreach ($this->fixedColumns as $fixedCol => $fixedVal) {
				unset($data[$fixedCol]);
			}

			// حذف فایل های قدیمی که فایل جدید برای آن بارگذاری شده

			foreach ($newfiles as $col => $val) {
				$f->delete($this->$col);
			}
			// ذخیره اطلاعات جدید 
			$this->setForEdit($data);
			// ذخیره اطلاعات فایل های جدید
			$this->setForEdit($newfiles);

			$this->update();
			echo "<div class='alert alert-info mb-5 mt-5 ' role='alert'>داده ها با موفقیت بروزرسانی شدند</div>";
			return true;
		} elseif (isset($_REQUEST['saveNewData']) && in_array(self::SHOW_ADD_BTN, $btnOption)) {
			// ذخیره داده های جدید

			if ($data[$this->autoIdName] > 0) {
				// اگر اطلاعاتی از قبل انتخاب شده باشد
				// یعنی قصد کپی اطلاعات را داریم
				$this->get($data[$this->autoIdName]);
				// مقادیری که باید توسط سیستم تنظیم شوند نه کاربر
				// ستونهایی که جنبه فایلی دارند نمی توانند مقدار ثابت بپذیرند
				foreach ($this->fixedColumns as $fixedCol => $fixedVal) {
	$data[$fixedCol] = $fixedVal;
				}
				$this->setForEdit($data);
				// کپی کردن فایل های بارگذاری شده
				$colOfTypeFile = $this->getAllColTypeFile();
				foreach ($colOfTypeFile as $col => $address) {
	// اگر فایل جدید ارسال نشده باشد از فایل قدیمی استفاده می شود
	if (!isset($newfiles[$col])) $this->$col = $f->copyFile($address);
				}
				$this->setForEdit($newfiles);
			} else {

				$this->set($data);
				$this->setForEdit($newfiles);
			}

			$this->insert();
			echo "<div class='alert alert-info mb-5 mt-5' role='alert'>اطلاعات جدید ذخیره شد</div>";
			return true;
		} elseif (isset($_REQUEST['deleteData']) && in_array(self::SHOW_DELETE_BTN, $btnOption)) {
			$this->get($data[$this->autoIdName]);

			// حذف فایل های بارگذاری شده
			foreach ($this->getAllColTypeFile() as $col => $address) {
				$f->delete($address);
			}

			$this->delete();
			echo "<div class='alert alert-danger mb-5 mt-5' role='alert'>اطلاعات با موفقیت حذف شد</div>";
			return true;
		} elseif (isset($_REQUEST['copyData']) && in_array(self::SHOW_COPY_BTN, $btnOption)) {
			$this->get($data[$this->autoIdName]);
			// کپی کردن فایل های بارگذاری شده
			foreach ($this->getAllColTypeFile() as $col => $address) {
				$this->$col = $f->copyFile($address);
			}
			$this->insert();
			echo "<div class='alert alert-danger mb-5 mt-5' role='alert'>اطلاعات با موفقیت کپی شد</div>";
			return true;
		} elseif (isset($_REQUEST['signup']) && in_array(self::SHOW_SIGNUP_BTN, $btnOption)) {
			$this->set($data);
			$this->setForEdit($newfiles);
			$this->insert();
			echo "<div class='alert alert-success mb-5 mt-5' role='alert'>ثبت نام با موفقیت انجام شد</div>";
			return true;
		} elseif (isset($_REQUEST['login']) && in_array(self::SHOW_LOGIN_BTN, $btnOption)) {
			$this->set($data);
			$this->setForEdit($newfiles);
			return true;
		} elseif (isset($_REQUEST['logout']) && in_array(self::SHOW_LOGOUT_BTN, $btnOption)) {
			$this->set($data);
			$this->setForEdit($newfiles);
			return true;
		} elseif (isset($_REQUEST['checkData']) && in_array(self::SHOW_CHECK_BTN, $btnOption)) {
			$this->set($data);
			$this->setForEdit($newfiles);
			return true;
		} else {
			// نوع عملیات مشخص نیست
			return false;
		}
	}


	// تنظیم دستورات لازم برای دریافت اطلاعات فرم ها
	protected function getlistOfSendedData($cols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		$headers = (is_array($cols) && count($cols) > 0) ? $cols : $this->columns;
		$data = [];
		$editedCols = [];
		// اگر دستور ذخیره یا ویرایش صادر شود در این قسمت مدیریت خواهد شد
		if (isset($_REQUEST) && is_array($_REQUEST) && count($_REQUEST) > 0) {

			foreach ($headers as $head => $lable) {
				if ($this->columns[$head]['type'] == self::TYPE_LABLE) continue;
				if ($this->columns[$head]['type'] == self::TYPE_HIDDEN) continue;
				// دریافت داده هایی که باید در شی ثبت شوند
				if (isset($_POST[$head])) {
	if ($this->columns[$head]['type'] == self::TYPE_DATE) {
		// اصلاح تاریخ دریافتی بر اساس تاریخ صحیح
		$d = explode("/", $_POST[$head]);
		if (count($d) == 3) {
			$data[$head] = tr_num(jdate("Y/m/d", jmktime(0, 0, 0, $d[1], $d[2], $d[0])), "en");
		} else {
			if ($_POST[$head] != "") {
				$data[$head] = tr_num(jdate("Y/m/d"), "en");
			} else {
				$data[$head] = $_POST[$head];
			}
		}
	} elseif (
		$this->columns[$head]['type'] == self::TYPE_NUMBER ||
		$this->columns[$head]['type'] == self::TYPE_BOLEAN ||
		$this->columns[$head]['type'] == self::TYPE_DOUBLE ||
		$this->columns[$head]['type'] == self::TYPE_ID ||
		$this->columns[$head]['type'] == self::TYPE_RANGE ||
		$this->columns[$head]['type'] == self::TYPE_CODE
	) {
		if ($_POST[$head] == '') {
			$data[$head] = "0";
		} else {
			$data[$head] = $_POST[$head];
		}
	} else {
		$data[$head] = $_POST[$head];
	}



	// هنگامی که نوع ارسالی چک باکس باشد 
	// یک ورودی مخفی با نام ستون و مقدار 
	// checkbox
	// همراه بقیه ورودی ها ارسال می شود
	// وبرای تک تک چکباکس ها، نام ستون با یک اندرلاین به کلمه چک متصل می شود 
	// اگر چک باکس ارسال شده باشد تبدیل به رشته می شود
	if ($data[$head] == "checkbox") {
		$checks = [];
		foreach ($_POST as $recived => $val) {
			if (strstr($recived, "check_" . $head)) {
				$checks[] = $val;
			}
		}
		$data[$head] = implode("\n", $checks);
	}
				}
			}
		}
		return $data;
	}

	// تنظیم دستورات لازم برای دریافت فایل های ارسالی توسط فرم ها
	// همچنین بارگذاری فایل ها انجام می شود
	protected function getlistOfSendedFiles($cols = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		$headers = (is_array($cols) && count($cols) > 0) ? $cols : $this->columns;
		$data = [];
		$f = new FILES();
		// اگر دستور ذخیره یا ویرایش صادر شود در این قسمت مدیریت خواهد شد
		if (isset($_FILES) && is_array($_FILES) && count($_FILES) > 0) {

			foreach ($headers as $head => $lable) {
				// دریافت داده هایی که باید در شی ثبت شوند
				if (isset($_FILES[$head])) {

	$f->album = $head;
	// معرفی اسم اینپوت و نوع پسوند های مجاز
	if ($f->upload_file($head, $this->columns[$head]["list"])) {
		// ثبت اسم فایل بعد از بارگذاری
		$data[$head] = $f->fileName;
	} else {
		if ($this->columns[$head]["require"]) echo $f->showErrorMessage();
	}
				}
			}
		}
		return $data;
	}

	// نمایش نتایج جستجو به صورت جدول
	public function showTable($associationData = [], $associationLables = [], $onClickExtra = "", $btnOptions = [], $colToSelectOnClick = NULL)
	{


		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->getLabels();
		$headers = $this->standardCols($headers, false);
		$data = (is_array($associationData) && count($associationData)) ? 	$associationData : [];
		$secertList = ["pass", "secret", "password"];
		if (!count($data)) {
			echo "<div class='alert alert-info'>داده ای برای نمایش وجود ندارد</div>";
			return true;
		} ?>

		<?php
		$cols = $this->getCols();
		foreach ($headers as $col => $detail) {
			$listDetail = ["lbl", "type", "list", "val", "require"];
			$changeList = [];
			foreach ($listDetail as $dItem) {
				if (isset($associationLables[$col][$dItem])) $changeList = [$dItem];
			}
			if (in_array($col, $cols)) {

				// همه اطلاعات به جز برچسب به حالت اصلی تبدیل می شود
				$headers[$col] = $this->columns[$col];
				// اطلاعاتی که باید تغییر کنند ویرایش می شوند
				if (count($changeList) > 0) {
	foreach ($changeList as $dItem) {
		$headers[$col][$dItem] = $associationLables[$col][$dItem];
	}
				}
				// اگر برچسب به صورت کلید مقدار ثبت شده باشد
				if (isset($associationLables[$col]) && !is_array($associationLables[$col])) $headers[$col]['lbl'] = $associationLables[$col];
			}
		}
		?>

		<div class="table-responsive rounded mb-3 w-100 p-0 p-lg-1 bg-white position-relative" style="max-height: 70vh;">
			<table class="table table-sm table-striped table-hover table-light text-center">
				<thead class="sticky-top ">
	<tr>
		<?php foreach ($headers as $colName => $detail) { ?>
			<th>
				<div class="overflow-hidden" style="max-height: 8vh;"><small><?= $detail["lbl"] ?></small></div>
			</th>

		<?php } ?>
		<?php if (is_array($btnOptions) && count($btnOptions)) { ?>
			<th>عملیات</th>
		<?php } ?>
	</tr>
				</thead>
				<tbody>
	<?php
	foreach ($data as $row) {
	?>
		<?php
		if (
			(isset($_REQUEST['selected_id']) &&
			is_numeric($_REQUEST['selected_id']) &&
			$_REQUEST['selected_id'] === cleanData($_REQUEST['selected_id'])) ||
			(isset($_REQUEST['id']) &&
			is_numeric($_REQUEST['id']) &&
			$_REQUEST['id'] === cleanData($_REQUEST['id']))
		   ) {
			$selected_id = isset($_REQUEST['selected_id']) ? $_REQUEST['selected_id'] : $_REQUEST['id'];
		}

		$selected = (isset($selected_id) && $selected_id == $row[$this->autoIdName]) ? "table-active table-danger" : "";
		?>
		<?php if (in_array(self::SHOW_COPY_BTN, $btnOptions) || in_array(self::SHOW_DELETE_BTN, $btnOptions)) { ?>
			<tr id="<?= $row[$this->autoIdName] ?>" class="<?= $selected ?>">
			<?php	} else { ?>
				<!-- در هر ردیف یک رویداد کلیک تعریف شده که آیدی ردیف را به عنوان ورودی می پذیرد -->
				<?php $colToGetAsId = isset($colToSelectOnClick) ? $colToSelectOnClick : $this->autoIdName; ?>
			<tr id="<?= $row[$colToGetAsId] ?>" onClick="clickRow(this.id,'<?= $onClickExtra; ?>')" class="<?= $selected ?>">
			<?php	} ?>

			<?php foreach ($headers as $colName => $detail) { ?>
				<?php if (!in_array($this->columns[$colName]["type"], $secertList)) {
					$d = htmlentities($row[$colName]);
				} else {
					$d = "******";
				} ?>
				<td>
					<div class="overflow-hidden" style="max-height: 10vh;"><small><?= $d ?></small>
				</td>

			<?php } ?>
			<?php if (is_array($btnOptions) && count($btnOptions)) { ?>
				<td class=" text-nowrap ">
					<form>
		<input type="hidden" name="id" value="<?= $row[$this->autoIdName]; ?>">
		<?php if (in_array(self::SHOW_COPY_BTN, $btnOptions) || in_array(self::SHOW_DELETE_BTN, $btnOptions)) { ?>
			<button type="submit" name="selected_id" value="<?= $row[$this->autoIdName]; ?>" class="btn btn-sm btn-primary m-1">
<?= self::SHOW_SELECT_BTN ?>
			</button>
		<?php } ?>
		<?php if (in_array(self::SHOW_COPY_BTN, $btnOptions)) { ?>
			<button type="submit" name="copyData" class="btn btn-sm btn-primary m-1"><?= self::SHOW_COPY_BTN ?></button>
		<?php	} ?>
		<?php if (in_array(self::SHOW_DELETE_BTN, $btnOptions)) { ?>
			<button type="submit" name="deleteData" class="btn btn-sm btn-secondary m-1"><?= self::SHOW_DELETE_BTN ?></button>
		<?php	} ?>
					</form>

				</td>
			<?php } ?>
			</tr>
		<?php
	}
		?>
				</tbody>

			</table>

		</div>

		<!-- در این قسمت رویداد کلیک بررسی و اطلاعات لازم به صفحه جاری ارسال می شود -->
		<script>
			function clickRow(id, onclikExtra = "") {
				if (onclikExtra != "") {
	onclikExtra = "&" + onclikExtra;
				}
				window.location = "?selected_id=" + id + onclikExtra;
				//alert(id);
			}
		</script>
		<!-- اسکریپت مربوط به رویداد کلیک اینجا تمام شده است -->
	<?php
	}
	// ساخت فرم برای ثبت اطلاعات
	public function form($formId, $associationLables = [], $btnOption = [self::SHOW_ADD_BTN], $autofill = false)
	{
		$autocomplete = ($autofill === true) ? 'autocomplete="on"' : 'autocomplete="off"';
		$this->errors[] = "شروع " . __METHOD__;



		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		if (isset($associationLables) && $associationLables != "") {
			$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->columns;
		} else {
			$headers = [];
		}

		$headers = $this->standardCols($headers, false);
		if (isset($_SESSION["counter$formId"])) {
			$_SESSION["counter$formId"] = $_SESSION["counter$formId"] + 1;
		} else {
			$_SESSION["counter$formId"] = 1;
		}
		$hrjtoken = "counter" . $_SESSION["counter$formId"];
		//HELPER::putshowForSelectImageJsInPage();
		//HELPER::putshowForSelectFilesJsInPage();
		$cols = $this->getCols();

		HELPER::putSetColorForJsInPage(); 	?>
		<div class="w-100 p-1 m-0 ">
			<form class="row m-0 p-0 gap-3" id="hrrjForm<?= $formId ?>" method="post" <?= $autocomplete; ?> enctype="multipart/form-data" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
				<input type="hidden" name="hrjBaseformId" value="<?= $formId ?>">
				<?php foreach ($headers as $col => $detail) : ?>
	<?php

	$listDetail = ["lbl", "type", "list", "val", "require"]; // اطلاعاتی که چک می کنیم آیا در ورودی برای ما تغییر داده شده اند
	$changeList = [];
	foreach ($listDetail as $dItem) {
		if (isset($associationLables[$col][$dItem])) $changeList = [$dItem];
	}
	if (in_array($col, $cols)) {

		// همه اطلاعات به جز برچسب به حالت اصلی تبدیل می شود
		$headers[$col] = $this->columns[$col];
		// اطلاعاتی که باید تغییر کنند ویرایش می شوند
		if (count($changeList) > 0) {
			foreach ($changeList as $dItem) {
				$headers[$col][$dItem] = $associationLables[$col][$dItem];
			}
		}
		// اگر برچسب به صورت کلید مقدار ثبت شده باشد
		if (isset($associationLables[$col]) && !is_array($associationLables[$col])) $headers[$col]['lbl'] = $associationLables[$col];
	}

	?>
	<?php if (
		$headers[$col]["type"] != self::TYPE_AUTOID
		&& $headers[$col]["type"] != self::TYPE_HIDDEN
		&& $headers[$col]["type"] != self::TYPE_LABLE
	) {
		$class = "form-floating p-2 col-12 rounded shadow";
	} else {
		$class = "";
	} ?>
	<div class=" <?= $class; ?> ">
		<?php
		$val = "";
		if (isset($this->columns[$col])) {
			$val =	$this->$col;
		} else {
			$val = isset($associationLables[$col]['val']) ? $associationLables[$col]['val'] : '';
		}
		?>
		<?php $this->showColumn($col, $headers[$col], $val, $formId);	?>
	</div>
				<?php endforeach; ?>
				<input type="hidden" name="id" value="<?= $this->{$this->autoIdName}; ?>">
				<input type="hidden" name="hrjtoken" value="<?= SECURE::encoder($hrjtoken); ?>">
				<div class="">
	<?php $this->formBtns($formId, $btnOption); ?>
				</div>
			</form>
		</div>
	<?php
	}

	// ساخت فرم برای ثبت اطلاعات
	public function formSmall($formId, $associationLables = [], $btnOption = [self::SHOW_ADD_BTN], $autofill = false)
	{
		$this->errors[] = "شروع " . __METHOD__;
		$autocomplete = ($autofill === true) ? 'autocomplete="on"' : 'autocomplete="off"';


		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		if (isset($associationLables) && $associationLables != "") {
			$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->columns;
		} else {
			$headers = [];
		}

		$headers = $this->standardCols($headers, false);
		if (isset($_SESSION["counter$formId"])) {
			$_SESSION["counter$formId"] = $_SESSION["counter$formId"] + 1;
		} else {
			$_SESSION["counter$formId"] = 1;
		}
		$hrjtoken = "counter" . $_SESSION["counter$formId"];
		//HELPER::putshowForSelectImageJsInPage();
		//HELPER::putshowForSelectFilesJsInPage();
		$cols = $this->getCols();

		HELPER::putSetColorForJsInPage(); 	?>
		<div class="w-100 p-md-1 m-0 ">
			<form class="row m-0 p-0 " <?= $autocomplete; ?> id="hrrjForm<?= $formId ?>" method="post" enctype="multipart/form-data" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
				<input type="hidden" name="hrjBaseformId" value="<?= $formId ?>">
				<?php foreach ($headers as $col => $detail) : ?>
	<?php

	$listDetail = ["lbl", "type", "list", "val", "require"]; // اطلاعاتی که چک می کنیم آیا در ورودی برای ما تغییر داده شده اند
	$changeList = [];
	foreach ($listDetail as $dItem) {
		if (isset($associationLables[$col][$dItem])) $changeList = [$dItem];
	}
	if (in_array($col, $cols)) {

		// همه اطلاعات به جز برچسب به حالت اصلی تبدیل می شود
		$headers[$col] = $this->columns[$col];
		// اطلاعاتی که باید تغییر کنند ویرایش می شوند
		if (count($changeList) > 0) {
			foreach ($changeList as $dItem) {
				$headers[$col][$dItem] = $associationLables[$col][$dItem];
			}
		}
		// اگر برچسب به صورت کلید مقدار ثبت شده باشد
		if (isset($associationLables[$col]) && !is_array($associationLables[$col])) $headers[$col]['lbl'] = $associationLables[$col];
	}

	?>
	<?php if (
		$headers[$col]["type"] != SELF::TYPE_AUTOID
		&& $headers[$col]["type"] != self::TYPE_HIDDEN
		&& $headers[$col]["type"] != self::TYPE_LABLE
	) {
		$class = " form-floating col-md-12 ";
	} else {
		$class = "";
	} ?>
	<div class=" <?= $class; ?> ">
		<?php
		$val = "";
		if (isset($this->columns[$col])) {
			$val =	$this->$col;
		} else {
			$val = isset($associationLables[$col]['val']) ? $associationLables[$col]['val'] : '';
		}
		?>
		<?php $this->showColumn($col, $headers[$col], $val, $formId);	?>
	</div>
				<?php endforeach; ?>
				<input type="hidden" name="id" value="<?= $this->{$this->autoIdName}; ?>">
				<input type="hidden" name="hrjtoken" value="<?= SECURE::encoder($hrjtoken); ?>">
				<div class="">
	<?php $this->formBtns($formId, $btnOption); ?>
				</div>
			</form>
		</div>
	<?php
	}

	// ساخت فرم برای ثبت اطلاعات
	public function formInModal($formId, $associationLables = [], $btnOption = [self::SHOW_ADD_BTN], $btnLable = "ثبت/ویرایش", $autofill = false)
	{
		$autocomplete = ($autofill === true) ? 'autocomplete="on"' : 'autocomplete="off"';
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		if (isset($associationLables) && $associationLables != "") {
			$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->columns;
		} else {
			$headers = [];
		}
		$headers = $this->standardCols($headers, false);
		if (isset($_SESSION["counter$formId"])) {
			$_SESSION["counter$formId"] = $_SESSION["counter$formId"] + 1;
		} else {
			$_SESSION["counter$formId"] = 1;
		}
		$hrjtoken = "counter" . $_SESSION["counter$formId"];
		//HELPER::putshowForSelectImageJsInPage();
		//HELPER::putshowForSelectFilesJsInPage();
		//HELPER::putUploaderJsInPage();
		$cols = $this->getCols();
		HELPER::putSetColorForJsInPage(); 	?>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd<?= $formId ?>">
			<?= $btnLable; ?>
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModaladd<?= $formId ?>" tabindex="-1" aria-labelledby="exampleModaladd<?= $formId ?>Label" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-scrollable">
				<form method="post" <?= $autocomplete; ?> id="hrrjForm<?= $formId ?>" class="modal-content" enctype="multipart/form-data" action="<?= $_SERVER['SCRIPT_NAME'] ?>">


	<div class="modal-header">
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		<h1 class="modal-title fs-5" id="exampleModaladd<?= $formId ?>Label">مدیریت</h1>

	</div>
	<div class="modal-body ">
		<div class="row m-0 p-0 gap-3">
			<input type="hidden" name="hrjBaseformId" value="<?= $formId ?>">

			<?php
			foreach ($headers as $col => $detail) :
				$listDetail = ["lbl", "type", "list", "val", "require"];
				$changeList = [];
				foreach ($listDetail as $dItem) {

					if (isset($associationLables[$col][$dItem])) {
		$changeList[] = $dItem;
					}
				}

				if (in_array($col, $cols)) {

					// همه اطلاعات به جز برچسب به حالت اصلی تبدیل می شود
					$headers[$col] = $this->columns[$col];
					// اطلاعاتی که باید تغییر کنند ویرایش می شوند
					if (count($changeList) > 0) {
		foreach ($changeList as $dItem) {
			$headers[$col][$dItem] = $associationLables[$col][$dItem];
		}
					}
					// اگر برچسب به صورت کلید مقدار ثبت شده باشد
					if (isset($associationLables[$col]) && !is_array($associationLables[$col])) $headers[$col]['lbl'] = $associationLables[$col];
				}

			?>
				<?php if (
					$headers[$col]["type"] != SELF::TYPE_AUTOID
					&& $headers[$col]["type"] != self::TYPE_HIDDEN
					&& $headers[$col]["type"] != self::TYPE_LABLE
				) {
					$class = "form-floating p-2 col-12 rounded shadow";
				} else {
					$class = "";
				} ?>
				<div class=" <?= $class; ?> ">
					<?php //$val=isset($this->columns[$col])? $this->$col : ''; 
					?>
					<?php
					$val = "";
					if (isset($this->columns[$col])) {
		$val =	$this->$col;
					} else {
		$val = isset($associationLables[$col]['val']) ? $associationLables[$col]['val'] : '';
					}
					?>
					<?php $this->showColumn($col, $headers[$col], $val, $formId);	?>
				</div>

			<?php endforeach; ?>
			<input type="hidden" name="id" value="<?= $this->{$this->autoIdName}; ?>">
			<input type="hidden" name="hrjtoken" value="<?= SECURE::encoder($hrjtoken); ?>">

		</div>
	</div>
	<div class="modal-footer">
		<?php $this->formBtns($formId, $btnOption); ?>
	</div>


				</form>
			</div>
		</div>


	<?php
	}

	// ساخت فرم برای ثبت اطلاعات
	public function formByFixedButton($formId, $associationLables = [], $btnOption = [self::SHOW_ADD_BTN], $autofill = false)
	{
		$autocomplete = ($autofill === true) ? 'autocomplete="on"' : 'autocomplete="off"';
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		if (isset($associationLables) && $associationLables != "") {
			$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->columns;
		} else {
			$headers = [];
		}
		$headers = $this->standardCols($headers, false);

		if (isset($_SESSION["counter$formId"])) {
			$_SESSION["counter$formId"] = $_SESSION["counter$formId"] + 1;
		} else {
			$_SESSION["counter$formId"] = 1;
		}
		$hrjtoken = "counter" . $_SESSION["counter$formId"];

		$cols = $this->getCols();
		HELPER::putSetColorForJsInPage(); 	?>

		<form method="post" <?= $autocomplete; ?> id="hrrjForm<?= $formId ?>" class="position-relative" enctype="multipart/form-data" action="<?= $_SERVER['SCRIPT_NAME'] ?>">

			<div class="modal-body">
				<div class="row m-0 p-0 gap-3">
	<input type="hidden" name="hrjBaseformId" value="<?= $formId ?>">
	<?php foreach ($headers as $col => $detail) : ?>
		<?php

		$listDetail = ["lbl", "type", "list", "val", "require"];
		$changeList = [];
		foreach ($listDetail as $dItem) {
			if (isset($associationLables[$col][$dItem])) $changeList = [$dItem];
		}
		if (in_array($col, $cols)) {

			// همه اطلاعات به جز برچسب به حالت اصلی تبدیل می شود
			$headers[$col] = $this->columns[$col];
			// اطلاعاتی که باید تغییر کنند ویرایش می شوند
			if (count($changeList) > 0) {
				foreach ($changeList as $dItem) {
					$headers[$col][$dItem] = $associationLables[$col][$dItem];
				}
			}
			// اگر برچسب به صورت کلید مقدار ثبت شده باشد
			if (isset($associationLables[$col]) && !is_array($associationLables[$col])) $headers[$col]['lbl'] = $associationLables[$col];
		}

		?>
		<?php if (
			$headers[$col]["type"] != self::TYPE_AUTOID
			&& $headers[$col]["type"] != self::TYPE_HIDDEN
			&& $headers[$col]["type"] != self::TYPE_LABLE
		) { ?>
			<div class="form-floating p-2 col-12 rounded shadow">
			<?php } else { ?>
				<div class="">
				<?php } ?>
				<?php //$val=isset($this->columns[$col])? $this->$col : ''; 
				?>
				<?php
				$val = "";
				if (isset($this->columns[$col])) {
					$val =	$this->$col;
				} else {
					$val = isset($associationLables[$col]['val']) ? $associationLables[$col]['val'] : '';
				}
				?>
				<?php $this->showColumn($col, $headers[$col], $val, $formId);	?>
				</div>
			<?php endforeach; ?>
			<input type="hidden" name="id" value="<?= $this->{$this->autoIdName}; ?>">
			<input type="hidden" name="hrjtoken" value="<?= SECURE::encoder($hrjtoken); ?>">
			</div>
				</div>
				<div class="sticky-bottom bg-white p-1 border border-2 border-info mt-2 mb-1 rounded ">
	<?php $this->formBtns($formId, $btnOption); ?>
				</div>
		</form>
	<?php
	}

	public function formBtns($formId, $btnList = [])
	{
		if (count($btnList) == 1) {
			$color = " btn-outline-success ";
		} else {
			$color = "";
		}	?>

		<div class="col-12">
			<?php
			//echo $this->{$this->autoIdName};
			if (in_array(self::SHOW_EDIT_BTN, $btnList) && ($this->{$this->autoIdName} > 0)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="editData" class="btn <?= $color ?> ms-1"><?= self::SHOW_EDIT_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_ADD_BTN, $btnList)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="saveNewData" class="btn <?= $color ?> ms-1"><?= self::SHOW_ADD_BTN ?></button>
			<?php	} ?>





			<?php if (in_array(self::SHOW_DELETE_BTN, $btnList) && ($this->{$this->autoIdName} > 0)) { ?>

				<button type="submit" form="hrrjForm<?= $formId ?>" name="deleteData" id="deleteBtn<?= $formId; ?>" class="d-none"></button>
				<button type="button" form="hrrjForm<?= $formId ?>" onClick="beforeDelete('deleteBtn<?= $formId; ?>')" class="btn <?= $color ?> ms-1"><?= self::SHOW_DELETE_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_CHECK_BTN, $btnList)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="checkData" class="btn btn-success ms-1"><?= self::SHOW_CHECK_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_LOGIN_BTN, $btnList)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="login" class="btn btn-success ms-1"><?= self::SHOW_LOGIN_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_LOGOUT_BTN, $btnList)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="logout" class="btn btn-danger rounded-pill ms-1"><?= self::SHOW_LOGOUT_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_SIGNUP_BTN, $btnList)) { ?>
				<button type="submit" form="hrrjForm<?= $formId ?>" name="signup" class="btn btn-success ms-1"><?= self::SHOW_SIGNUP_BTN ?></button>
			<?php	} ?>
			<?php if (in_array(self::SHOW_CLOSE_BTN, $btnList)) { ?>
				<button type="button" form="hrrjForm<?= $formId ?>" class="btn <?= $color ?>" data-bs-dismiss="modal" aria-label="Close"><?= self::SHOW_CLOSE_BTN ?></button>

			<?php	} ?>
		</div>
		<?php
	}

	// نمایش اطلاعات هر ستون
	private function showColumn($colName, $detail = [], $colVal = NULL, $id = "", $extraAttribut = "")
	{
		$this->errors[] = "شروع " . __METHOD__;
		$id = isset($id) ? $id : "";
		$colVal = isset($colVal) ? html_entity_decode($colVal) : html_entity_decode($this->columns[$colName]["val"]);
		$colLable = (isset($detail['lbl']) && $detail['lbl'] != "") ? $detail['lbl'] : $this->columns[$colName]["lbl"];
		$require = isset($detail['require']) ? $detail['require'] : $this->columns[$colName]["require"];
		$type = (isset($detail['type']) && $detail['type'] != "") ? $detail['type'] : $this->columns[$colName]["type"];
		$list = (isset($detail['list']) && $detail['list'] != "") ? $detail['list'] : $this->columns[$colName]["list"];

		if ($require == true) {
			$require = "required";
		} else {
			$require = "";
		}

		$optValList = [];
		$optLblList = [];
		if (isset($list['val']) && isset($list['lbl'])) { // این جا چک می کنیم که آیا لیست، خود آرایه در آرایه است یا نه
			$optValList = $list['val'];
			$optLblList = $list['lbl'];
		} else {
			$optValList = $list;
			$optLblList = $list;
		}

		switch ($type) {
			case "autoid":
		?>
				<input type="hidden" name="<?= $this->autoIdName ?>" class="form-control-plaintext" value="<?php if (isset($colVal)) echo $colVal; ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>">

			<?php
				break;
			case "hidden":
			?>
				<input autocomplete="off" type="hidden" <?= $extraAttribut; ?> class="form-control" name="<?= $colName ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<?php
				break;
			case "lable":
				if (isset($colVal) && $colVal != "" && $colVal != $colLable) :
				?> <div><?= $colLable; ?>: <?= $colVal; ?></div><?php
				else :
	?> <div><?= $colLable ?></div><?php

				endif;
				break;
			case "timestamp":
			case "last_timestamp":
	?>
				<span class="p-2"><?= $colLable ?>:<?php if (isset($colVal) && $colVal != "") { ?> <?= jdate("در تاریخ Y/m/d و در ساعت H:i:s", strtotime($colVal)); ?><?php } ?></span>

			<?php
				break;
			case "password":
			case "pass":
			?>
				<input autocomplete="off" type="password" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9 a-z A-Z ]{6,}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?> <small class="text-success">6 کارکتر به بالا</small>
	<?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?>
				</label>

			<?php
				break;
			case "secret":
				// جایی که می خواهیم متن نمایش داده نشود
			?>


				<input autocomplete="off" type="password" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^.{6,}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?> <small class="text-success">6 کارکتر به بالا</small>
	<?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?>
				</label>

			<?php
				break;

			case "tel":
			?>

				<input autocomplete="off" type="tel" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^09[0-9]{9}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "file":
			case "img":
				$images = ['jpg', 'jpeg', 'png'];
				$extensions = (is_array($list) && count($list)) ? $list : $images;
			?>

				<label class="d-float float-start p-1 text-black-50"><?= $colLable; ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

				حجم مجاز: <span class="text-info">2m</span><br>
				پسوند های مجاز: <span class="text-info"><?php foreach ($extensions as $ext) {
	echo ' ' . $ext . ' ';
				} ?></span>
				<input type="button" class="btn btn-secondary" value="انتخاب فایل" onClick="selectFile('<?= $id . __CLASS__ . "form" . $colName ?>')">




				<input class="d-none" <?= $extraAttribut; ?> <?= $require; ?> type="file" onchange="checkHajmeFile(this)" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>">
				<script>
	function selectFile(id) {
		document.getElementById(id).click();
	}

	function checkHajmeFile(obj) {
		if (obj.files[0].size > 2000000) {
			alert("حجم فایل انتخابی بیشتر از 2 مگا بایت است");
			obj.files = undefined;
			obj.value = "";
		}
	}
				</script>

				<?php if (isset($colVal) && $colVal != '') { ?>
	<?php $path = pathinfo($colVal); ?>
	<?php if (in_array($path['extension'], $images)) { ?>
		<a class="btn btn-outline-info " target="_blank" href="<?= $colVal; ?>" download="file.<?= $path['extension'] ?>">
			دانلود<img class="rounded bg-body" style="max-height: 100px; max-width: 100%;" src="<?= $colVal; ?>" alt="<?= $colLable ?>">
		</a>
	<?php	} else { ?>
		<a class="btn btn-outline-secondary " target="_blank" href="<?= $colVal; ?>" download="file.<?= $path['extension'] ?>">دانلود</a>
	<?php	} ?>

				<?php }	?>

			<?php break;
			case "range":
				$min = (isset($list[0]) && is_numeric($list[0])) ? $list[0] : 0;
				$max = (isset($list[1]) && is_numeric($list[1])) ? $list[1] : 100;
				$step = (isset($list[2]) && is_numeric($list[2])) ? $list[2] : 1;
				$avg = ($max + $min) / 2;
			?>


				<input type="range" <?= $extraAttribut; ?> <?= $require; ?> class="form-range" step="<?= $step; ?>" min="<?= $min; ?>" max="<?= $max; ?>" value="<?php if (isset($colVal) && $colVal != "") echo $colVal;
	else echo $avg; ?>" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label class="text-secondary" for="<?= $id . __CLASS__ . "form" . $colName ?>" class=""><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "meli":
			?>

				<input autocomplete="off" type="tel" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]{10,}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "code":
			?>

				<input autocomplete="off" type="tel" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]+$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "number":
				$min = (isset($list[0]) && is_numeric($list[0])) ? $list[0] : "";
				$max = (isset($list[1]) && is_numeric($list[1])) ? $list[1] : "";
			?>

				<input autocomplete="off" type="number" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" min="<?= $min; ?>" max="<?= $max; ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]{1,}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "time":
			?>
				<?php $his = ["", "", ""];
				if (isset($colVal) && $colVal != "") {
	$his = explode(":", $colVal);
	//var_dump($his);
				} ?>
				<div class="btn-group text-nowrap mt-3">
	<div class="input-group" dir="ltr" class="ms-1">
		<label class="input-group-text ms-1" for="<?= 'time3' . $id . __CLASS__ . "form" . $colName ?>">ثانیه</label>
		<input autocomplete="off" type="number" value="<?= $his[2]; ?>" class="form-control " <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,2}$" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="0" max="59" id="<?= 'time3' . $id . __CLASS__ . "form" . $colName ?>" onchange="checkSaat('s',this)">

	</div>
	<div class="input-group" dir="ltr" class="ms-1">
		<label class="input-group-text ms-1" for="<?= 'time2' . $id . __CLASS__ . "form" . $colName ?>">دقیقه</label>
		<input autocomplete="off" type="number" value="<?= $his[1]; ?>" class="form-control" <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,2}$" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="0" max="59" id="<?= 'time2' . $id . __CLASS__ . "form" . $colName ?>" onchange="checkSaat('i',this)">
	</div>

	<div class="input-group" dir="ltr" class="ms-1">
		<label class="input-group-text ms-1" for="<?= 'time1' . $id . __CLASS__ . "form" . $colName ?>">ساعت</label>
		<input autocomplete="off" type="number" value="<?= $his[0]; ?>" class="form-control" <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,2}$" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="0" max="23" id="<?= 'time1' . $id . __CLASS__ . "form" . $colName ?>" onchange="checkSaat('h',this)">
	</div>

				</div>
				<input autocomplete="off" type="text" <?= $extraAttribut; ?> <?= $require; ?> class="input-group-text m-1" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]{1,2}:[0-9]{1,2}:[0-9]{1,2}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "date":
			?>
				<?php $ymd = ["", "", ""];
				if (isset($colVal) && $colVal != "") {
	$ymd = explode("/", $colVal);
	//var_dump($his);
				} ?>
				<div class="row m-0 p-0 w-100 mt-5 ">
	<div class="row m-0 p-0 col-3" dir="ltr">
		<label class="rounded-top border text-center" for="<?= 'date1' . $id . __CLASS__ . "form" . $colName ?>">روز</label>
		<input autocomplete="off" type="number" value="<?= $ymd[2]; ?>" class="w-100 border rounded-bottom " <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,2}$" id="<?= 'date1' . $id . __CLASS__ . "form" . $colName ?>" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="1" max="31" onchange="checkTarikh('d',this)">
	</div>
	<div class="row m-0 p-0 col-3" dir="ltr">
		<label class="rounded-top border text-center" for="<?= 'date2' . $id . __CLASS__ . "form" . $colName ?>">ماه</label>
		<input autocomplete="off" type="number" value="<?= $ymd[1]; ?>" class="w-100 border rounded-bottom " <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,2}$" id="<?= 'date2' . $id . __CLASS__ . "form" . $colName ?>" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="1" max="12" onchange="checkTarikh('m',this)">
	</div>

	<div class="row m-0 p-0 col-6" dir="ltr">
		<label class="rounded-top border text-center" for="<?= 'date3' . $id . __CLASS__ . "form" . $colName ?>">سال</label>
		<input autocomplete="off" type="number" value="<?= $ymd[0]; ?>" class="w-100 border rounded-bottom " <?= $extraAttribut; ?> <?= $require; ?> pattern="^[0-9]{1,4}$" id="<?= 'date3' . $id . __CLASS__ . "form" . $colName ?>" name="<?= $id . __CLASS__ . "form" . $colName ?>" min="1300" max="9999" onchange="checkTarikh('y',this)">
	</div>
	<div class="col-12">
		<input autocomplete="off" type="text" <?= $extraAttribut; ?> <?= $require; ?> class="input-group-text m-1" style="max-width: 100%;" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]{1,4}\/[0-9]{1,2}\/[0-9]{1,2}$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
	</div>
				</div>

				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "double":
				$min = (isset($list[0]) && is_numeric($list[0])) ? $list[0] : "";
				$max = (isset($list[1]) && is_numeric($list[1])) ? $list[1] : "";
			?>

				<input autocomplete="off" type="tel" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" min="<?= $min; ?>" max="<?= $max; ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[0-9]+\.?[0-9]+$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "email":
			?>

				<input autocomplete="off" type="text" <?= $extraAttribut; ?> <?= $require; ?> maxlength="200" class="form-control" value="<?php if (isset($colVal)) echo $colVal; ?>" pattern="^[a-z A-Z]+[a-z A-Z 0-9 \.]*@{1}[a-z A-Z 0-9 \.]+\.{1}.*$" name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;

			case "select":
			?>

				<select class="form-select" <?= $extraAttribut; ?> <?= $require; ?> name="<?= $colName ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" aria-label="Floating label select example">

	<?php if (!(isset($require) && $require != "")) echo "<option></option>"; ?>
	<?php
				foreach ($optValList as $count => $optVal) { ?>
		<option value="<?= $optVal ?>" <?php if (isset($colVal) && $colVal == $optVal) echo "selected"; ?>><?= $optLblList[$count]; ?></option>
	<?php
				}
	?>
				</select>
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "radio":
			?>

				<label class="text-muted p-2 me-5"><small><?= $colLable; ?></small><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>
				<br>
				<?php foreach ($optValList as $count => $optVal) { ?>
	<div class="form-check form-check-inline m-1">
		<input class="form-check-input" <?= $extraAttribut; ?> <?= $require; ?> type="radio" name="<?= $colName ?>" value="<?= $optVal; ?>" id="<?= $id . __CLASS__ . "formradio" . $colName . $count ?>" <?php if (isset($colVal) && $colVal == $optVal) echo "checked"; ?>>
		<label class="form-check-label" for="<?= $id . __CLASS__ . "formradio" . $colName . $count ?>">
			<?= $optLblList[$count]; ?>

		</label>
	</div>
				<?php 	} ?>

			<?php
				break;
			case "checkbox":
				// هنگامی که نوع ارسالی چک باکس باشد 
				// یک ورودی مخفی با نام ستون و مقدار 
				// checkbox
				// همراه بقیه ورودی ها ارسال می شود
				// وبرای تک تک چکباکس ها، نام ستون با یک اندرلاین به کلمه چک متصل می شود 
				if (isset($colVal)) {
	$checks = explode("\n", $colVal);
				} else {
	$checks = [];
				}
			?>

				<input type="hidden" name="<?= $colName; ?>" value="checkbox">
				<label class="text-muted p-2 me-5"><small><?= $colLable; ?></small><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>
				<br>
				<?php
				foreach ($optValList as $count => $optVal) {
				?>
	<div class="form-check form-switch form-check-inline m-1" dir="rtl">
		<label class="form-check-label" for="<?= $id . __CLASS__ . "formcheckbox" . $colName . $count; ?>"><?= $optLblList[$count]; ?></label>
		<input class="form-check-input" <?= $extraAttribut; ?> name="check_<?= $colName; ?>_<?= $count; ?>" value="<?= $optVal; ?>" <?php if (isset($colVal) && in_array($optVal, $checks)) echo "checked"; ?> type="checkbox" role="switch" id="<?= $id . __CLASS__ . "formcheckbox" . $colName . $count; ?>">
	</div>
				<?php } ?>




			<?php
				break;
			case "text200":
			case "text400":
				// بدست آوردن عدد تکست
				$a = explode("text", $type);
				$leng = $a[1];

				$height = ($leng / 4) . "px";
			?>

				<textarea <?= $extraAttribut; ?> style="min-height: <?= $height; ?>;" maxlength="<?= $leng; ?>" name="<?= $colName ?>" <?= $require; ?> class="form-control" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable . "(" . $leng . ")"; ?>"><?php if (isset($colVal)) echo $colVal; ?></textarea>
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable . "(" . $leng . ")"; ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "text":
			?>

				<textarea <?= $extraAttribut; ?> style="min-height: 150px;" name="<?= $colName ?>" <?= $require; ?> class="form-control" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>"><?php if (isset($colVal)) echo $colVal; ?></textarea>
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			case "text10":
			case "text20":
			case "text30":
			case "text40":
			case "text50":
			case "text100":
				$a = explode("text", $type);
				$leng = $a[1];
			?>

				<input autocomplete="off" type="text" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" maxlength="<?= $leng; ?>" name="<?= $colName ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable . "(" . $leng . ")"; ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable; ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;

			case "text_rich":
			?>

				<textarea <?= $extraAttribut; ?> style="min-height: 150px;" name="<?= $colName ?>" <?= $require; ?> class="form-control selectImageDest" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>"><?php if (isset($colVal)) echo $colVal; ?></textarea>
				<div class="input-group" dir="ltr" id="linkAdder<?= $id . __CLASS__ . "form" . $colName ?>">
	<button type="button" onClick="addLinkTo('<?= $id . __CLASS__ . "form" . $colName ?>')" class="btn btn-outline-dark"><img src="src/site_images/add.png" height="25px" class="rounded-circle"> افزودن</button>
	<select class="form-select">
		<option value="">ساده</option>
		<option value="btn">دکمه </option>
		<option value="btn btn-primary">دکمه آبی </option>
		<option value="btn btn-secondary">دکمه خاکستری </option>
		<option value="btn btn-warning">دکمه نارنجی </option>
		<option value="btn btn-danger">دکمه قرمز </option>
		<option value="btn btn-info">دکمه آبی روشن </option>
		<option value="btn btn-success">دکمه سبز </option>
		<option value="btn btn-dark">دکمه سیاه </option>
		<option value="btn btn-light">دکمه روشن </option>
	</select>
	<input type="text" class="linkName form-control" placeholder="برچسب">
	<input type="text" class="linkHref form-control" placeholder="ادرس لینک">

				</div>
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>
				<?php FILES_VIEW::showPicturesUploder($id . __CLASS__ . "form" . $colName, "افزودن تصویر به متن"); ?>


				<script>
	// Replace the <textarea id="editor1"> with a CKEditor 4
	// instance, using default configuration.
	CKEDITOR.replace('<?= $id . __CLASS__ . "form" . $colName ?>', {
		language: 'fa',
		//customConfig: '/ckeditor/minConfig2.js'
		// اسم تنظیماتی را که نیاز دارید از مثالها پیدا کنید و اینجا اضافه کنید
		toolbarGroups: [{
				"name": "document",
				"groups": ["mode"]
			},
			{
				"name": "basicstyles",
				"groups": ["basicstyles", "list", "blocks", "align", "colors", "links", "styles", "insert"]
			}
			/*,
 {
 "name": "links",
 "groups": []
 },
 {
 "name": "paragraph",
 "groups": []
 },
 
 {
 "name": "insert",
 "groups": []
 },
 {
 "name": "styles",
 "groups": []
 }
 ,
 {
 "name": "colors",
 "groups": ["colors"]
 } */
		],
		removeButtons: 'Anchor,Styles,Specialchar,PasteFromWord,Flash,Smiley,SpecialChar,Iframe,Save'
	});
				</script>

			<?php


				break;
			case "album":
				$list = [];
				if (isset($colVal)) $list = explode("\n", $colVal);
			?>

				<small class="top-50 start-50 text-danger"><?= $colLable ?></small><br>
				<small>تصاویر را با موس جابجا کنید و برای حذف روی ان کلیک کنید</small><br>
				<div <?= $extraAttribut; ?> id="<?= $id . __CLASS__ . "form" . $colName ?>" class="col gap-5" dir="ltr" onClick="getPicsFromDiv(this.id,'<?= $colName ?>')">
	<?php foreach ($list as $item) { ?>
		<?php if (trim($item) != "") { ?>
			<img src="<?= $item ?>" name="<?= $item ?>" class="grid-square p-1 bg-body rounded shadow m-1" height="50px" style="max-width: 50%;">
		<?php } ?>

	<?php } ?>


				</div>
				<script>
	new Sortable(<?= $id . __CLASS__ . "form" . $colName ?>, {
		group: {
			name: 'shared',
			pull: 'clone' // To clone: set pull to 'clone'
		},
		swapThreshold: 0.85,
		ghostClass: 'blue-background-class',
		animation: 0,
		onEnd: function(evt) {
			var itemEl = evt.item; // dragged HTMLElement
			evt.to; // target list
			evt.from; // previous list
			evt.oldIndex; // element's old index within old parent
			evt.newIndex; // element's new index within new parent
			evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
			evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
			evt.clone // the clone element
			evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
			itemEl.parentNode.click();
		}
	});
	setOnClick("<?= $id . __CLASS__ . "form" . $colName ?>");
	document.getElementById("<?= $id . __CLASS__ . "form" . $colName ?>").click();
				</script>


				<?php

				FILES_VIEW::showPicturesUploder($id . __CLASS__ . "form" . $colName, "افزودن به $colLable");
				?>

			<?php
				break;
			case "bigfile":
				$list = [];
				if (isset($colVal)) $list = explode("\n", $colVal);
			?>

				<small class="top-50 start-50 text-danger"><?= $colLable ?></small><br>
				<small>فایل را با موس جابجا کنید و برای حذف روی ان کلیک کنید</small><br>
				<div <?= $extraAttribut; ?> id="<?= $id . __CLASS__ . "form" . $colName ?>" class=" sortable col gap-5" dir="ltr" onClick="getFilesFromDiv(this.id,'<?= $colName ?>')">
	<?php foreach ($list as $item) { ?>
		<?php if (trim($item) != "") { ?>
			<span id="<?= $item ?>" name="<?= $item ?>" class="btn btn-sm bg-info m-1">
				<?= $item ?>
			</span>
		<?php } ?>

	<?php } ?>


				</div>
				<script>
	setClassAsSortable2();
	setOnFileClick('<?= $id . __CLASS__ . "form" . $colName ?>');
				</script>


				<?php

				FILES_VIEW::showBigfileUploder($id . __CLASS__ . "form" . $colName, "افزودن به $colLable");
				?>

			<?php
				break;
			case "color":
			?>

				<div class="form-control">

	<div class="input-group col-3">
		<input autocomplete="off" type="text" onchange="setColorFor(this,'<?= $id . __CLASS__ . "form" . $colName . "selectColor" ?>')" name="<?= $colName ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>" <?= $extraAttribut; ?> <?= $require; ?>>
		<input autocomplete="off" type="color" onchange="setColorFor(this,'<?= $id . __CLASS__ . "form" . $colName ?>')" id="<?= $id . __CLASS__ . "form" . $colName . "selectColor" ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" <?= $extraAttribut; ?> <?= $require; ?>>
	</div>

				</div>
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

			<?php
				break;
			default:
			?>


				<input autocomplete="off" type="text" <?= $extraAttribut; ?> <?= $require; ?> class="form-control" maxlength="100" name="<?= $colName ?>" value="<?php if (isset($colVal)) echo $colVal; ?>" id="<?= $id . __CLASS__ . "form" . $colName ?>" placeholder="<?= $colLable ?>">
				<label for="<?= $id . __CLASS__ . "form" . $colName ?>"><?= $colLable ?><?php if (isset($require) && $require != "") echo "<span class='text-danger'>*</span>"; ?></label>

		<?php
				break;
		}
	}

	// نمایش فرم برای جستجو
	public function searchForm($associationLables = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		if (isset($associationLables) && $associationLables != "") {
			$header0 = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->columns;
		} else {
			$header0 = [];
		}
		$header0 = $this->standardCols($header0, false);
		//$header0=(is_array($associationLables) && count($associationLables))? 	$associationLables : $this->columns;

		foreach ($header0 as $head => $lbl) {
			if (is_numeric($head)) {
				if (isset($this->columns[$lbl])) {
	$headers[$lbl] = $this->columns[$lbl]["lbl"];
				} else {
	$headers[$lbl] = $lbl;
				}
			} else {
				$headers[$head] = $this->columns[$head]["lbl"];
			}
		}
		// اگر دستور جستجو صادر شود در این قسمت مدیریت خواهد شد
		$data = [];
		if (isset($_REQUEST['search'])) {

			foreach ($headers as $head => $lable) {
				// دریافت داده هایی که باید در شی ثبت شوند
				if (isset($_REQUEST[$head]) && $_REQUEST[$head] != "" && $head != $this->autoIdName) {

	// هنگامی که نوع ارسالی چک باکس باشد 
	// یک ورودی مخفی با نام ستون و مقدار 
	// checkbox
	// همراه بقیه ورودی ها ارسال می شود
	// وبرای تک تک چکباکس ها، نام ستون با یک اندرلاین به کلمه چک متصل می شود 
	if ($_REQUEST[$head] == "checkbox") {
		$checks = [];
		foreach ($_POST as $recived => $val) {

			if (strstr($recived, "check_" . $head)) {
				$checks[] = $val;
			}
		}
		if (count($checks)) {
			$access = implode("/n", $checks);
			$data[$head] = "like '%" . $access . "%'";
		} else {

			$data[$head] = "like '%%'";
		}
	} else {
		if ($this->columns[$head]['type'] != "range") {
			$data[$head] = "like '%" . $_REQUEST[$head] . "%'";
		} else {
			$data[$head] = "<= '" . $_REQUEST[$head] . "'";
		}
	}
				}
			}
		} ?>
		<div class="w-100 row m-0 p-0 bg-body rounded ">
			جستجوی پیشرفته
			<div class="col-md-12">
				<form class="row m-0 p-0 col-12 gap-3 position-relative " id="hrrjSearchForm" method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
	<?php foreach ($headers as $col => $lable) : ?>

		<?php
			$searchVal = (isset($_REQUEST["search"]) && isset($_REQUEST[$col])) ? $_REQUEST[$col] : "";
			if ($searchVal == "checkbox") {
				$checks = [];
				foreach ($_POST as $recived => $val) {
	if (strstr($recived, "check_" . $col)) {
		$checks[] = $val;
	}
				}
				if (count($checks)) {
	$searchVal = implode("\n", $checks);
				}
			}
			$t = $this->columns[$col]['type'];
			$noAlowedType = [
				"file",
				"img",
				"timestamp",
				"last_timestamp",
				"text_rich",
				"text",
				"text400",
				"album",
				"color"
			];
			if (!in_array($t, $noAlowedType)) {
		?>
			<div class="form-floating shadow rounded p-1">
				<?php $this->showColumn($col, ["lbl" => $lable, "require" => false], $searchVal, "search"); ?>
			</div>
	<?php	}

		endforeach; ?>
	<div class="col-12 text-center sticky-bottom">
		<button type="submit" form="hrrjSearchForm" name="search" class="btn btn-primary m-1">جستجو</button>
	</div>
				</form>
			</div>

		</div>


	<?php return	$data;
	}

	// استخراج نتایج برای اکسل
	public function excel_report($associationData = [], $associationLables = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->getLabels();


		$data = (is_array($associationData) && count($associationData)) ? 	$associationData : [];
		if (!count($data)) {
			echo "<div class='alert alert-info'>داده ای برای نمایش وجود ندارد</div>";
			return true;
		}
		$count = count($data);
		$columnHeader = '';
		foreach ($headers as $colName => $colLable) {
			$columnHeader .= '"' . trim($colLable) . '"' . "\t";
		}
		$setData = '';
		foreach ($data as $row) {
			$rowData = '';
			foreach ($headers as $colName => $colLable) {
				if (isset($row->$colName)) {
	$value = '"' . str_replace("\t", " ", str_replace("\r", " ", str_replace("\n", " ", $row->$colName))) . '"' . "\t";
	$rowData .= $value;
				}
			}
			$setData .= trim($rowData) . "\n";
		}
		//$setData = "col1\tcol1\tcol1\t\ncol1\tcol1\tcol1\t";
		//header("Content-type: application/octet-stream"); 
		header('Content-Transfer-Encoding: utf8');
		//header("Pragma: no-cache"); 
		//header("Expires: 0"); 
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$this->TABLENAME.txt");
		//echo $columnHeader . "\n".$columnHeader2 . "\n" . $setData . "\n";
		echo $columnHeader . "\n" . $setData . "\n";
		exit();
		//echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", utf8_encode($columnHeader . "\n" . $setData . "\n"));
	}

	// استخراج نتایج برای اکسل
	public function csv_report($associationData = [], $associationLables = [])
	{
		$this->errors[] = "شروع " . __METHOD__;
		// نام ستون های از جدول که قرار است در فرم نمایش داده شوند
		// باید به عنوان ورودی به این تابع داده شود
		// در غیر این صورت همه ستون ها در فرم نمایش داده می شوند
		$headers = (is_array($associationLables) && count($associationLables)) ? 	$associationLables : $this->getLabels();


		$data = (is_array($associationData) && count($associationData)) ? 	$associationData : [];
		if (!count($data)) {
			echo "<div class='alert alert-info'>داده ای برای نمایش وجود ندارد</div>";
			return true;
		}
		$count = count($data);
		$columnHeader = '';
		foreach ($headers as $colName => $colLable) {
			$columnHeader .= '' . trim($colLable) . ',';
		}
		$setData = '';
		foreach ($data as $row) {
			$rowData = '';
			foreach ($headers as $colName => $colLable) {
				if (isset($row->$colName)) {
	$value = '"' . trim(str_replace("\r", " ", str_replace("\n", " ", $row->$colName))) . '",';
	//$value ='"'.nl2br(str_replace(",","-",htmlentities($row->$colName))).'",';
	$rowData .= $value;
				}
			}
			$setData .= trim($rowData) . "\n";
		}
		//$setData = "col1\tcol1\tcol1\t\ncol1\tcol1\tcol1\t";
		//header("Content-type: application/octet-stream"); 
		header('Content-Transfer-Encoding: utf8');
		//header("Pragma: no-cache"); 
		//header("Expires: 0"); 
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$this->TABLENAME.csv");
		echo $columnHeader . "\n" . $setData . "\n";
		exit();
		//echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", utf8_encode($columnHeader . "\n" . $setData . "\n"));
	}

	// صفحه ای برای مدیریت کل دیتابیس و اطلاعات
	public function editPage()
	{
		$this->errors[] = "شروع " . __METHOD__;
		if (isset($_REQUEST["selected_id"])) {
			$this->get($_REQUEST["selected_id"]);
		}

		// این تابع اطلاعات کامل یک دیتابیس را ویرایش خواهد نمود
		// نباید به صورت عمومی از آن استفاده شود 
		// تنها در اختیار مدیر سایت قرار داده شود
		$btn = [];
		$btn2 = [BASE::SHOW_CLOSE_BTN, BASE::SHOW_EDIT_BTN, BASE::SHOW_DELETE_BTN, BASE::SHOW_ADD_BTN];
		$formId = "add20";
		$this->SET_REQUEST_RECIVER($btn2, $formId); 	?>
		<div class="col-12 mb-3">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				جستجو
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable">
	<div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">جستجوی پیشرفته</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<?php $sendeddata = $this->searchForm([]); ?>
		</div>

	</div>
				</div>
			</div>


			<?php $this->formInModal($formId, [], $btn2); ?>
			
			<?php if ((isset($_REQUEST['selected_id']) &&
			is_numeric($_REQUEST['selected_id']) &&
			$_REQUEST['selected_id'] === cleanData($_REQUEST['selected_id']))
					 ) { ?>
				<script>
	$(document).ready(function() {
		// id of form in formInModal == exampleModaladd + formId;
		showModal("exampleModaladd<?= $formId ?>");

	});
				</script>
			<?php } ?>
		</div>
		<div class="accordion" id="accordionSettingExample">
			<?php if (method_exists($this, 'showForArrange')) { ?>
				<div class="accordion-item">
	<h2 class="accordion-header">
		<button class="accordion-button collapsed bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSettingTwo" aria-expanded="false" aria-controls="collapseSettingTwo">
			مرتب کردن اطلاعات
		</button>
	</h2>
	<div id="collapseSettingTwo" class="accordion-collapse collapse" data-bs-parent="#accordionSettingExample">
		<div class="accordion-body">
			<?php $this->showForArrange(); ?>
		</div>
	</div>
				</div>
			<?php } ?>
			<div class="accordion-item">
				<h2 class="accordion-header">
	<button class="accordion-button bg-body-tertiary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSettingOne" aria-expanded="true" aria-controls="collapseSettingOne">
		مشاهده اطلاعات ثبت شده قبلی
	</button>
				</h2>
				<div id="collapseSettingOne" class="accordion-collapse collapse show" data-bs-parent="#accordionSettingExample">
	<div class="accordion-body">
		<div class="row m-0 p-0 mt-3 col-12">
			<div class="col-md-12 m-0 p-0">
				<?php
		$this->sql_order_list = ["id"];
		$this->sql_order_type = self::SQL_ORDER_DESC;

				?>
				<?php if (isset($_REQUEST['search'])) { ?>
					<div class="p-0 p-md-1">
		<a href="<?php $_SERVER['PHP_SELF'] ?>" class="btn">بازگشت</a>
		<h3>نتایج جستجو</h3>
		<hr>
		<?php
			$res = $this->search($sendeddata);
			// نتایج به صورت متن به سرور ارسال می شود برای دانلود شدن در فایل
			$data = urlencode(json_encode($res));
			$this->showTable($res, [], '', $btn); ?>



					</div>
				<?php } else {

			$res = $this->search([$this->autoIdName => "like '%%'"]);
			// نتایج به صورت متن به سرور ارسال می شود برای دانلود شدن در فایل
			$data = urlencode(json_encode($res));
			$this->showTable($res, [], '', $btn); ?>


				<?php } ?>
				<div class="bg-body d-flex">
					<form method="post" enctype="multipart/form-data" target="_blank" action="export_to_excel.php">
		<!-- نتایج به صورت متن به سرور ارسال می شود برای دانلود شدن در فایل -->
		<input type="hidden" name="data" value="<?= $data ?>">
		<input type="hidden" name="object" value="<?= $this->TABLENAME; ?>">
		<button class="btn btn-danger m-2" type="submit">دانلود txt</button>
					</form>
					<form method="post" enctype="multipart/form-data" target="_blank" action="export_to_csv.php">
		<input type="hidden" name="data" value="<?= $data ?>">
		<input type="hidden" name="object" value="<?= $this->TABLENAME; ?>">
		<button class="btn btn-danger m-2" type="submit">دانلود csv</button>
					</form>
				</div>

			</div>
		</div>
	</div>
				</div>
			</div>


		</div>




	<?php
	}

	public function editAsSetting()
	{
		HELPER::putJqueryMiniInPage();
		HELPER::putGotoSelectedIdInPage();
		$this->errors[] = "شروع " . __METHOD__;
		if (isset($_REQUEST["selected_id"])) {
			$this->get($_REQUEST["selected_id"]);
		}

		// این تابع اطلاعات کامل یک دیتابیس را ویرایش خواهد نمود
		// نباید به صورت عمومی از آن استفاده شود 
		// تنها در اختیار مدیر سایت قرار داده شود
		$btn = [BASE::SHOW_ADD_BTN];
		$btn2 = [BASE::SHOW_EDIT_BTN];
		$formId = "add21";
		$this->SET_REQUEST_RECIVER([BASE::SHOW_ADD_BTN, BASE::SHOW_EDIT_BTN], $formId); ?>
		<div class="col-md-12 ">
			<?php
		$this->sql_order_list = ["id"];
		$this->sql_order_type = self::SQL_ORDER_DESC;
		$res = $this->search([$this->autoIdName => "like '%%'"]);
		// نتایج به صورت متن به سرور ارسال می شود برای دانلود شدن در فایل
		$data = urlencode(json_encode($res));
		if (count($res) > 0) {

			$this->get($res[0]["id"]);

			$this->formByFixedButton($formId, [], $btn2);
		} else {

			$this->formByFixedButton($formId, [], $btn);
		}
			?>
		</div> <?php
	}

	public function showErrors()
	{
		echo implode("<br>", $this->errors);
	}

	// اطلاعات یک جدول را براساس یکی از ستونهای عددی مرتب می کند
	public function reArrange($oderNo = -1, $filter = [], $upward = true, $orderCols = ["order_id"])
	{
		//orderNo شماره اندیسی را مشخص می کند که قرار است خالی بماند یعنی برای یک المان رزرو شود
		// filter اطلاعاتی که باید مرتب شوند طبق این فیلتر از دیتابیس استخراج می شوند
		// upward جهت مرتب کردن را مشخص می کند به صورت پیش فرش از کوچک به بزرگ هست
		//orderCols نام ستونهایی است که باید مرتب کردن نتایج بر اساس آنها انجام شود
		$colnameList = $this->getCols();
		$this->sql_order_list = [];
		if (is_array($orderCols) && count($orderCols)) {

			foreach ($orderCols as $item) {
				if (in_array($item, $colnameList)) $this->sql_order_list[] = $item;
			}
		}
		if (count($this->sql_order_list) <= 0) {
			return false;
		}
		if ($upward == true) $this->sql_order_type = self::SQL_ORDER_ASC;
		else $this->sql_order_type = self::SQL_ORDER_DESC;
		$list = $this->search($filter);
		$mm = new SELF($this->conn, $this->TABLENAME, $this->columns);
		$newIndex = 0;
		$orderColType = $this->columns[$this->sql_order_list[0]]['type'];
		if ($orderColType == "id") {
			for ($i = 0; $i < count($list); $i++) {
				$mm->get($list[$i]['id']);
				//$mm->get($list[$i]['id']);
				// اگر کاربر چند ستون را برای مرتب کردن ارسال کرده باشد 
				// مرتب سازی بر اساس اولین اولویت برای ویرایش صورت می گیرد
				if ($newIndex == $oderNo) {
	// همه اهداد از صفر تا انتها برای اجزا ثبت می شود بجز عدد ارسال شده
	$newIndex++;
				}
				$mm->{$this->sql_order_list[0]} = $newIndex;
				$mm->update();
				$newIndex++;
			}
			return true;
		} else {
			return false;
		}
	}

	public function pagination_show($page = 0)
	{
		if ($this->search_count_result <= $this->sql_limit_count) return "";
		if ($page > $this->search_count_page) $page = 0;
		$hiddens = '';
		$search = '';
		for ($i = 0; $i < count($this->hides); $i++) {
			$hiddens .= '&' . $this->hides[$i]['name'] . '=' . $this->hides[$i]['value'];
		}
		$first = ($page <= 0) ? 'disabled' : '';
		//$search=isset($search_key)? '&search='.$search_key : $search;

		$res = "<div class='text-center text-muted mb-1'> 
			<span class=''> $this->search_count_result </span> مورد در 
			<span class=' '> $this->search_count_page </span> صفحه 
		</div>";
		if ($this->sql_limit_page >= 0) {
			$res .= '<nav aria-label="Page navigation example" dir="ltr">
 	 <ul class="pagination pagination-sm justify-content-center">
 	<li class="page-item ' . $first . '">
 		 <a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page - 1) . $hiddens . '" aria-label="Previous">
 			 <span aria-hidden="true">&laquo;</span>
 		 </a>
 	</li>';
			$k = 0;
			$res .= '<li class="page-item ' . $first . '"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=0' . $hiddens . '">ابتدا</a></li>';
			for ($i = 0; $i < ($this->search_count_page); $i++) {
				$k++;
				$select = '';
				if ($page == $i) {
	$select = 'active';
				}
				if ($i <= ($page + 2) && $i >= ($page - 2)) :
	$res .= '<li class="page-item ' . $select . '"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . $hiddens . '">' . ($i + 1) . '</a></li>';
				else :
	$res .= '';
				endif;
			}
			$last = ($page >= ($k - 1)) ? 'disabled' : '';
			$next = ($page > $k) ? $k : ($page + 1);
			$res .= '<li class="page-item ' . $last . '"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($k - 1) . $hiddens . '">انتها</a></li>';
			$res .= '<li class="page-item ' . $last . '">
 			<a class="page-link " href="' . $_SERVER['PHP_SELF'] . '?page=' . $next . $hiddens . '" aria-label="Next">
 			<span aria-hidden="true">&raquo;</span>
 			</a>
 		</li>
 		</ul>
	</nav>
				';
		}
		return $res;
	}

	protected function pagination_count_result($sql)
	{
		//echo $sql;
		$result = mysqli_query($this->conn, $sql);
		if (!$result) {
			$this->checkColumns();
		}
		$result = mysqli_query($this->conn, $sql)	or $this->errorManger(mysqli_error($this->conn) . "line:" . __LINE__ . "database:" . $this->TABLENAME);
		$found = mysqli_num_rows($result);
		mysqli_free_result($result);
		return $found;
	}

	public function pagination_addHidden($name, $value)
	{
		$this->hides[] = ["name" => $name, "value" => $value];
	}
}

function cleanData($input)
{
	// هنگامی که اطلاعات را ارسال می کنید باید از این فیلتر آنها را عبور دهید تا هکر نتواند کاری انجام دهد
	return htmlentities(trim($input), ENT_QUOTES);
}

class EMAIL
{
	//headers	Optional. Specifies additional headers, like From, Cc, and Bcc.
	//The additional headers should be separated with a CRLF (\r\n).
	//Note: When sending an email, it must contain a From header. This can be set with this parameter or in the php.ini file.
	public function send()
	{
		$to = "example@gmail.com"; // آدرس ایمیل گیرنده را وارد کنید 
		$from = "example@yoursite.ir"; // این آدرس باید آدرس سایت خودتان باشد لزومی ندارد که حتما ایمیل را از قبل ساخته باشید
		// عنوان پیام
		$name = "پیام تست ایمیل";

		// متن پیام
		$matn = "این اولین ایمیل ارسالی از طریق دستورات php است.";

		$header = "FROM:" . $from;

		mail($to, $name, $matn, $header);
	}
}
class SMS
{
	public $UserName; // شماره تلفن شما در رایگان اسم اس
	public $Password; // پسورد شما در رایگان اس ام اس
	public $Footer;

	// در قسمت زیر اطلاعات حساب کاربری خودتان در رایگان اسم اس را جایگزین کنید
	function __construct($usernmae = "09123456789", $password = "123456789")
	{
		$this->UserName = $usernmae;
		$this->Password = $password;
	}

	// ارسال کد ثبت نام به شماره تلفن
	function SendCode($mobileNumber, $footer)
	{
		$Url = "http://smspanel.Trez.ir/AutoSendCode.ashx";
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt(
			$ch,
			CURLOPT_POSTFIELDS,
			http_build_query(array(
				'Username' => $this->UserName,
				'Password' => $this->Password,
				'Mobile' => $mobileNumber,
				'Footer' => $footer
			))
		);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close($ch);
		return $server_output;
	}

	// بررسی صحت کد ارسالی
	function IsCodeValid($mobileNumber, $code)
	{
		$Url = "http://smspanel.Trez.ir/CheckSendCode.ashx";
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt(
			$ch,
			CURLOPT_POSTFIELDS,
			http_build_query(array(
				'Username' => $this->UserName,
				'Password' => $this->Password,
				'Mobile' => $mobileNumber,
				'Code' => $code
			))
		);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close($ch);
		return $server_output;
	}

	// ارسال پیام با متن دلخواه
	function SendCustomMessage($mobileNumber, $message)
	{
		$Url = "http://smspanel.Trez.ir/SendMessageWithCode.ashx";

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt(
			$ch,
			CURLOPT_POSTFIELDS,
			http_build_query(array(
				'Username' => $this->UserName,
				'Password' => $this->Password,
				'Mobile' => $mobileNumber,
				'Message' => $message
			))
		);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close($ch);
		return $server_output;
	}
}
class SECURE
{


	// مقدار دو متغییر زیر را به دلخواه خود تغییر دهید
	private static $secretKey = '123456789'; // رمز مورد نظر خود را وارد کنید بهتر است ترکیبی از حروف و اعداد باشد
	private static $secretIv = 'www.rashidi1401.ir'; // این عبارت عمومی است به عنوان ورودی عمومی استفاده می شود

	// برای مشاهده اطلاعات بیشتر در مورد این روش به ادرس زیر مراجعه کنید
	//https://www.php.net/manual/en/function.openssl-encrypt.php

	private static $encryptMethod = "AES-256-CBC";
	// چندتا از متد ها
	//AES-256-CBC
	//AES-128-CBC
	//aes-128-gcm 
	// در روش آخر نیاز به تگ وجود دارد
	private static $tag;
	public static function encoder($data)
	{
		// مثل آش رمز را در هم و برهم می کند
		$key = hash('sha256', self::$secretKey);

		// 16 کارکتر را جدا می کند
		$iv = substr(hash('sha256', self::$secretIv), 0, 16);

		// رمز نگاری نامتقارن را انجام می دهد

		if (self::$encryptMethod == "aes-128-gcm") {
			$result = openssl_encrypt($data, self::$encryptMethod, $key, 0, $iv, self::$tag);
		} else {
			$result = openssl_encrypt($data, self::$encryptMethod, $key, 0, $iv);
		}
		return $result = base64_encode($result);
	}
	public static function decoder($data)
	{
		$key = hash('sha256', self::$secretKey);
		$iv = substr(hash('sha256', self::$secretIv), 0, 16);
		if (self::$encryptMethod == "aes-128-gcm") {
			$result = openssl_decrypt(base64_decode($data), self::$encryptMethod, $key, 0, $iv, self::$tag);
		} else {
			$result = openssl_decrypt(base64_decode($data), self::$encryptMethod, $key, 0, $iv);
		}

		return $result;
	}

	static private function base64_url_encode($input)
	{
		return strtr(base64_encode($input), '+/=', '-_,');
	}

	static private function base64_url_decode($input)
	{
		return base64_decode(strtr($input, '-_,', '+/='));
	}
}
class CURL_HELPER
{
	function download($urlFilename)
	{
		$f = pathinfo($urlFilename);
		$saveAddress = fopen($f['basename'], "w");
		$this->curl_downlaod($urlFilename, $saveAddress);
		fclose($saveAddress);
		return $f['basename'];
	}
	function post($url, $dataArray = [])
	{
		$conn = curl_init();
		curl_setopt_array(
			$conn,
			array(
				CURLOPT_URL => $url,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $dataArray,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_SSL_VERIFYPEER => false,
			)
		);
		$result = curl_exec($conn);
		curl_close($conn);
		return $result;
	}
	function get($url, $dataArray = [])
	{
		$conn = curl_init();
		curl_setopt_array(
			$conn,
			array(
				CURLOPT_URL => $url,
				CURLOPT_POST => false,
				CURLOPT_POSTFIELDS => $dataArray,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_SSL_VERIFYPEER => false,
			)
		);
		$result = curl_exec($conn);
		curl_close($conn);
		return $result;
	}
	protected function curl_downlaod($url, $saveAddress)
	{
		if (!extension_loaded('curl')) {
			exit('cURL Disabled On Your PHP Environment');
		}
		$conn = curl_init();
		curl_setopt_array(
			$conn,
			array(
				CURLOPT_URL => $url,
				CURLOPT_FILE => $saveAddress,

				//CURLOPT_HEADER
				// برای دانلود فایل های مختلف باید
				//false باشد
				// برای دانلود صفحه هات وب بهتره
				//TRUE باشد
				CURLOPT_HEADER => false,

				CURLOPT_SSL_VERIFYPEER => false,
			)
		);
		$result = curl_exec($conn);
		$size = curl_getinfo($conn, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
		if (curl_errno($conn)) {
			echo curl_error($conn);
		} else {
			echo "ارتباط با موفقیت صورت گرفت" . "<br>";
			echo "اندازه فایل دانلود شده برابر با: " . $size . " است.";
			//$responseCode = curl_getinfo($conn, CURLINFO_HTTP_CODE);
			//if($responseCode == "200") echo "successful request";
		}
		curl_close($conn);
		return $result;
	}
}
class HELPER
{
	public static function breakByNewLine($str)
	{
		return explode("\n", $str);
	}
	
	public static function putJalaliInPage(){
		require_once("src/jdf.php");
	}
	public static function putCkEditor5InPage()
	{
				?>
		<script src="ckeditor/build/ckeditor.js"></script>
		<script>
			ClassicEditor
				.create(document.querySelector('.matn'), {

	toolbar: {
		items: [
			'heading',
			'|',
			'italic',
			'link',
			'bulletedList',
			'numberedList',
			'|',
			'indent',
			'outdent',
			'|',
			'imageUpload',
			'blockQuote',
			'insertTable',
			'mediaEmbed',
			'undo',
			'redo',
			'bold',
			'fontBackgroundColor',
			'exportWord',
			'exportPdf',
			'CKFinder',
			'highlight',
			'horizontalLine',
			'htmlEmbed',
			'imageInsert',
			'pageBreak'
		]
	},
	language: 'fa',
	image: {
		toolbar: [
			'imageTextAlternative',
			'imageStyle:full',
			'imageStyle:side'
		]
	},
	table: {
		contentToolbar: [
			'tableColumn',
			'tableRow',
			'mergeTableCells',
			'tableCellProperties',
			'tableProperties'
		]
	},
	licenseKey: '',

				})
				.then(editor => {
	window.editor = editor;








				})
				.catch(error => {
	console.error('Oops, something went wrong!');
	console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
	console.warn('Build id: m2s3q0yzb0gp-t5h8h1ioowhq');
	console.error(error);
				});
		</script>
	<?php
	}
	public static function putMinCkEditor5InPage()
	{
	?>
		<script src="ckeditor/build/ckeditor.js"></script>
		<script>
			ClassicEditor
				.create(document.querySelector('.matn'), {

	toolbar: {
		items: [
			'heading',
			'|',
			'italic',
			'link',
			'bulletedList',
			'numberedList',
			'|',
			'indent',
			'outdent',
			'|',
			'blockQuote',
			'insertTable',

			'undo',
			'redo',
			'bold',
			'fontBackgroundColor',
			'highlight',
			'horizontalLine',
			'htmlEmbed',
			'imageInsert',
			'pageBreak'
		]
	},
	language: 'fa',
	image: {
		toolbar: [
			'imageTextAlternative',
			'imageStyle:full',
			'imageStyle:side'
		]
	},
	table: {
		contentToolbar: [
			'tableColumn',
			'tableRow',
			'mergeTableCells',
			'tableCellProperties',
			'tableProperties'
		]
	},
	licenseKey: '',

				})
				.then(editor => {
	window.editor = editor;








				})
				.catch(error => {
	console.error('Oops, something went wrong!');
	console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
	console.warn('Build id: m2s3q0yzb0gp-t5h8h1ioowhq');
	console.error(error);
				});
		</script>
	<?php
	}
	public static function putEmptyCkeditor5InPage($id)
	{
		$i = ".$id";
	?>
		<script src="ckeditor/build/ckeditor.js"></script>
		<script>
			ClassicEditor
				.create(document.querySelector("<?= $i ?>"), {

	language: 'fa',
	image: {

	},
	table: {

	},
	licenseKey: '',

				})
				.then(editor => {
	window.editor = editor;
				})
				.catch(error => {
	console.error('Oops, something went wrong!');
	console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
	console.warn('Build id: m2s3q0yzb0gp-t5h8h1ioowhq');
	console.error(error);
				});
		</script>
	<?php
	}
	public static function putUploaderJsInPage()
	{
		?>

			<style>
				.label {
	cursor: pointer;
				}

				.progress {
	display: none;
	margin-bottom: 1rem;
				}



				.img-container img {
	max-width: 100%;
				}
			</style>
			<script>
				function showToast(id) {
	const toastLiveExample = document.getElementById(id);
	const toastCounter = toastLiveExample.querySelector(".toastCounter");
	const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
	if (!toastBootstrap.isShown()) {
		let timer = 11;
		toastCounter.innerHTML = timer;
		let mouseOut = true;
		var timeout = setTimeout(countDown, 500);
		//clearTimeout(timeout);

		function countDown() {

			if (toastCounter.innerHTML > 0 && mouseOut) {


				toastCounter.innerHTML--;


			}
			if (toastCounter.innerHTML <= 0) {
				clearTimeout(timeout);
			} else {
				timeout = setTimeout(countDown, 500);
			}

		}
		toastLiveExample.addEventListener('mouseover', () => {
			mouseOut = false;
		});
		toastLiveExample.addEventListener('mouseout', () => {
			toastCounter.innerHTML = 10;
			mouseOut = true;
		});
		toastBootstrap.show();

	}

				}

				function showModal(id) {
	// باید صفحه کاملا بارگذاری شده باشد 
	// تا ایت تابع با مشکل مواجه نشود
	const myModal = new bootstrap.Modal('#' + id);
	myModal.show();

				}

				function hideModal(id) {
	// باید صفحه کاملا بارگذاری شده باشد 
	// تا ایت تابع با مشکل مواجه نشود
	const myModal = new bootstrap.Modal('#' + id);
	myModal.hide();

				}

				function beforeDelete(deleteBtnId) {
	let deleteState = document.getElementById(deleteBtnId);
	let a = confirm(" آیا برای حذف کردن اطلاعات مطمئن هستید؟");
	if (a == true) {

		deleteState.click();

	}
				}

				function getPicsFromDiv(listId, inputName = "") {

	let div2 = document.querySelectorAll("#" + listId + " img");
	let listOfAddress = [];
	for (const ddd of div2) {
		listOfAddress.push(ddd.name);
	}
	let addressHaString = listOfAddress.join("\n");

	if (document.querySelector("#" + "" + listId + "input" + inputName)) {
		let input1 = document.querySelector("#" + "" + listId + "input" + inputName);
		input1.value = addressHaString;
	} else {
		let input1 = document.createElement('input');
		input1.type = "hidden";
		input1.id = "" + listId + "input" + inputName;
		input1.name = inputName;
		input1.value = addressHaString;
		document.getElementById(listId).before(input1);
	}

				}

				function getFilesFromDiv(listId, inputName = "") {

	let div2 = document.querySelectorAll("#" + listId + " span");
	let listOfAddress = [];
	for (const ddd of div2) {
		listOfAddress.push(ddd.id);
	}

	let addressHaString = listOfAddress.join("\n");

	if (document.querySelector("#" + "" + listId + "fileinput" + inputName)) {
		let input1 = document.querySelector("#" + "" + listId + "fileinput" + inputName);
		input1.value = addressHaString;
	} else {
		let input1 = document.createElement('input');
		input1.type = "hidden";
		input1.id = "" + listId + "fileinput" + inputName;
		input1.name = inputName;
		input1.value = addressHaString;
		document.getElementById(listId).before(input1);
	}

				}

				function addLinkTo(id) {
	const finalRes = document.getElementById(id);
	const select = document.querySelector("#linkAdder" + id + " select");
	const inputName = document.querySelector("#linkAdder" + id + " input.linkName");
	const inputHref = document.querySelector("#linkAdder" + id + " input.linkHref");
	let str = "<a class='" + select.value + "' href='" + inputHref.value + "'>" + inputName.value + "</a>";
	//finalRes.appendChild(img);
	//finalRes.click(); // برای دریافت اطلاعاتی که باید در دیتابیس ذخیره شوند ضروری است
	//setOnClick(to);
	let lastdata = CKEDITOR.instances[id].getData();
	finalRes.innerHTML = lastdata;
	data = finalRes.value;
	data += str;
	finalRes.innerHTML = data;
	CKEDITOR.instances[id].setData(data);

				}

				function pathinfo(url) {
	let Address = '';
	let Filename = '';

	let Extension = '';
	let data = url.split('/');

	if (data.length > 0) {
		Filename = data[data.length - 1];
		let l = Filename.split('.');

		if (l.length > 1) {
			if (Filename.match(/^.*\.{1}[a-zA-z]{1,6}$/)) {
				Extension = l[l.length - 1];
				l.pop();
				Filename = l.join('.');
			}
		}
		data.pop();
		Address = data.join("/");
	} else {
		Address = url;
	}


	return {
		"dirname": Address,
		"filename": Filename,
		"extension": Extension
	};

				}

				function clickBtn(targetId) {
	document.getElementById(targetId).click();
				}

				function setOnClick(listId) {
	let div = document.querySelectorAll("#" + listId + " img"); // عکس های درون لیست آیدی انتخاب می شوند
	for (const ddd of div) {

		ddd.onclick = function() {
			this.remove();
			getPicsFromDiv(listId);
		};

		ddd.onmouseover = function() {
			this.style.scale = 1.1;
		};
		ddd.onmouseout = function() {
			this.style.scale = 1;

		};

	}
				}

				function setOnFileClick(listId) {

	let div = document.querySelectorAll("#" + listId + " span"); // عکس های درون لیست آیدی انتخاب می شوند
	for (const ddd of div) {

		ddd.onclick = function() {
			this.remove();
			getFilesFromDiv(listId);
		};

		ddd.onmouseover = function() {
			this.style.scale = 1.1;
		};
		ddd.onmouseout = function() {
			this.style.scale = 1;

		};

	}
				}

				function setClassAsSortable(classname = "sortable", reqType = "", callBackFunction = "", groupName = "groupList") {
	showForSelect = false;
	let sortableList = document.querySelectorAll("." + classname);
	for (let s = 0; s < sortableList.length; s++) {
		new Sortable(sortableList[s], {
			group: groupName,
			animation: 0,
			fallbackOnBody: true,
			ghostClass: 'blue-background-class',
			swapThreshold: 0.85,
			onEnd: function(evt) {
				var itemEl = evt.item; // dragged HTMLElement
				itemEl.parentNode.click();
				evt.to; // target list
				evt.from; // previous list
				evt.oldIndex; // element's old index within old parent
				evt.newIndex; // element's new index within new parent
				evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
				evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
				evt.clone // the clone element
				evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving
				let str = "requests.php?reqType=" + reqType + "&" + "element=" + itemEl.getAttribute("id") + "&from=" + evt.from.getAttribute("id") + "&to=" + evt.to.getAttribute("id") + "&newOrder=" + evt.newIndex + "&oldOrder=" + evt.oldIndex;
				const post = new XMLHttpRequest();
				post.onreadystatechange = function() {
					if (post.readyState == 4 && post.status == 200) {
		/*
		const a1 = itemEl.parentNode.parentNode.parentNode;
		const b1 = document.createElement("div");
		b1.id = "h123456789";
		if (document.getElementById("h123456789")) {
			document.getElementById("h123456789").innerHTML = "";
		}
		b1.innerHTML = post.responseText;
		a1.appendChild(b1);
		*/
		let data = "element=" + itemEl.getAttribute("id") + "&from=" + evt.from.getAttribute("id") + "&to=" + evt.to.getAttribute("id") + "&newOrder=" + evt.newIndex + "&oldOrder=" + evt.oldIndex;
		callBackFunction(this, data);
					}
				}
				post.onerror = function(ev) {

					const a1 = itemEl.parentNode.parentNode.parentNode;
					const b1 = document.createElement("div");
					b1.id = "h123456789";
					if (document.getElementById("h123456789")) {
		document.getElementById("h123456789").innerHTML = "";
					}
					b1.innerHTML = post.responseText + "<br> دسترسی به اطلاعات با خطا مواجه شد";
					a1.appendChild(b1);

				}
				post.open("GET", str);
				post.send();
			},
		});
	}
				}

				function setClassAsSortable2(classname = "sortable", groupName = "groupList") {
	showForSelect = true;
	let sortableList = document.querySelectorAll("." + classname);
	for (let s = 0; s < sortableList.length; s++) {
		new Sortable(sortableList[s], {
			group: groupName,
			animation: 0,
			fallbackOnBody: true,
			ghostClass: 'blue-background-class',
			swapThreshold: 0.85,
			onEnd: function(evt) {
				var itemEl = evt.item; // dragged HTMLElement
				itemEl.parentNode.click();
				evt.to; // target list
				evt.from; // previous list
				evt.oldIndex; // element's old index within old parent
				evt.newIndex; // element's new index within new parent
				evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
				evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
				evt.clone // the clone element
				evt.pullMode; // when item is in another sortable: `"clone"` if cloning, `true` if moving	

			},
		});
	}
				}
				let folderContent = "";
				let finalUploadFile = "";
				let selectedFolder = "uploads";
				let toId = "";
				let showLocation = "explorer";
				let showForSelect = false;
				var imageRatio = -1;
				var cropper;

				class pictures {

	addFolder(selectedFolder, to, manage) {
		// ایجاد پوشه جدید در سایت
		let a = prompt("نام پوشه جدید را وارد کنید\n مثال name_25");
		if (a.match(/^[a-zA-z]+[a-zA-Z_0-9]*$/)) {
			let post3 = new XMLHttpRequest();
			let address2 = "requests.php?reqType=addNewFolder&selectedFolder=" + selectedFolder + "&folderName=" + a;
			post3.onreadystatechange = function() {
				if (post3.readyState == 4 && post3.status == 200) {
					new pictures().getFolderFiles(selectedFolder, to, manage);
				}
			}
			post3.onerror = function() {
				alert("error");
			}
			post3.open("GET", address2);
			post3.send();
		} else {
			alert("نام وارد شده صحیح نیست");
		}

	}
	getFolderImage(folderAddress, to, manage = false) {
		if (to) toId = to;
		//toId = "";

		showLocation = "explorer" + to;
		selectedFolder = folderAddress;

		let showLocationId = showLocation;
		document.getElementById(showLocationId).innerHTML = "";

		let newDiv = document.getElementById(showLocationId);

		const a = new XMLHttpRequest();

		a.onreadystatechange = function() {
			if (a.readyState == 4 && a.status == 200) {

				let data = a.responseText;
				folderContent = JSON.parse(data);
				let masirList = folderContent["address"].split("/");
				let newAddressList = [];
				document.getElementById(newDiv.id).innerHTML += "<small>برای انتخاب تصویر روی آن کلیک کنید</small><br>";
				for (let item in masirList) {
					newAddressList.push(masirList[item]);
					let newAddress = newAddressList.join("/");
					const btn = document.createElement("span");
					//btn.type="button";
					btn.className = "btn btn-sm m-0 p-0";
					btn.value = newAddress;
					btn.innerHTML = masirList[item];
					let $str = "new pictures().getFolderImage('" + newAddress + "','" + to + "'," + manage + ")";
					btn.setAttribute("onclick", $str);
					document.getElementById(newDiv.id).appendChild(btn);
					document.getElementById(newDiv.id).innerHTML += "/";
				}
				document.getElementById(newDiv.id).innerHTML += "</br>";
				let first = 0;
				let div = document.createElement('div');
				div.className = "sortable ";
				div.style.direction = "ltr";
				for (let i = 0; i < folderContent["files"].length; i++) {
					if (folderContent["files"][i] == "." || folderContent["files"][i] == "..") continue;
					const itemImg = document.createElement("img");
					itemImg.src = folderAddress + '/' + folderContent["files"][i];
					itemImg.name = folderAddress + '/' + folderContent["files"][i];
					itemImg.id = folderAddress + '/' + folderContent["files"][i];
					itemImg.style.maxWidth = "50%";
					itemImg.style.height = "50px";
					itemImg.className = "rounded p-1 m-1 bg-light shadow ";
					itemImg.draggable = true;

					itemImg.setAttribute("ondragstart", "drag(event)");
					itemImg.onclick = function() {
		const img = this;
		const finalRes = document.getElementById(to);
		if (finalRes) {
			finalRes.appendChild(img);
			finalRes.click(); // برای دریافت اطلاعاتی که باید در دیتابیس ذخیره شوند ضروری است
			setOnClick(to);
			let lastdata = CKEDITOR.instances[to].getData();
			finalRes.innerHTML = lastdata;
			data = finalRes.value;
			data += ' <img height="auto" class="" style="width:25%" src="' + folderAddress + '/' + folderContent['files'][i] + '"> ';
			finalRes.innerHTML = data;
			CKEDITOR.instances[to].setData(data);
			//alert('تصویر به انتهای متن اصلی اضافه شد');
		}




					}

					//document.getElementById(newDiv.id).appendChild(itemImg);
					div.appendChild(itemImg);




				}
				for (let i = 0; i < folderContent["folders"].length; i++) {
					if (first == 0) {
		//document.getElementById(newDiv.id).appendChild(document.createElement("br"));
		div.appendChild(document.createElement("br"));
		first++;
					}
					const resultElement = document.createElement("button");
					resultElement.type = "button";
					resultElement.value = folderAddress + '/' + folderContent["folders"][i];
					resultElement.id = folderAddress + '/' + folderContent["folders"][i];
					resultElement.innerHTML = folderContent["folders"][i];
					let $str = "new pictures().getFolderImage('" + folderAddress + '/' + folderContent["folders"][i] + "','" + to + "'," + manage + ")";
					resultElement.setAttribute("onclick", $str);
					resultElement.className = " btn btn-sm btn-warning m-1 sortable";
					//document.getElementById(newDiv.id).appendChild(resultElement);
					div.appendChild(resultElement);

				}
				document.getElementById(newDiv.id).appendChild(div);
				if (manage) setClassAsSortable(undefined, "changeFolder", resultFunction);

				function resultFunction(xhr, data) {

					if (xhr.responseText == "copy") {
		alert("فایل کپی شد");
					} else if (xhr.responseText == "delete") {
		alert("فایل حذف شد");
					} else if (xhr.responseText == "move") {

		alert("فایل جابجا شد");
					} else if (xhr.responseText == "error") {
		alert("عملیات نافص ماند");
					} else {
		//alert('خطای ناشناس رخ داد')
					}
					new pictures().getFolderImage(selectedFolder, to, manage);

				}

			}
		}

		let address = "requests.php?reqType=getFolderImage&address=" + folderAddress;
		a.open("GET", address);
		a.send();
	}
	getFolderFiles(folderAddress, id = "", manage = true) {
		toId = "";
		toId = id;
		showLocation = "explorer" + id;
		//alert(showLocation);//////////////////////////////////////////////////////////////////////////
		selectedFolder = folderAddress;
		let showLocationId = "explorer" + id;
		document.getElementById(showLocationId).innerHTML = "";

		let newDiv = document.getElementById(showLocationId);


		const a = new XMLHttpRequest();

		a.onreadystatechange = function() {
			if (a.readyState == 4 && a.status == 200) {

				let data = a.responseText;
				folderContent = JSON.parse(data);
				let masirList = folderContent["address"].split("/"); // پوشه جاری
				let newAddressList = [];


				// کدهای این قسمت جهت ساخت آدرس بار هست
				document.getElementById(showLocationId).innerHTML += ``;

				for (let item in masirList) {
					newAddressList.push(masirList[item]); // باز سازی لینک آدرس جدید
					let newAddress = newAddressList.join("/");
					const btn = document.createElement("a");
					//btn.type="button";
					btn.className = "btn btn-sm m-0 p-0 ";
					btn.value = newAddress;
					btn.innerHTML = masirList[item];
					let $str = "new pictures().getFolderFiles('" + newAddress + "','" + id + "'," + manage + ")";
					btn.setAttribute("onclick", $str);
					$str = `this.style.color='white';`;
					btn.setAttribute("onmouseover", $str);
					$str = `this.style.color='black'`;
					btn.setAttribute("onmouseout", $str);
					document.getElementById(newDiv.id).appendChild(btn);
					document.getElementById(newDiv.id).innerHTML += "/";
				}
				// از اینجا به بعد محتویات پوشه نمایش داده می شود
				document.getElementById(newDiv.id).innerHTML += "<br>";
				let first = 1;
				let div = document.createElement('div');
				div.className = "sortable ";
				div.style.direction = "ltr";
				for (let i = 0; i < folderContent["files"].length; i++) {
					const resultElement = document.createElement("button");
					let $str = "";
					if (folderContent["files"][i] == "." || folderContent["files"][i] == "..") continue;
					const resultElement2 = document.createElement("a");
					resultElement2.href = folderAddress + '/' + folderContent["files"][i];
					resultElement2.id = folderAddress + '/' + folderContent["files"][i];
					resultElement2.target = "_blank";
					resultElement2.innerHTML = folderContent["files"][i];
					resultElement2.className = " btn btn-sm btn-info m-1 ";
					$str = `this.style.color='red'`;
					resultElement2.setAttribute("onmouseover", $str);
					$str = `this.style.color='black'`;
					resultElement2.setAttribute("onmouseout", $str);
					div.appendChild(resultElement2);


				}
				for (let i = 0; i < folderContent["folders"].length; i++) {
					const resultElement = document.createElement("button");
					let $str = "";

					resultElement.type = "button";
					resultElement.value = folderAddress + '/' + folderContent["folders"][i];
					resultElement.id = resultElement.value;
					resultElement.innerHTML = folderContent["folders"][i];
					resultElement.className = "sortable btn btn-sm btn-warning m-1 ";
					$str = "new pictures().getFolderFiles('" + folderAddress + '/' + folderContent["folders"][i] + "','" + id + "'," + manage + ")";
					resultElement.setAttribute("onclick", $str);
					if (folderContent["folders"][i] != "." && folderContent["folders"][i] != "..") {
		if (first <= 1) {
			div.appendChild(document.createElement("br"));
			first++;
		}
		div.appendChild(resultElement);
					}




				}
				document.getElementById(newDiv.id).appendChild(div);
				if (manage) setClassAsSortable(undefined, "changeFolder", resultFunction);

				function resultFunction(xhr, data) {

					if (xhr.responseText == "copy") {
		alert("فایل کپی شد");
					} else if (xhr.responseText == "delete") {
		alert("فایل حذف شد");
					} else if (xhr.responseText == "move") {

		alert("فایل جابجا شد");
					} else if (xhr.responseText == "error") {
		alert("عملیات نافص ماند");
					} else {
		//alert('خطای ناشناس رخ داد')
					}
					new pictures().getFolderFiles(selectedFolder, id, manage);

				}



			}
		}

		let address = "requests.php?reqType=getFolderFiles&address=" + selectedFolder;
		a.open("GET", address);
		a.send();

	}
	getFolderFilesForSelect(folderAddress, id = "", manage = true) {
		toId = "";
		toId = id;
		showLocation = "explorer" + id;
		//alert(showLocation);//////////////////////////////////////////////////////////////////////////
		selectedFolder = folderAddress;
		let showLocationId = "explorer" + id;
		document.getElementById(showLocationId).innerHTML = "";

		let newDiv = document.getElementById(showLocationId);


		const a = new XMLHttpRequest();

		a.onreadystatechange = function() {
			if (a.readyState == 4 && a.status == 200) {

				let data = a.responseText;
				folderContent = JSON.parse(data);
				let masirList = folderContent["address"].split("/"); // پوشه جاری
				let newAddressList = [];


				// کدهای این قسمت جهت ساخت آدرس بار هست
				document.getElementById(showLocationId).innerHTML += ``;

				for (let item in masirList) {
					newAddressList.push(masirList[item]); // باز سازی لینک آدرس جدید
					let newAddress = newAddressList.join("/");
					const btn = document.createElement("a");
					//btn.type="button";
					btn.className = "btn btn-sm m-0 p-0 ";
					btn.value = newAddress;
					btn.innerHTML = masirList[item];
					let $str = "new pictures().getFolderFilesForSelect('" + newAddress + "','" + id + "'," + manage + ")";
					btn.setAttribute("onclick", $str);
					$str = `this.style.color='white';`;
					btn.setAttribute("onmouseover", $str);
					$str = `this.style.color='black'`;
					btn.setAttribute("onmouseout", $str);
					document.getElementById(newDiv.id).appendChild(btn);
					document.getElementById(newDiv.id).innerHTML += "/";
				}
				// از اینجا به بعد محتویات پوشه نمایش داده می شود
				document.getElementById(newDiv.id).innerHTML += "<br>";
				let first = 1;
				let div = document.createElement('div');
				div.className = "sortable ";
				div.style.direction = "ltr";
				for (let i = 0; i < folderContent["files"].length; i++) {
					const resultElement = document.createElement("button");
					let $str = "";
					if (folderContent["files"][i] == "." || folderContent["files"][i] == "..") continue;
					const resultElement2 = document.createElement("span");
					//resultElement2.href = folderAddress + '/' + folderContent["files"][i];
					resultElement2.id = folderAddress + '/' + folderContent["files"][i];
					resultElement2.name = folderAddress + '/' + folderContent["files"][i];
					resultElement2.innerHTML = folderContent["files"][i];
					resultElement2.className = " btn btn-sm btn-info m-1 ";
					//$str = `setOnFileClick('`+id+`')`;
					//resultElement2.setAttribute("onclick", $str);
					resultElement2.onclick = function() {
		const span = this;
		const finalRes = document.getElementById(id);
		if (finalRes) {
			finalRes.appendChild(span);
			finalRes.click(); // برای دریافت اطلاعاتی که باید در دیتابیس ذخیره شوند ضروری است
			setOnFileClick(id);
		}
					}
					div.appendChild(resultElement2);


				}
				for (let i = 0; i < folderContent["folders"].length; i++) {
					const resultElement = document.createElement("button");
					let $str = "";

					resultElement.type = "button";
					resultElement.value = folderAddress + '/' + folderContent["folders"][i];
					resultElement.id = resultElement.value;
					resultElement.innerHTML = folderContent["folders"][i];
					resultElement.className = " btn btn-sm btn-warning m-1 ";
					$str = "new pictures().getFolderFilesForSelect('" + folderAddress + '/' + folderContent["folders"][i] + "','" + id + "'," + manage + ")";
					resultElement.setAttribute("onclick", $str);
					if (folderContent["folders"][i] != "." && folderContent["folders"][i] != "..") {
		if (first <= 1) {
			div.appendChild(document.createElement("br"));
			first++;
		}
		div.appendChild(resultElement);
					}




				}
				document.getElementById(newDiv.id).appendChild(div);

				setClassAsSortable2();

			}
		}

		let address = "requests.php?reqType=getFolderFiles&address=" + selectedFolder;
		a.open("GET", address);
		a.send();

	}
	uploader(fileId = "fileId", to, showUploadedPics = true, manage = false) {
		showLocation = "explorer" + to;
		let holder = document.createElement("div");
		holder.style.width = "100%";
		holder.style.backgroundColor = "aqua";
		let prog = document.createElement('div');
		prog.style.marginBottom = "20px";
		prog.id = "prog" + fileId;
		prog.style.width = "0%";
		prog.innerHTML = "";
		prog.style.backgroundColor = "blue";
		prog.className="text-center progress-bar progress-bar-striped progress-bar-animated";

		const file = document.getElementById(fileId).files[0]; // فایلی که بارگذاری میشود
		if (!(file && file.size > 0)) {
			alert('هیچ فایلی انتخاب نشده است');
			return;
		}
		prog.innerHTML = "0%";
		holder.appendChild(prog);


		document.getElementById(showLocation).after(holder);
		holder.before(file.name);
		const chunkSize = 2 * 1024 * 1024; // اندازه تکه (در این مثال، 2MB)
		let start = 0;
		let end = Math.min(chunkSize, file.size);
		var chunkNumber = 0;
		var totalChunks = Math.ceil(file.size / chunkSize);
		var loadedChunks = 0;
		var isLoadingFinish=false;
		var totalArray=[];
		var uploadedArray=[];
		while (start < file.size && isLoadingFinish==false) {
			totalArray[chunkNumber]=0;
			uploadedArray[chunkNumber]=0;
		
			new pictures().uploadChunk(file,chunkNumber,prog,totalArray,uploadedArray).then(
				 function(loadedChunks){
						//let cc = Math.round((loadedChunks*100/totalChunks));
						//if (cc >= 99) { cc = 99;}
						//prog.innerHTML = cc + "%";
						//prog.style.width = cc + "%";
					 if (loadedChunks == totalChunks) {
							isLoadingFinish=true;
							prog.innerHTML = "100%";
							prog.style.width = "100%";
							prog.className="text-center text-bg-success";
							document.getElementById(fileId).files = null;
							document.getElementById(fileId).value = null;
							if (showUploadedPics) {
								new pictures().getFolderImage(selectedFolder, to, manage);
							} else {
								if (showForSelect == true) {
									new pictures().getFolderFilesForSelect(selectedFolder, to, manage);
								} else {
									new pictures().getFolderFiles(selectedFolder, to, manage);
								}

							}
						}},
				 function(chunkNumberError){
					 setTimeout(function() {
						new pictures().uploadChunk(file,chunkNumberError,prog,totalArray,uploadedArray).then(
				 			function(loadedChunks){
								//let cc = Math.round((loadedChunks*100/totalChunks));
								//if (cc >= 99) { cc = 99;}
								//prog.innerHTML = cc + "%";
								//prog.style.width = cc + "%";
								if (loadedChunks == totalChunks) {
							isLoadingFinish=true;
							prog.innerHTML = "100%";
							prog.style.width = "100%";
							prog.className="text-center text-bg-success";
							document.getElementById(fileId).files = null;
							document.getElementById(fileId).value = null;
							if (showUploadedPics) {
								new pictures().getFolderImage(selectedFolder, to, manage);
							} else {
								if (showForSelect == true) {
									new pictures().getFolderFilesForSelect(selectedFolder, to, manage);
								} else {
									new pictures().getFolderFiles(selectedFolder, to, manage);
								}

							}
						}},
				 			function(chunkNumberError){
								 setTimeout(function() {
					 				new pictures().uploadChunk(file,chunkNumberError,prog,totalArray,uploadedArray).then(
				 						function(loadedChunks){
						//let cc = Math.round((loadedChunks*100/totalChunks));
						//if (cc >= 99) { cc = 99;}
						//prog.innerHTML = cc + "%";
						//prog.style.width = cc + "%";
					 			if (loadedChunks == totalChunks) {
							isLoadingFinish=true;
							prog.innerHTML = "100%";
							prog.style.width = "100%";
							prog.className="text-center text-bg-success";
							document.getElementById(fileId).files = null;
							document.getElementById(fileId).value = null;
							if (showUploadedPics) {
								new pictures().getFolderImage(selectedFolder, to, manage);
							} else {
								if (showForSelect == true) {
									new pictures().getFolderFilesForSelect(selectedFolder, to, manage);
								} else {
									new pictures().getFolderFiles(selectedFolder, to, manage);
								}

							}
						}},
				 						function(chunkNumberError){
									isLoadingFinish==true;
									prog.className="text-center text-bg-danger";
					 				alert('خطا در بارگذاری قسمت '+chunkNumberError);
				 				}
		
									);
								},3000);
				 			}
		
						);
					 },3000);
				 }
			);
		
			
			chunkNumber++;
			start = end;
			end = Math.min(end + chunkSize, file.size);

			if (start == end) {
				document.getElementById(fileId).files = null;
				document.getElementById(fileId).value = null;
			}
		}
		
	}

	uploadChunk(file,chunkNumber=0,prog,totalArray,uploadedArray){
		
	return new Promise(function (resolve, reject) {
		
		const chunkSize = 2 * 1024 * 1024; // اندازه تکه (در این مثال، 2MB)
		let start = chunkNumber*chunkSize;
		let end = (chunkNumber+1)*chunkSize;
		if(end > file.size) end = file.size;
		if(start > file.size) start = file.size;
		if(start>=end) {return true;} // نیاز به بارگذاری نیست
		
		const chunk = file.slice(start, end); // قطعهای از فایل مورد نظر	
		let totalChunks = Math.ceil(file.size / chunkSize);
		const formData = new FormData();
			
			formData.append('chunkNumber', chunkNumber);
			formData.append('totalChunks', totalChunks);
			formData.append("name", file.name);
			formData.append("folder", selectedFolder);
			formData.append("reqType", "isFileChunkUploaded");
			new pictures().postPromis("requests.php",formData).then(
				function(res){
					if(res=="exists"){
						totalArray[chunkNumber]=0;
						uploadedArray[chunkNumber]=0 ;
					}else{
		formData.append("reqType", "uploadBigFile");
		formData.append('file', chunk);
			const xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function (e) {
 if (xhr.readyState === 4) {
 if (xhr.status == 200) {
					let data = xhr.responseText.split("&");
 resolve(data[0]);
 } else {
 reject(chunkNumber);
 }
 }
 }

			xhr.upload.onprogress = function(ev) {
					if (ev.lengthComputable) {
						totalArray[chunkNumber]=ev.total;
						uploadedArray[chunkNumber]=ev.loaded ;
						let total=0;
						totalArray.forEach(myTotal);
						
						function myTotal(value){
							total+=value;
						}
						let loaded=0;
						uploadedArray.forEach(myLoaded);
						
						function myLoaded(value){
							loaded+=value;
						}
						//let cc = Math.round((ev.loaded / ev.total) *100/totalChunks);
						let cc = Math.round((loaded / total) *100);
						//let lastcc = Number.parseInt(prog.style.width);
						// cc= Math.round((cc+lastcc)/2);
						//if (cc >= 99) {
							//cc = 99;
						//}
						prog.innerHTML = cc + "%";
						if(cc<=10) {
							prog.style.width = 2 + "%";
						}else{
							prog.style.width = cc + "%";
						}
						
					}
				}
				xhr.open('POST', 'requests.php', true);
				xhr.send(formData);
					}
				},
				function(res){
					reject(chunkNumber);
				}
			);

 });
		
	}
	uploader3(fileId = "fileId", to, showUploadedPics = true, manage = false) {
		showLocation = "explorer" + to;
		let holder = document.createElement("div");
		holder.style.width = "100%";
		holder.style.backgroundColor = "aqua";

	
		let prog = document.createElement('div');
		prog.style.marginBottom = "20px";
		prog.id = "prog" + fileId;
		prog.style.width = "0%";
		prog.innerHTML = "";
		prog.style.backgroundColor = "blue";
		prog.className="text-center progress-bar progress-bar-striped progress-bar-animated";
		const chunkSize = 2 * 1024 * 1024; // اندازه تکه (در این مثال، 2MB)

		const file = document.getElementById(fileId).files[0]; // فایلی که بارگذاری میشود
		if (!(file && file.size > 0)) {
			alert('هیچ فایلی انتخاب نشده است');
			return;
		}
		prog.innerHTML = "0%";
		holder.appendChild(prog);


		document.getElementById(showLocation).after(holder);
		holder.before(file.name);
		let start = 0;
		let end = Math.min(chunkSize, file.size);
		var chunkNumber = 0;
		var totalChunks = Math.ceil(file.size / chunkSize);
		var loadedChunks = 0;
		var isLoadingFinish=false;
		while (start < file.size && isLoadingFinish==false) {
			let delayTime = 10;
			const chunk = file.slice(start, end); // قطعهای از فایل مورد نظر
			const formData = new FormData();
			formData.append('file', chunk);
			formData.append('chunkNumber', chunkNumber);
			formData.append('totalChunks', totalChunks);
			formData.append("name", file.name);
			formData.append("folder", selectedFolder);
			formData.append("reqType", "uploadBigFile");
			const xhr = new XMLHttpRequest();
				/*xhr.onload = function() {
					
					if (loadedChunks == totalChunks) {
						isLoadingFinish==true;
						prog.innerHTML = "100%";
						prog.style.width = "100%";
						prog.className="text-center text-bg-success";
						document.getElementById(fileId).files = null;
						document.getElementById(fileId).value = null;
					}
				}
				*/
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						let data = xhr.responseText.split("&");
						loadedChunks=data[0];
						if (loadedChunks == totalChunks) {
							isLoadingFinish=true;
							prog.innerHTML = "100%";
							prog.style.width = "100%";
							prog.className="text-center text-bg-success";
							document.getElementById(fileId).files = null;
							document.getElementById(fileId).value = null;
							if (showUploadedPics) {
								new pictures().getFolderImage(selectedFolder, to, manage);
							} else {
								if (showForSelect == true) {
									new pictures().getFolderFilesForSelect(selectedFolder, to, manage);
								} else {
									new pictures().getFolderFiles(selectedFolder, to, manage);
								}

							}
						}
					}
				}

				xhr.upload.onprogress = function(ev) {
					if (ev.lengthComputable && isLoadingFinish==false) {
						//let cc = Math.round((ev.loaded / ev.total) * (100 / totalChunks));
						let cc = Math.round((ev.loaded / ev.total) * (100 / totalChunks)+(loadedChunks*100/totalChunks));
						///cc = Number.parseInt(prog.style.width) + cc - Math.round(1/totalChunks);
						if (cc >= 99) {
							cc = 99;
						}
						prog.innerHTML = cc + "%";
						prog.style.width = cc + "%";
					}
				}
				xhr.onerror = function(e) {
					isLoadingFinish==true;
					prog.className="text-center text-bg-danger";
				
					
				}
				if(isLoadingFinish==false){
					xhr.open('POST', 'requests.php', true);
					xhr.send(formData);
				}
				


			chunkNumber++;
			start = end;
			end = Math.min(end + chunkSize, file.size);

			if (start == end) {
				document.getElementById(fileId).files = null;
				document.getElementById(fileId).value = null;
			}

		}
		
		//alert(chunkNumber);
	}				
 	postPromis(url,formData) {
 return new Promise(function (resolve, reject) {
 const request = new XMLHttpRequest();
 
 request.onreadystatechange = function (e) {
 if (this.readyState === 4) {
 if (this.status == 200) {
					//alert(this.response);
 resolve(this.response);
 } else {
 reject(this.status);
 }
 }
 }
 request.open('POST', url, true);
 request.send(formData);
 });
}
	uploader2(fileId = "fileId", to, showUploadedPics = true, manage = false) {
		showLocation = "explorer" + to;
		let holder = document.createElement("div");
		holder.style.width = "100%";
		holder.style.backgroundColor = "aqua";
		let prog = document.createElement('div');
		prog.style.marginBottom = "20px";
		prog.id = "prog" + fileId;
		prog.style.width = "0%";
		prog.innerHTML = "";
		prog.style.backgroundColor = "blue";

		const chunkSize = 2 * 1024 * 1024; // اندازه تکه (در این مثال، 2MB)

		const file = document.getElementById(fileId).files[0]; // فایلی که بارگذاری میشود
		if (!(file && file.size > 0)) {
			alert('هیچ فایلی انتخاب نشده است');
			return;
		}
		prog.innerHTML = "0%";
		holder.appendChild(prog);


		document.getElementById(showLocation).after(holder);
		holder.before(file.name);
		let start = 0;
		let end = Math.min(chunkSize, file.size);
		var chunkNumber = 0;
		var totalChunks = Math.ceil(file.size / chunkSize);
		var loadedChunks = 0;
		while (start < file.size) {
			const chunk = file.slice(start, end); // قطعهای از فایل مورد نظر
			const formData = new FormData();
			formData.append('file', chunk);
			formData.append('chunkNumber', chunkNumber);
			formData.append('totalChunks', totalChunks);
			formData.append("name", file.name);
			formData.append("folder", selectedFolder);
			formData.append("reqType", "uploadBigFile");
			let delayTime = 0 * totalChunks;
			setTimeout(function() {
				const xhr = new XMLHttpRequest();
				xhr.onload = function() {
					loadedChunks++;
					if (loadedChunks == totalChunks) {
		prog.innerHTML = "100%";
		prog.style.width = "100%";
		prog.style.backgroundColor = "green";
		document.getElementById(fileId).files = null;
		document.getElementById(fileId).value = null;
					}
				}
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {

					//let ccc = Math.ceil(xhr.responseText/totalChunks*100);

					let data = xhr.responseText.split("&");

					if (data[0] == totalChunks) {
			prog.innerHTML = "100%";
			prog.style.width = "100%";
			prog.style.backgroundColor = "green";
			document.getElementById(fileId).files = null;
			document.getElementById(fileId).value = null;
			if (showUploadedPics) {
new pictures().getFolderImage(selectedFolder, to, manage);
			} else {
if (showForSelect == true) {
	new pictures().getFolderFilesForSelect(selectedFolder, to, manage);
} else {
	new pictures().getFolderFiles(selectedFolder, to, manage);
}

			}

			//alert("بارگذاری تکمیل شد\n"+data[1]);
		}
					}
				}

				xhr.upload.onprogress = function(ev) {
					if (ev.lengthComputable) {
						let cc = Math.round((ev.loaded / ev.total) * (100 / totalChunks));
						cc = Number.parseInt(prog.style.width) + cc;
					if (cc >= 100) {
						cc = 99.9;
					}
					prog.innerHTML = cc + "%";
					prog.style.width = cc + "%";
					}
				}
				xhr.onerror = function(e) {
					prog.style.backgroundColor = "red";
					prog.innerHTML = cc + "%" + e;
				}
				xhr.open('POST', 'requests.php', true);
				xhr.send(formData);

			}, (chunkNumber - 1) * delayTime);


			chunkNumber++;
			start = end;
			end = Math.min(end + chunkSize, file.size);

			if (start == end) {
				document.getElementById(fileId).files = null;
				document.getElementById(fileId).value = null;
			}

		}

		//alert(chunkNumber);
	}
	askForDelete(data) {
		let a = confirm(" برای حذف اصل فایل دکمه تایید را بزنید");
		if (a == true) {
			const post2 = new XMLHttpRequest();
			let str2 = "requests.php?reqType=deleteFile&" + data;
			post2.onreadystatechange = function() {
				if (post2.readyState == 4 && post2.status == 200) {
					alert(post2.responseText);
				}
			}
			post2.open("GET", str2);
			post2.send();
		}

	}



				}
			</script>
		<?php
	}
	// وقتی روی موردی کلیک شود
	public static function putGotoSelectedIdInPage()
	{
	?>
		<script>
			function gotoSelectedId(id) {
				//location=("admin.php?selected_id="+id);
				location.assign("?selected_id=" + id);
			}
		</script>
	<?php
	}

	public static function putGotoByDataInPage()
	{
	?>
		<script>
			function gotoByData(data) {
				//location=("admin.php?selected_id="+id);
				location.assign("?" + data);
			}
		</script>
	<?php
	}



	// تابع مربوط به انتخاب رنگ را به صفحه اضافه می کند
	public static function putSetColorForJsInPage()
	{
	?>
		<script>
			function setColorFor(obj, targetId) {
				let tar = document.getElementById(targetId);
				if (obj.value.length == 6) {
	obj.value = "#" + obj.value;
				}
				if (obj.value.length == 7) {
	tar.value = obj.value;
				} else {
	alert("رنگ انتخاب شده اشتباه است");
				}

			}
		</script>
	<?php
	}

	public static function putDateTimeChekerJsInPage()
	{
	?>
		<script>
			function checkTarikh(a, obj) {
				let h = document.getElementById(obj.name);
				list = h.value.split("/");
				newSaat = "";
				if (a == 'y') {
	if (isNaN(obj.value)) obj.value = 1400;
	if (obj.value > 9999) obj.value = 1410;
	if (obj.value < 0) obj.value = 0;
	list[0] = obj.value;
				}
				if (a == 'm') {
	if (isNaN(obj.value)) obj.value = 1;
	if (obj.value > 12) obj.value = 12;
	if (obj.value < 1) obj.value = 1;
	list[1] = obj.value;
				}
				if (a == 'd') {
	if (isNaN(obj.value)) obj.value = 0;
	if (obj.value > 31) obj.value = 31;
	if (obj.value < 1) obj.value = 1;
	list[2] = obj.value;
				}
				newSaat = list.join("/");
				//alert(newSaat);
				h.value = newSaat;
			}

			function checkSaat(a, obj) {
				let h = document.getElementById(obj.name);
				list = h.value.split(":");
				newSaat = "";
				if (a == 'h') {

	if (isNaN(obj.value)) obj.value = 0;
	if (obj.value > 23) obj.value = 23;
	if (obj.value < 0) obj.value = 0;
	list[0] = obj.value;
				}
				if (a == 'i') {
	if (isNaN(obj.value)) obj.value = 0;
	if (obj.value > 59) obj.value = 59;
	if (obj.value < 0) obj.value = 0;
	list[1] = obj.value;
				}
				if (a == 's') {
	if (isNaN(obj.value)) obj.value = 0;
	if (obj.value > 59) obj.value = 59;
	if (obj.value < 0) obj.value = 0;
	list[2] = obj.value;
				}
				newSaat = list.join(":");
				//alert(newSaat);
				h.value = newSaat;
			}
		</script>
	<?php
	}



	// یک تابع تعریف می کند برای رمزگشایی اشیای اچ تی ام ال در زبان جاواسکریپت
	public static function putDecodeEntitiesJsInPage()
	{
	?>
		<script>
			var decodeEntities = (function() {
				// this prevents any overhead from creating the object each time
				let element = document.createElement('div');

				function decodeHTMLEntities(str) {
	if (str && typeof str === 'string') {
		// strip script/html tags
		str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
		str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
		element.innerHTML = str;
		str = element.textContent;
		element.textContent = '';
	}

	return str;
				}

				return decodeHTMLEntities;
			})();
		</script>
	<?php
	}

	// کتابخانه قابل عیب یابی جیکوئری را به صفحه اضافه می کند
	public static function putJqueryInPage()
	{
	?>
		<script src="src/jquery/jquery.3.7.js"></script>

	<?php
	}

	// کتابخانه جیکوئری را به صفحه اضافه می کند
	public static function putJqueryMiniInPage()
	{
	?>
		<script src="src/jquery/jquery.min.3.7.js"></script>

	<?php
	}


	// توابع قابل عیب یابی مربوط به مرتب کردن اشیا با موس را اضافه می کند به صفحه
	public static function putSortableJsInPage()
	{
	?>
		<script src="src/sortable/sortable.js"></script>

	<?php
	}

	// توابع مربوط به مرتب کردن اشیا با موس را اضافه می کند به صفحه
	public static function putSortableJsMiniInPage()
	{
	?>
		<script src="src/sortable/sortable.min.js"></script>

	<?php
	}

	// توابع مربوط به سیکا ادیتور را به صفحه اضافه می کند
	public static function putCkeditor4JsInPage()
	{
	?>
		<script src="src/ckeditor/v4/ckeditor.js"></script>
	<?php
	}

	// قرار دادن فایل مربوط به کراپر جی اس در صفحه
	public static function putCropperJsInPage()
	{
	?>
		<link rel="stylesheet" href="src/cropperjs-main/main/cropper.css">
		<script src="src/cropperjs-main/main/cropper.js"></script>
	<?php
	}
	// بارگذاری تصویر و برش آن قبل از بارگذاری 
	public static function showCropperForUploadPicture2($id = "noId")
	{
	?>

		<style>
			.label {
				cursor: pointer;
			}

			.progress {
				display: none;
				margin-bottom: 1rem;
			}


			.img-container img {
				max-width: 100%;
			}
		</style>
		<label class="label btn btn-secondary btn-sm m-1" data-toggle="tooltip" title="برای انتخاب عکس کلکیک کنید">
			بارگذاری تصویر جدید
			<input type="file" class="sr-only d-none" id="inputCropper<?= $id; ?>" name="image" accept="image/*">
		</label>
		<div class="col-12 ">
			<div style="max-width: 15%; ">
				<img class="rounded d-none" style="max-width: 100%;" id="avatar<?= $id; ?>" src="" alt="avatar">
			</div>

			<div class="alert" id="alertCropper<?= $id; ?>" role="alert"></div>
			<div class="progress w-100 m-0 p-0">
				<div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
			</div>
		</div>
		<div class="modal fade" id="modalCropper<?= $id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id; ?>" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="modalLabelCropper<?= $id; ?>" data-bs-target="<?= $id ?>">برش تصویر</h5>
		<button type="button" class="btn-close" data-bs-target="<?= $id ?>" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
		<div class="img-container ">
			<img id="image<?= $id; ?>" style="width: 100%; " alt="">
		</div>
	</div>
	<div class="modal-footer">
		<div class="btn-group d-flex flex-nowrap" data-toggle="buttons" dir="ltr">
			<label class="btn btn-outline-primary" onClick="imageRatio=1.7777777777777777;">
				<input type="radio" class="sr-only" name="aspectRatio" value="1.7777777777777777">
				<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
					16:9
				</span>
			</label>
			<label class="btn btn-outline-primary" onClick="imageRatio=1.3333333333333333;">
				<input type="radio" class="sr-only" name="aspectRatio" value="1.3333333333333333">
				<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
					4:3
				</span>
			</label>
			<label class="btn btn-outline-primary" onClick="imageRatio=1;">
				<input type="radio" class="sr-only" name="aspectRatio" value="1">
				<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
					1:1
				</span>
			</label>
			<label class="btn btn-outline-primary" onClick="imageRatio=0.6666666666666666;">
				<input type="radio" class="sr-only" name="aspectRatio" value="0.6666666666666666">
				<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
					2:3
				</span>
			</label>
			<label class="btn btn-outline-primary " onClick="imageRatio=0.00000000000000000;">
				<input type="radio" class="sr-only" checked name="aspectRatio" value="NaN">
				<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
					آزاد
				</span>
			</label>
		</div>
		<div>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بی خیال</button>
			<button type="button" data-bs-target="<?= $id ?>" class="btn btn-primary" id="crop<?= $id; ?>">برش و بارگذاری</button>

		</div>

	</div>
				</div>
			</div>
		</div>
		<script>
			var imageRatio = -1;
			var cropper;
			window.addEventListener('DOMContentLoaded', function() {
				var avatar = document.getElementById('avatar<?= $id; ?>');
				var image = document.getElementById('image<?= $id; ?>');
				var input = document.getElementById('inputCropper<?= $id; ?>');
				var $progress = $('.progress');
				var $progressBar = $('.progress-bar');
				var $alert = $('#alertCropper<?= $id; ?>');
				var $modal = $('#modalCropper<?= $id; ?>');


				//$('[data-toggle="tooltip"]').tooltip();

				input.addEventListener('change', function(e) {
	var files = e.target.files;
	var done = function(url) {
		input.value = '';
		image.src = url;
		$alert.hide();
		$modal.modal('show');
	};
	var reader;
	var file;
	var url;

	if (files && files.length > 0) {
		file = files[0];

		if (URL) {
			done(URL.createObjectURL(file));
		} else if (FileReader) {
			reader = new FileReader();
			reader.onload = function(e) {
				done(reader.result);
			};
			reader.readAsDataURL(file);
		}
		image.setAttribute("name", file.name);
		let text = document.createElement("h6");
		text.id = "imageName<?= $id; ?>";
		if (!document.getElementById(text.id)) {
			avatar.after(text);
		} else {

		}
		document.getElementById(text.id).innerHTML = file.name;
	}
				});

				$modal.on('shown.bs.modal', function() {
	var minCroppedWidth = 320;
	var minCroppedHeight = 320;
	var maxCroppedWidth = 2000;
	var maxCroppedHeight = 1000;
	var lastW = 320;
	var lastH = 320;

	cropper = new Cropper(image, {
		aspectRatio: -1,
		autoCropArea: 1,
		viewMode: 3,
		zoomable: true,

		data: {
			width: (minCroppedWidth),
			height: (minCroppedHeight),
		},
		crop: function(event) {
			var width = Math.round(event.detail.width);
			var height = Math.round(event.detail.height);
			if (imageRatio > 0) {
				width = imageRatio * height;
				cropper.setData({
					width: width,
					height: height,
				});
			}
			if ((width * height) > (2 * 1024 * 1024)) {
				//cropper.setData({ width: lastW, height: lastH, });
			} else {
				lastW = width;
				lastH = height;
			}





		},

	});
				}).on('hidden.bs.modal', function() {
	cropper.destroy();
	cropper = null;
				});

				document.getElementById('crop<?= $id; ?>').addEventListener('click', function() {
	var initialAvatarURL;
	var canvas;

	$modal.modal('hide');

	if (cropper) {
		canvas = cropper.getCroppedCanvas({
			 width: 650,
			 height: 650
		});
		initialAvatarURL = avatar.src;
		avatar.src = canvas.toDataURL();
		$progress.show();
		$alert.removeClass('alert-success alert-warning');
		canvas.toBlob(function(blob) {

			var formData = new FormData();

			formData.append('avatar', blob, image.name);
			$.ajax('requests.php?reqType=croppedImage', {
				method: 'POST',
				data: formData,
				processData: false,
				contentType: false,

				xhr: function() {
					var xhr = new XMLHttpRequest();

					xhr.upload.onprogress = function(e) {
		var percent = '0';
		var percentage = '0%';

		if (e.lengthComputable) {
			percent = Math.round((e.loaded / e.total) * 100);
			percentage = percent + '%';
			$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
		}
					};

					return xhr;
				},

				success: function() {


					avatar.classList.remove("d-none");
				},

				error: function() {
					avatar.classList.add("d-none");
					avatar.src = initialAvatarURL;
					$alert.show().addClass('alert-warning').text('خطا در بارگذاری ');
				},

				complete: function(xhr, state) {
					if (state == "success") {

		$alert.show().addClass('alert-success').text(xhr.responseText);
		$element = document.getElementById('<?= $id ?>');
		if ($element) {
			alert($element);
		}

					}

					$progress.hide();
				},
			});
		});
	}
				});
			});
		</script>


	<?php
	}
	// تابعی برای بررسی اندازه فایل قبل از بارگذاری 
	public static function putCheckFileSizaInPage2()
	{
	?>
		<script>
			function GetFileSize(fileid) {
				$('#' + fileid).bind('change', function() {

	//this.files[0].size gets the size of your file.
	alert(this.files[0].size);

				});
			}
		</script>
	<?php
	}

}
class FILES
{

	// این فایل برای مدیریت فایل و فولدر ها بدون نیاز به ftp است
	// همچنین برای نوشتن و خواندن از فایل متنی از این فایل استفاده می شود
	// هر تابع در صورتی که صحیح اجرا شود یک مقدار ترو بر می گرداند
	public $uploaddir; // مسیر بارگذاری فایل
	public $fileName; // اسم اینپوتی است که از نوع فایل هست
	const ROOT_DIR = 'uploads'; // مسیر ریشه برای ساخت پوشه های بارگذاری می توانید این اسم را به دلخواه خود تغییر دهید
	public $album = ''; // در مسیر نهایی یک زیر پوشه ایجاد می کند
	public $error = 100;
	private $messageArray = array(); // پیغامی برای نتیجه بارگذاری فایل ها
	protected $defaultExtensions = ["jpg", "jpeg", "png", "pdf", "docx", "xlsx", "mp3", "mp4"];
	const BTN_DELETE_SHOW = "حذف";
	const BTN_SELECT_SHOW = "انتخاب";
	public function __construct()
	{
		// مقدار دهی اولیه اجزای کلاس یا شی
		$this->uploaddir = FILES::ROOT_DIR; // تنظیم آدرس و مسیر بارگذاری
		$this->makeDirIfNotExists(FILES::ROOT_DIR); // اگر مسیر وجود ندارد ساخته می شود
		$this->fileName = ''; // اسم فایل خالی می شود
		$this->album = ''; // زیر پوشه ندارد

	}
	function read($fileAddress, $nl2br = false)
	{
		if (file_exists($fileAddress)) {
			$f1 = fopen($fileAddress, "r");
			$str = "";
			while (!feof($f1)) {
				if ($nl2br == true) {
	$str .= fgets($f1) . "<br>";
				} else {
	$str .= fgets($f1);
				}
			}

			fclose($f1);
			return $str;
		} else {
			$this->error = true;
			$this->error = 1;
			$this->messageArray[] = "فایل مورد نظر یافت نشد";
			return '';

			//echo "فایل مورد نظر یافت نشد";
		}
	}

	function append($fileAddress, $matn)
	{
		$path = pathinfo($fileAddress);
		$this->makeDirIfNotExists($path['dirname']);
		$f1 = fopen($fileAddress, "a");
		fputs($f1, $matn . "\n");
		fclose($f1);
	}

	function overWrite($fileAddress, $matn)
	{
		$path = pathinfo($fileAddress);
		$this->makeDirIfNotExists($path['dirname']);
		$f1 = fopen($fileAddress, "w");
		fputs($f1, $matn . "\n");
		fclose($f1);
	}

	function makeDirIfNotExists($address)
	{

		if (file_exists($address)) {
			if (is_dir($address)) {
				return true;
			}
			$this->error = 2;
			$this->messageArray[] = "فایلی هم نام با پوشه $address وجود دارد";
			// آدرس ورودی آدرس فایلی است هم نام پوشه
			return false;
		} else {

			// ادرس ورودی 

			$ajza['dirname'] = $address;
		}


		$pusheha = explode('/', $ajza['dirname']);
		$listAddres = [];
		foreach ($pusheha as $pushe) {
			if ($pushe != '') {
				$listAddres[] = $pushe;
				$newAddres = implode("/", $listAddres);
				if (file_exists($newAddres)) {
	if (!is_dir($newAddres)) {
		$this->error = true;
		$this->error = 3;
		$this->messageArray[] = "فایلی هم نام با پوشه مدنظر وجود دارد";
		return false;
	}
	// آدرس ورودی آدرس فایلی است هم نام پوشه
				} else {
	// ادرس ورودی 
	mkdir($newAddres);
				}
			}
		}
		$newAddres = implode("/", $listAddres);
		return $newAddres;
	}

	function deleteFile($fileAddress)
	{
		if (file_exists($fileAddress)) {
			unlink($fileAddress);
			$this->error = 100;
			$this->messageArray[] = "حذف با موفقیت صورت گرفت";
		} else {
			$this->error = 100;
			$this->messageArray[] = "فایلی برای حذف با این نام وجود نداشت";
		}
		return true;
	}

	function deleteDir($dirAddress)
	{
		if (is_dir($dirAddress)) {
			$list = scandir($dirAddress);
			if (count($list) <= 2) {
				rmdir($dirAddress);
				$this->error = 100;
				$this->messageArray[] = "پوشه مد نظر حذف شد";
				return true;
				//echo "پوشه مد نظر حذف شد $dirAddress<br>";

			} else {
				$this->error = 4;
				$this->messageArray[] = "پوشه مد نظر خالی نیست";
				return false;
				//echo "پوشه مد نظر خالی نیست $dirAddress<br>";
			}
		} else {
			$this->error = 100;
			$this->messageArray[] = "چنین آدرسی از قبل وجود نداشت";
			return true;
			//echo "ادرس وارد شده غلط است<br>";
		}
	}

	function delete($address)
	{
		if (is_dir($address)) {
			// اگر پوشه بود
			$list = scandir($address);
			foreach ($list as $item) {
				if ($item != "." and $item != "..") {
	$newAddress = $address . '/' . $item;
	$this->delete($newAddress);
				}
			}
			$this->deleteDir($address);
		} elseif (file_exists($address)) {
			// اگر فایل بود
			$this->deleteFile($address);
		} else {
			// اگر اشتباه بود
			$this->error = 5;
			$this->messageArray[] = "ادرس وارد شده نا معتبر است.";
		}
	}

	public function getNewNameIfFileExist($fileAddress)
	{

		$parts = pathinfo($fileAddress); //دسترسی به اجزای آدرس فایل
		$i = 0;
		$newAddress = $fileAddress;
		while (file_exists($newAddress)) {
			// اضافه کردن شماره به نام های مثل هم
			$i++;
			if (isset($parts["extension"])) {
				$newAddress = $parts["dirname"] . '/' . $parts["filename"] . '(' . $i . ').' . $parts["extension"];
			} else {
				$newAddress = $parts["dirname"] . '/' . $parts["filename"] . '(' . $i . ')';
			}
		}
		return $newAddress;
	}
	
	public function copyFileOrFolder($address, $to = NULL)
	{
		$p = pathinfo($address);
		if (isset($p['extension'])) {
			$this->copyFile($address, $to);
		} else {
			$this->copyFolder($address, $to);
		}
	}
	
	public function copyFile($file, $to = NULL)
	{
		// file بایذ شامل اسم و ادرس کامل باشد
		if (!isset($to)) {
			// اگر اسم پوشه مقصد موجود نباشد در همان پوشه مبدا کپی می شود
			if (file_exists($file)) {
				$uploadfile = $this->getNewNameIfFileExist($file);
				if (copy($file, $uploadfile)) {
	$this->error = 100;
	$this->messageArray[] = "کپی با موفقیت انچام شد";
	return $uploadfile;
				} else {
	$this->error = 6;
	$this->messageArray[] = "حطا در کپی کردن فایل";
				}
			} else {
				$this->error = 7;
				$this->messageArray[] = "فایل پیدا نشد";
			}
		}
		else {
			// در پوشه چدید کپی می شود
			$this->makeDirIfNotExists($to);
			if (file_exists($file)) {
				$parts = pathinfo($file); //دسترسی به اجزای آدرس فایل
				if (isset($parts["extension"])) {
					$uploadfile = $to . '/' . $parts["filename"] . '.' . $parts["extension"];
				} else {
					return false;
				}

				$uploadfile = $this->getNewNameIfFileExist($uploadfile);
				if (copy($file, $uploadfile)) {
					$this->error = 100;
					$this->messageArray[] = "کپی با موفقیت انچام شد";
					return $uploadfile;
				} else {

					$this->error = 6;
					$this->messageArray[] = "حطا در کپی کردن فایل";
				}
			} else {
				$this->error = 7;
				$this->messageArray[] = "فایل پیدا نشد";
			}
		}

		return '';
	}
	
	public function copyFolder($folder, $to = NULL)
	{
		if (isset($to) && $to != "") {
			// مقصد مشخص شده است
			$masirList = explode("/", $folder);
			$newTo = $to . '/' . end($masirList);
		}
		else {
			$newTo = $this->getNewNameIfFileExist($folder);
		}
		$this->makeDirIfNotExists($newTo);
		$list = scandir($folder);
		foreach ($list as $item) {
			if ($item != "." and $item != "..") {
				$p = pathinfo($item);
				if (isset($p['extension'])) {
					// کپی کردن فایل ها در مقصد
					$subFile = $folder . '/' . $item;
					$this->copyFile($subFile, $newTo);
				}
				else {
					// کپی کردن پوشه ها در مقصد
					$subFolder = $folder . '/' . $item;
					$this->copyFolder($subFolder, $newTo);
				}
			}
		}
	}
	
	public function changeDir($directory)
	{
		// پوشه فعال را به آدرسی که تحویل داده شده، تغییر می دهد
		// شبیه جابجا شدن درون پوشه های کامپیوتر خودتان

		//دستور تغییر مسیر
		//chdir
		// مخفف دو کلمه 
		// change directory 
		// است به معنای: مسیر را تغییر بده
		if (chdir($directory)) {
			//دستوراتی که در صورت تغییر مسیر اجرا می شوند
			$this->error = 100;
			$this->messageArray[] = "ادرس جاری سیستم : " . getcwd();
			return true;
		} else {
			// دستوراتی که درصورت مشکل رخ دادن در تغییر مسیر اجرا می شوند
			$this->error = 8;
			$this->messageArray[] = "تغییر پوشه جاری ممکن نیست";
			return false;
		}
	}
	
	public function upload_file($file_name, $extensions = [], $dir = NULL)
	{
		$extensions = (is_array($extensions) && count($extensions)) ? $extensions : $this->defaultExtensions;
		// این تابع برای بارگذاری هر نوع فایلی در سرور طراحی شده
		// بیاد داشته باشید حداکثر حجم قابل بارگذاری توسط سرور به 2 مگا بایت محدود هست 
		// برای بارگذاری فایل های با حجم زیاد این تابع کاربرد ندارد
		// به صورت پیش فرض نوع فایل مجاز پی دی اف و یا ورد در نظر گرفته شده است
		// آیا فایل ارسال شده است؟
		if (!$this->isFileSent($file_name)) : $this->error = 9;
			$this->messageArray[] = "فایلی ارسال نشده است";
			return false;
		endif;

		// آیا پسوند فایل مجاز است؟
		if (!$this->isExtentionAllowed($file_name, $extensions)) : $this->error = 10;
			$this->messageArray[] = "پسوند فایل ارسالی مجاز نیست";
			return false;
		endif;

		// آیا اندازه فایل مجاز است؟
		if (!$this->isFileSized($file_name)) : $this->error = 11;
			$this->messageArray[] = "اندازه فایل ارسالی بیش از اندازه مجاز است";
			return false;
		endif;


		//	در ادامه نیز نام فایل بررسی و جابجایی از پوشه موقت به مسیر دلخواه اتفاق خواهد افتاد
		if (isset($dir)) {
			$this->uploaddir = ($this->album != '') ? $dir . '/' . $this->album : $dir;
		} else {
			$this->uploaddir = ($this->album != '') ? $this->uploaddir . '/' . $this->album : $this->uploaddir;
		}

		if (!$this->makeDirIfNotExists($this->uploaddir)) {
			$this->error = 12;
			$this->messageArray[] = "خطا در ساخت پوشه برای بارگذاری";
			return false;
		}

		$uploadfile = $this->uploaddir . '/' . basename($_FILES["$file_name"]['name']);
		$parts = pathinfo($uploadfile); //دسترسی به اجزای آدرس فایل
		$i = 0;
		while (file_exists($uploadfile)) {
			// اضافه کردن شماره به نام های مثل هم
			$i++;
			$uploadfile = $this->uploaddir . '/' . $parts["filename"] . '(' . $i . ').' . $parts["extension"];
		}

		if (move_uploaded_file($_FILES["$file_name"]['tmp_name'], "$uploadfile")) {
			// اگر جابجایی به درستی صورت گیرد
			$this->fileName = $uploadfile;
			$this->error = 100;
			$this->messageArray[] = "بارگذاری با موفقیت صورت گرفت";
			return true;
		} else {
			// اگر جابجایی شکست بخورد
			$this->error = 13;
			$this->messageArray[] = "جابجا کردن فایل به پوشه اصل شکست خورد";
			return false;
		}
	}
	
	private function isFilePicture($file_name)
	{

		// نوع فایل را بررسی می کند مشابه تابع قبلی
		// اگر نوع 
		//image
		// بود یک ترو و در غیر این صورت یک فالس بر می گرداند
		$res = false;
		$this->error = -2;
		if ($this->isFileSent($file_name)) :
			$a = '' . $_FILES["$file_name"]['type'];
			$aa = explode('/', $a);
			if ($aa[0] == 'image') {
				$res = true;
			}
		endif;
		return $res;
	}
	
	private function isExtentionAllowed($file_name, $extensions = [])
	{
		$extensions = (is_array($extensions) && count($extensions)) ? $extensions : $this->defaultExtensions;

		// این تابع تعدادی پسوند به عنوان ورودی می گیرد و چک می کند که آیا پسوند فایل یکی از آنها هست یا نه
		// در صورت بودن ترو و در غیر این صورت فالس بر می گرداند
		$this->error = -3;
		$parts = pathinfo($_FILES["$file_name"]['name']);;
		//$extensions=['tif'];
		$res = false;
		for ($i = 0; $i < count($extensions); $i++) {
			if (strtolower($extensions[$i]) == strtolower($parts["extension"])) {
				$res = true;
				$this->error = 3;
			}
		}
		return $res;
	}
	
	private function isFileSized($file_name)
	{
		// این تابع حجم فایل ارسالی را بررسی می کند و
		// اگر حجم فایل ارسالی بیشتر از 2 مگا بایت باشد فالس و در غیر این صورت ترو بر می گرداند
		$res = true;
		$a = $_FILES["$file_name"]['size'];
		if ($a > 2000000 || $a <= 0) {
			$res = false;
			$this->error = 14;
			$this->messageArray[] = "حجم فایل ارسالی بیش از اندازه است";
		} else {
			$this->error = 100;
			$this->messageArray[] = "حجم فایل ارسالی اندازه است";
		}
		return $res;
	}
	
	private function isFileSent($file_name)
	{

		// بررسی می کند که آیا کار بر از طریق فرم فایلی را ارسال کرده است یا نه
		// اگر اسم درمتد پست و گت باشد یعنی فایل ارسال نشده است
		$res = false;

		// آیا داد های دریافتی شامل اسم فایل مد نظر هستند یا نه
		if (isset($_REQUEST["$file_name"])) :
			// اسم مد نظر از طریق کاربر ارسال شده باشه
			$res = false;
			$this->error = 15;
			$this->messageArray[] = "اسم اینپوت با نوع فایل در بین دیگر داده ها تکرار شده است";
		else :
			// اگر اسم مد نظر ارسال نشده باشد

			// بررسی می کند که آیا فایلی با اسم مد نظر درون آرایه 
			//$_FILES
			// که یک متغییر سراسری
			// php 
			// هست وجود دارد یا نه؟ 
			if ($_FILES["$file_name"]['name'] == "" || $_FILES["$file_name"]['name'] == null) {
				// اگر درون آرایه سراسری نباشد یعنی
				//'هیچ فایلی انتخاب نشده است'
				$res = false;
				$this->error = 16;
				$this->messageArray[] = "هیچ فایلی انتخاب نشده است";
			} else {
				// اگر درون آرایه سراسری باشد یعنی 
				// کاربر به درستی فایل را ارسال کرده است
				$this->error = 100;
				$this->messageArray[] = "فایل ارسال شده است";
				$res = true;
			}

		// پایان شرط
		endif;

		// برگرداندن نتایج
		return $res;
	}
	
	private function getFileType($file_name)
	{
		// این تابع نوع فایل را برمی گرداند
		// 
		$res = '';
		if ($this->isFileSent($file_name)) :

			$a = '' . $_FILES["$file_name"]['type'];
			// خروجی کد بالا شبیه
			// image/gpeg
			// خواهد بود پس آن را با دستور زیر به دو قسمت می کنیم
			$aa = explode('/', $a);
			// نتیجه به صورت زیر می شود
			// ["image","gpeg" ]

			// ما با عضو اول آرایه کار خواهیم داشت
			// image

			$res = $aa[0];
		endif;
		return $res;
	}
	
	public function getDirFiles($directory, $extensions = [])
	{
		$extensions = (is_array($extensions) && count($extensions)) ? $extensions : [];

		// لیست فایل ها با پسوند های خاص را بر می گرداند
		// پسوند های مجاز باید به عنوان وردی تحویل این تابع شوند
		// اگر پسوند ها تحویل نشوند هر پسوندی پذیرفته می شود

		// اگر آدرس فایل داده نشود یا خالی بماند
		// دستور 
		// getcwd() === get current watched directory گرفتن ادرس مشاهده شده جاری
		//آدرس فایل جاری سیستم را جایگزین آن می کند
		if (!isset($directory) || $directory == '' || $directory == null) {
			$directory = getcwd();
		}

		// آیا آدرس صحیح است؟
		if (is_dir($directory)) {
			// اطلاعات را اسکن کن و بدست بیار
			$contentsArray = scandir($directory);
			$matn1 = [];
			for ($i = 0; $i < count($contentsArray); $i++) {
				// دسترسی به اجزای فایل ها
				// $parts
				// یک آرایه خواهد بود
				$parts = pathinfo($contentsArray[$i]);

				// نتایجی که پسوند آنها در لیست پسوند های تحویلی این تابع باشد را جدا می کند
				if (count($extensions)) {
	//اگر پسوندی ارسال شود
	for ($j = 0; $j < count($extensions); $j++) {

		// دستور 
		//strtolower
		// حروف بزرگ انگلیسی را به حروف کوچک تبدیل می کند

		if (isset($parts["extension"]) && strtolower($extensions[$j]) == strtolower($parts["extension"])) {

			// اگر پسوند فایل مجاز یود 
			// داده به نتایج اضافه می شود
			$matn1[] = $contentsArray[$i];
		}
	}
				} else {
	if (isset($parts["extension"])) {
		// اگر داده فایل بود نه پوشه 
		// داده به نتایج اضافه می شود
		$matn1[] = $contentsArray[$i];
	}
				}
			}
			// نتایج برگردانده می شود
			return $matn1;
		} else {
			// اگر آدرس غلط باشد آرایه خالی بر می گرداند
			return [];
		}
	}
	
	public function getDirPictures($directory)
	{
		return $this->getDirFiles($directory, ['jpg', 'jpeg', 'gif', 'png', 'bmp','webp','jfif']);
	}
	
	public function getDirFolders($directory)
	{
		// اگر آدرس فایل داده نشود یا خالی بماند
		// دستور 
		// getcwd() === get current watched directory گرفتن ادرس مشاهده شده جاری
		//آدرس فایل جاری سیستم را جایگزین آن می کند
		if (!isset($directory) || $directory == '' || $directory == null) {
			$directory = getcwd();
		}

		// آیا آدرس صحیح است؟
		if (is_dir($directory)) {
			// اطلاعات را اسکن کن و بدست بیار
			$contentsArray = scandir($directory);
			$matn1 = [];
			for ($i = 0; $i < count($contentsArray); $i++) {
				// دسترسی به اجزای فایل ها
				// $parts
				// یک آرایه خواهد بود
				$parts = pathinfo($contentsArray[$i]);
				if (!isset($parts["extension"])) {
	// اگر داده فایل بود نه پوشه 
	// داده به نتایج اضافه می شود
	$matn1[] = $contentsArray[$i];
				}
			}
			// نتایج برگردانده می شود
			return $matn1;
		} else {
			// اگر آدرس غلط باشد آرایه خالی بر می گرداند
			return [];
		}
	}
	
	public function getDirList($directory = null)
	{
		//این تابع لیست اسامی فایل های موجود درون یک پوشه را برمی گرداند 

		// اگر آدرس فایل داده نشود یا خالی بماند
		// دستور 
		// getcwd() === get current watched directory گرفتن ادرس مشاهده شده جاری
		//آدرس فایل جاری سیستم را جایگزین آن می کند
		if (!isset($directory) || $directory == '' || $directory == null) {
			$directory = getcwd();
		}
		// ابتدا چک می کنه ببینه آدرس پوشه صحیح است یا نه
		if (is_dir($directory)) {

			// اگر آدرس صحیح بود دستور زیر محتویات پوشه را اسکن یا جستجو کرده و لیست آن را برمی گرداند
			$contentsArray = scandir($directory);

			// نتایج به عنوان خروجی برگردانده می شود
			return $contentsArray;
		} else {

			// اگر آدرس غلط باشد یک آرایه خالی برگردانده می شود
			return [];
		}
	}
	
	public function showDirFolders($directory = '', $extensions = [], $option = [])
	{
		$selectedAddress = (isset($directory) && $directory != "") ? $directory : self::ROOT_DIR;

		$add = explode("/", $selectedAddress);
		$len = (count($add) - 1);
		$back = "";
		for ($i = 0; $i < $len; $i++) {
			if ($i == 0) {
				$back .= $add[$i];
			} else {
				$back .= '/' . $add[$i];
			}
		}
		if (is_file($selectedAddress)) {

			//header("location:$selectedAddress");

			//echo $this->read($selectedAddress);
			$selectedAddress = $back;
		}
		if (isset($_REQUEST['deleteSelected'])) {
			$this->delete($_REQUEST['deleteSelected']);
		}

		$list = $this->getDirList($selectedAddress);

	?>
		<div class="w-100 p-0 m-0">
			<div class="col-md-12">
				<div dir="ltr">
	<?php
		$addressList = explode("/", $selectedAddress);
		$ll = [];
		foreach ($addressList as $itemAddress) {
			$ll[] = $itemAddress;
			$helpAddress = implode("/", $ll);
			echo "<a class='btn btn-sm mt-1 m-0 p-0' href='?newaddress=$helpAddress'>$itemAddress</a>";
			if ($helpAddress != $selectedAddress) echo "/";
		} ?>
	<hr>
				</div>
				<?php
		if (count($list) <= 2) {
			echo "<h4 class='alert alert-info'>پوشه خالی است</h4>";
			return true;
		}
				?>
				<div class="table-responsive">
	<table class="table">
		<tbody>

			<?php
		foreach ($list as $item) {



			if ($item == "." || $item == "..") {
				if ($item == "..") {
	//echo "<a href='?address=$address'> برگشت به پوشه قبلی</a><br>";
				} else {
	//echo "<a href='?address=$item'> اصلی</a><br>";
				}
			} else {
				if (isset($selectedAddress) && $selectedAddress != "") {
	$address = $selectedAddress . '/' . $item;
				} else {
	$address = $item;
				}
				$btnSelect = "";
				if (in_array(self::BTN_SELECT_SHOW, $option)) {
	$btnSelect = " <a class='btn btn-sm btn-info' href='?newaddress=$selectedAddress&selectedItem=$address'>" . self::BTN_SELECT_SHOW . "</a>";
				}
				if (in_array(self::BTN_DELETE_SHOW, $option)) {
	$btnSelect .= " <a class='btn btn-danger btn-sm ' href='?newaddress=$selectedAddress&deleteSelected=$address'>" . self::BTN_DELETE_SHOW . "</a> ";
				}
				$btnOpen = "<a class='btn btn-light ' href='?newaddress=$address'>" . ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder2" viewBox="0 0 16 16"><path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/></svg> ' . "$item</a>";
				$showFlag = false;
				$parts = pathinfo($item);
				if (isset($parts["extension"])) {
	if (count($extensions)) {
		foreach ($extensions as $extension) :
			if ((strtolower($extension) == strtolower($parts["extension"]))) {
				$showFlag = true;
			}
		endforeach;
		if ($showFlag) {
			$btnOpen = " <a class='btn btn-sm btn-light' target='_blank' href='$address'>$item</a>";
		} else {
			$btnOpen = "";
		}
	} else {
		$btnOpen = " <a class='btn btn-sm btn-light' target='_blank' href='$address'>$item</a>";
		$showFlag = true;
	}
				} else {

	$showFlag = true;
	$btnSelect = "";
				}

				if ($showFlag) {
			?><tr>
			<td><?php echo $btnOpen . ' ' . $btnSelect; ?></td>
		</tr>
			<?php
				}
			}
		}
			?>


		</tbody>

	</table>


				</div>

			</div>
		</div>
	<?php


	}
	
	public function showErrorMessage($all = false)
	{
		if (isset($all) and $all == true) {
			$res = "";
			foreach ($this->messageArray as $mes) {
				$res .= "<div class='alert alert-warning m-2'>" . $mes . "</div>";
			}
			return $res;
		} else {
			if (count($this->messageArray) && $this->error != 100) return "<div class='alert alert-warning m-2'>" . end($this->messageArray) . "</div>";
		}
	}
	
	public function show_folder_maker_box($dir = NULL)
	{

		// این تابع یک فرم برای بارگذاری فایل با پسوند دلخواه ایجاد کرده است
		// کافی است اسم پوشه و پسوند های مد نظر خود را به آن بدهید
	?>
		<form class="w-100" method="get" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
			<?php
		if (isset($_REQUEST['create'])) {
			if (isset($dir)) {
				$this->makeDirIfNotExists($dir . '/' . $_REQUEST['newfolder']);
			} else {
				$this->makeDirIfNotExists($_REQUEST['newfolder']);
			}

			echo $this->showErrorMessage();
		}
		if (isset($_REQUEST['deletefolder'])) {
			if (isset($dir) && $dir != "") {

				$this->deleteDir($dir . '/' . $_REQUEST['newfolder']);
			} else {

				$this->deleteDir($_REQUEST['newfolder']);
			}

			echo $this->showErrorMessage();
		}
			?>
			<div class="input-group" dir="ltr">

				<input class="form-control" type="text" pattern="^[a-zA-Zا-ی]+[0-9a-zA-Zا-ی]*" name="newfolder" value="newfolder">
				<label class="input-group-text text-danger">نام پوشه</label>
			</div>
			<input type="hidden" name="newaddress" value="<?= $dir ?>">
			<button class="btn btn-info m-2" type="submit" name="create">ایجاد</button>
			<button class="btn btn-danger m-2" type="submit" name="deletefolder">حذف</button>

		</form>

	<?php
	}
	
	public function show_file_upload_box($dirctory = NULL, $album = NULL, $extensions = [])
	{
		$dir = (isset($dirctory) && $dirctory != "") ? $dirctory : self::ROOT_DIR;
		$extensions = (is_array($extensions) and count($extensions) > 0) ? $extensions : $this->defaultExtensions;
		// این تابع یک فرم برای بارگذاری فایل با پسوند دلخواه ایجاد کرده است
		// کافی است اسم پوشه و پسوند های مد نظر خود را به آن بدهید
		$this->album = $album;
	?>

		<form class=" w-100" method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
			<?php
		if (isset($_REQUEST['load_file'])) {
			$this->upload_file('laoded_file', $extensions, $dir);
			echo $this->showErrorMessage();
		}
			?>
			<div class=" p-1 m-2">
				حجم مجاز: <span class="">2m</span><br>
				پسوند های مجاز: <span class=""><?php foreach ($extensions as $ext) {
			echo ' ' . $ext . ' ';
		} ?></span>
			</div>
			<div class="input-group" dir="ltr">
				<input class="form-control" type="file" name="laoded_file">

			</div>


			<div class=" p-1">
				<input type="hidden" name="newaddress" value="<?= $dir ?>">
				<button class="btn btn-info" type="submit" name="load_file">بارگذاری</button>
			</div>

		</form>

	<?php
	}
	
	public function editPage()
	{
	?>
		<div class="row m-0 p-0 min-vh-100">
			<?php
		$dir = (isset($_REQUEST["newaddress"]) && $_REQUEST["newaddress"] != "") ? $_REQUEST["newaddress"] : self::ROOT_DIR;
			?>
			<div class="col-md-4 bg-light rounded border p-0 p-md-2">
				<h4>پوشه ها</h4>
				<?php $this->show_folder_maker_box($dir); ?>
				<hr>
				<h4>بارگذاری فایل</h4>
				<?php $this->show_file_upload_box($dir); ?>
			</div>
			<div class="col-md-8">
				<h4>محتویات پوشه:</h4>
				<?php $this->showDirFolders($dir, [], [self::BTN_DELETE_SHOW, self::BTN_SELECT_SHOW]); ?>
			</div>
		</div>
	<?php
	}
}
class FILES_VIEW extends FILES
{
	// تابع راه اندازه سمت سرور
	public function __construct()
	{

		parent::__construct();
	}

	// مشاهده فایل های سایت
	public static function showForSelectFiles2($toId = "", $address = "", $title = "مشاهده فایل ها", $manage = true)
	{
		$add = (isset($address) && $address != "") ? $address : FILES::ROOT_DIR; ?>
		<div class="accordion accordion-flush " id="accordion<?= $toId ?>">
			<div class="accordion-item">
				<h2 class="accordion-header">
	<button class="accordion-button collapsed" style="background-color: #E5E5E5" onclick="document.getElementById('btn<?= $toId ?>').click();" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePic<?= $toId ?>" aria-expanded="false" aria-controls="collapsePic<?= $toId ?>">
		<?= $title ?>
	</button>
				</h2>
				<div id="collapsePic<?= $toId ?>" class="accordion-collapse collapse " data-bs-parent="#accordion<?= $toId ?>">
	<div class="accordion-body">
		<button type="button" id="btn<?= $toId ?>" class="btn d-none" value="<?= $add ?>" onclick="getFolderFiles(this.id,'<?= $add ?>','<?= $toId ?>',<?= $manage; ?>)"><?= $title ?></button>
	</div>
				</div>
			</div>
		</div>
	<?php
	}

	public static function showPicturesUploder($id, $title = "افزودن تصویر به محتوا", $manage = false)
	{
		?>
			<script>
				function cropPicture(id) {
	window.addEventListener('DOMContentLoaded', function() {
		var avatarHolder = document.getElementById('avatarHolder' + id);
		var avatar = document.getElementById('avatar' + id);
		avatar.classList.add('d-none');
		var image = document.getElementById('image' + id);
		var input = document.getElementById('inputCropper' + id);
		var $progress = $('#progress' + id);
		var $progressBar = $('#progress-bar' + id);
		var $alert = $('#alertCropper' + id);
		var $modal = $('#modalCropper' + id);


		//$('[data-toggle="tooltip"]').tooltip();

		input.addEventListener('change', function(e) {
			var files = e.target.files;
			var done = function(url) {
				input.value = '';
				image.src = url;
				$alert.hide();
				$modal.modal('show');
			};
			var reader;
			var file;
			var url;

			if (files && files.length > 0) {
				file = files[0];

				if (URL) {
					done(URL.createObjectURL(file));
				} else if (FileReader) {
					reader = new FileReader();
					reader.onload = function(e) {
		done(reader.result);
					};
					reader.readAsDataURL(file);
				}
				image.setAttribute("name", file.name);
				let text = document.createElement("h6");
				text.id = "imageName" + id;
				if (!document.getElementById(text.id)) {
					avatarHolder.after(text);
				} else {

				}
				document.getElementById(text.id).innerHTML = file.name;
			}
		});

		$modal.on('shown.bs.modal', function() {

			var lastW = 600;
			var lastH = 600;

			cropper = new Cropper(image, {
				aspectRatio: -1,
				autoCropArea: 1,
				viewMode: 3,
				zoomable: true,

				data: {
					width: (lastW),
					height: (lastW),
				},
				crop: function(event) {
					var width = Math.round(event.detail.width);
					var height = Math.round(event.detail.height);
					if (imageRatio > 0) {
		width = imageRatio * height;
		cropper.setData({
			width: width,
			height: height,
		});
					}
					if ((width * height) > (2 * 1024 * 1024)) {
		//cropper.setData({ width: lastW, height: lastH, });
					} else {
		lastW = width;
		lastH = height;
					}
				},
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		document.getElementById('crop' + id).addEventListener('click', function() {
			var initialAvatarURL;
			var canvas;

			$modal.modal('hide');

			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					 width: 650,
					 height: 650
				});
				avatar.classList.remove('d-none');
				initialAvatarURL = avatar.src;
				avatar.src = canvas.toDataURL();
				$progress.show();
				$alert.removeClass('alert-success alert-warning');
				canvas.toBlob(function(blob) {

					var formData = new FormData();

					formData.append('avatar', blob, image.name);
					formData.append("folder", selectedFolder);
					$.ajax('requests.php?reqType=croppedImage', {
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false,

		xhr: function() {
			var xhr = new XMLHttpRequest();

			xhr.upload.onprogress = function(e) {
var percent = '0';
var percentage = '0%';

if (e.lengthComputable) {
	percent = Math.round((e.loaded / e.total) * 100);
	percentage = percent + '%';
	$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
}
			};

			return xhr;
		},

		success: function() {


			avatar.classList.remove("d-none");
			new pictures().getFolderImage(selectedFolder, id, <?= $manage; ?>);
			avatarHolder.classList.add('d-none');
			avatar.classList.add("d-none");
		},

		error: function() {
			avatar.classList.add("d-none");
			avatar.src = initialAvatarURL;
			$alert.show().addClass('alert-warning').text('خطا در بارگذاری ');
		},

		complete: function(xhr, state) {
			if (state == "success") {
$alert.show().addClass('alert-success').text(xhr.responseText);
			}

			$progress.hide();
		},
					});
				});
			}
		});
	});
				}
			</script>
			<script>
				cropPicture('<?= $id; ?>');
			</script>

			<div class="accordion" id="accordionExample<?= $id; ?>">

				<div class="accordion-item">
	<h2 class="accordion-header">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItem<?= $id; ?>" aria-expanded="false" aria-controls="collapseItem<?= $id; ?>">
			<?= $title; ?>
		</button>
	</h2>
	<div id="collapseItem<?= $id; ?>" class="accordion-collapse collapse">
		<div class="accordion-body">
			<div class="btn btn-sm btn-secondary" onClick="clickBtn('bigFile<?= $id; ?>')">بارگذاری سند
				<input type="file" id="bigFile<?= $id; ?>" onChange="new pictures().uploader(this.id,'<?= $id; ?>',true,<?= $manage; ?>)" accept="image/*" class="d-none">
			</div>

			<label class="label btn btn-secondary btn-sm m-1" data-toggle="tooltip" title="برای انتخاب عکس کلکیک کنید">
				بارگذاری تصویر
				<input type="file" class="sr-only d-none" id="inputCropper<?= $id; ?>" name="image" accept="image/*">

			</label>



			<input type="button" onClick="const a<?= $id; ?> =new pictures(); a<?= $id; ?>.toId='<?= $id; ?>'; a<?= $id; ?>.getFolderImage('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="گالری تصاویر">

			<div id="explorer<?= $id; ?>" class="w-100 bg-light p-md-1" style="min-height: 20vh;">


			</div>
			<div class="col-12 ">
				<div style="max-width: 15%; " id="avatarHolder<?= $id; ?>">
					<img class="rounded " style="max-width: 100%;" id="avatar<?= $id; ?>" src="" alt="avatar">
				</div>

				<div class="alert" id="alertCropper<?= $id; ?>" role="alert"></div>
				<div class="progress w-100 m-0 p-0 d-none" id="progress<?= $id; ?>">
					<div id="progress-bar<?= $id; ?>" class="progress-bar progress-bar-striped progress-bar-animated d-none" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
				</div>
			</div>
			<div class="modal fade" id="modalCropper<?= $id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalLabelCropper<?= $id; ?>" data-bs-target="<?= $id; ?>">برش تصویر</h5>
			<button type="button" class="btn-close" data-bs-target="<?= $id; ?>" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="img-container ">
<img id="image<?= $id; ?>" style="width: 100%; " alt="">
			</div>
		</div>
		<div class="modal-footer">
			<div class="btn-group d-flex flex-nowrap" data-toggle="buttons" dir="ltr">
<label class="btn btn-outline-primary" onClick="imageRatio=1.7777777777777777;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.7777777777777777">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
		16:9
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1.3333333333333333;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.3333333333333333">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
		4:3
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
		1:1
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=0.6666666666666666;">
	<input type="radio" class="sr-only" name="aspectRatio" value="0.6666666666666666">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
		2:3
	</span>
</label>
<label class="btn btn-outline-primary " onClick="imageRatio=0.00000000000000000;">
	<input type="radio" class="sr-only" checked name="aspectRatio" value="NaN">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
		آزاد
	</span>
</label>
			</div>
			<div>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بی خیال</button>
<button type="button" data-bs-target="<?= $id; ?>" class="btn btn-primary" id="crop<?= $id; ?>">برش و بارگذاری</button>

			</div>

		</div>
					</div>
				</div>
			</div>
			<div id="result<?= $id; ?>">


			</div>


		</div>
	</div>
				</div>

			</div>




		<?php }
	
	public static function showFileUploder($id, $title = "مدیریت فایل ها", $manage = true)
	{
		?>
			<script>
				function cropPicture(id) {
	window.addEventListener('DOMContentLoaded', function() {
		var avatarHolder = document.getElementById('avatarHolder' + id);
		var avatar = document.getElementById('avatar' + id);
		avatar.classList.add('d-none');
		var image = document.getElementById('image' + id);
		var input = document.getElementById('inputCropper' + id);
		var $progress = $('#progress' + id);
		var $progressBar = $('#progress-bar' + id);
		var $alert = $('#alertCropper' + id);
		var $modal = $('#modalCropper' + id);


		//$('[data-toggle="tooltip"]').tooltip();

		input.addEventListener('change', function(e) {
			var files = e.target.files;
			var done = function(url) {
				input.value = '';
				image.src = url;
				$alert.hide();
				$modal.modal('show');
			};
			var reader;
			var file;
			var url;

			if (files && files.length > 0) {
				file = files[0];

				if (URL) {
					done(URL.createObjectURL(file));
				} else if (FileReader) {
					reader = new FileReader();
					reader.onload = function(e) {
		done(reader.result);
					};
					reader.readAsDataURL(file);
				}
				image.setAttribute("name", file.name);
				let text = document.createElement("h6");
				text.id = "imageName" + id;
				if (!document.getElementById(text.id)) {
					avatarHolder.after(text);
				} else {

				}
				document.getElementById(text.id).innerHTML = file.name;
			}
		});

		$modal.on('shown.bs.modal', function() {

			var lastW = 600;
			var lastH = 600;

			cropper = new Cropper(image, {
				aspectRatio: -1,
				autoCropArea: 1,
				viewMode: 3,
				zoomable: true,

				data: {
					width: (lastW),
					height: (lastW),
				},
				crop: function(event) {
					var width = Math.round(event.detail.width);
					var height = Math.round(event.detail.height);
					if (imageRatio > 0) {
		width = imageRatio * height;
		cropper.setData({
			width: width,
			height: height,
		});
					}
					if ((width * height) > (2 * 1024 * 1024)) {
		//cropper.setData({ width: lastW, height: lastH, });
					} else {
		lastW = width;
		lastH = height;
					}
				},
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		document.getElementById('crop' + id).addEventListener('click', function() {
			var initialAvatarURL;
			var canvas;

			$modal.modal('hide');

			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					 width: 650,
					 height: 650
				});
				avatar.classList.remove('d-none');
				initialAvatarURL = avatar.src;
				avatar.src = canvas.toDataURL();
				$progress.show();
				$alert.removeClass('alert-success alert-warning');
				canvas.toBlob(function(blob) {

					var formData = new FormData();

					formData.append('avatar', blob, image.name);
					formData.append("folder", selectedFolder);
					$.ajax('requests.php?reqType=croppedImage', {
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false,

		xhr: function() {
			var xhr = new XMLHttpRequest();

			xhr.upload.onprogress = function(e) {
var percent = '0';
var percentage = '0%';

if (e.lengthComputable) {
	percent = Math.round((e.loaded / e.total) * 100);
	percentage = percent + '%';
	$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
}
			};

			return xhr;
		},

		success: function() {


			avatar.classList.remove("d-none");
			new pictures().getFolderImage(selectedFolder, id, <?= $manage; ?>);
			avatarHolder.classList.add('d-none');
			avatar.classList.add("d-none");
		},

		error: function() {
			avatar.classList.add("d-none");
			avatar.src = initialAvatarURL;
			$alert.show().addClass('alert-warning').text('خطا در بارگذاری ');
		},

		complete: function(xhr, state) {
			if (state == "success") {
$alert.show().addClass('alert-success').text(xhr.responseText);
			}

			$progress.hide();
		},
					});
				});
			}
		});
	});
				}
			</script>
			<script>
				cropPicture('<?= $id; ?>');
			</script>
			<div class="accordion" id="accordionExample<?= $id; ?>">

				<div class="accordion-item">
	<h2 class="accordion-header">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItem<?= $id; ?>" aria-expanded="false" aria-controls="collapseItem<?= $id; ?>">
			<?= $title; ?>
		</button>
	</h2>
	<div id="collapseItem<?= $id; ?>" class="accordion-collapse collapse">
		<div class="accordion-body">
			<div class="row m-0 p-0 g-2 bg-light rounded shadow col-12 justify-content-center">
				<div class="col-12 text-center ">
					برای جابجایی یا کپی فایل ها را بکشید و رها کنید<br> برای حذف بر روی دکمه حذف رها کنید
				</div>
				<div class="col text-center">
					حذف
					<br><img class="sortable m-2 rounded border " id="deleteBox" src="src/site_images/delete.png" style="height: 100px;">
				</div>
				<div class="col text-center">
					پوشه جدید
					<br><img class=" m-2 rounded border sortable" id="addBox" onClick="new pictures().addFolder(selectedFolder,'<?= $id; ?>',<?= $manage; ?>)" src="src/site_images/add.jpg" style="height:100px;">
				</div>
				<div class="col text-center">
					انتقال به پوشه والد
					<br><img class="sortable m-2 rounded border " id="moveBox" src="src/site_images/updown.png" style="height:100px;">
				</div>
			</div>
			<div class="btn btn-sm btn-secondary" onClick="clickBtn('bigFile<?= $id; ?>')">بارگذاری فایل
				<input type="file" id="bigFile<?= $id; ?>" onChange="new pictures().uploader(this.id,'<?= $id; ?>',false,<?= $manage; ?>)" class="d-none">
			</div>

			<label class="label btn btn-secondary btn-sm m-1" data-toggle="tooltip" title="برای انتخاب عکس کلکیک کنید">
				بارگذاری تصویر
				<input type="file" class="sr-only d-none" id="inputCropper<?= $id; ?>" name="image" accept="image/*">

			</label>

			<input type="button" onClick="const b<?= $id; ?> =new pictures(); b<?= $id; ?>.toId='<?= $id; ?>'; b<?= $id; ?>.getFolderImage('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="گالری تصاویر">
			<input type="button" onClick="const a<?= $id; ?> =new pictures(); a<?= $id; ?>.toId='<?= $id; ?>'; a<?= $id; ?>.getFolderFiles('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="فایل ها">

			<div id="explorer<?= $id; ?>" class="w-100 bg-light p-md-1" style="min-height: 20vh;">


			</div>
			<div class="col-12 ">
				<div style="max-width: 15%; " id="avatarHolder<?= $id; ?>">
					<img class="rounded " style="max-width: 100%;" id="avatar<?= $id; ?>" src="" alt="avatar">
				</div>

				<div class="alert" id="alertCropper<?= $id; ?>" role="alert"></div>
				<div class="progress w-100 m-0 p-0 d-none" id="progress<?= $id; ?>">
					<div id="progress-bar<?= $id; ?>" class="progress-bar progress-bar-striped progress-bar-animated d-none" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
				</div>
			</div>
			<div class="modal fade" id="modalCropper<?= $id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalLabelCropper<?= $id; ?>" data-bs-target="<?= $id; ?>">برش تصویر</h5>
			<button type="button" class="btn-close" data-bs-target="<?= $id; ?>" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="img-container ">
<img id="image<?= $id; ?>" style="width: 100%; " alt="">
			</div>
		</div>
		<div class="modal-footer">
			<div class="btn-group d-flex flex-nowrap" data-toggle="buttons" dir="ltr">
<label class="btn btn-outline-primary" onClick="imageRatio=1.7777777777777777;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.7777777777777777">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
		16:9
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1.3333333333333333;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.3333333333333333">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
		4:3
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
		1:1
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=0.6666666666666666;">

	<input type="radio" class="sr-only" name="aspectRatio" value="0.6666666666666666">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
		2:3
	</span>
</label>
<label class="btn btn-outline-primary " onClick="imageRatio=0.00000000000000000;">
	<input type="radio" class="sr-only" checked name="aspectRatio" value="NaN">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
		آزاد
	</span>
</label>
			</div>
			<div>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بی خیال</button>
<button type="button" data-bs-target="<?= $id; ?>" class="btn btn-primary" id="crop<?= $id; ?>">برش و بارگذاری</button>

			</div>

		</div>
					</div>
				</div>
			</div>



		</div>
	</div>
				</div>

			</div>




		<?php }


	public static function showBigfileUploder($id, $title = "مدیریت فایل ها", $manage = true)
	{
		?>
			<div class="accordion" id="accordionExample<?= $id; ?>">

				<div class="accordion-item">
	<h2 class="accordion-header">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItem<?= $id; ?>" aria-expanded="false" aria-controls="collapseItem<?= $id; ?>">
			<?= $title; ?>
		</button>
	</h2>
	<div id="collapseItem<?= $id; ?>" class="accordion-collapse collapse">
		<div class="accordion-body">
			<div class="btn btn-sm btn-secondary" onClick="clickBtn('bigFile<?= $id; ?>')">بارگذاری فایل
				<input type="file" id="bigFile<?= $id; ?>" onChange="new pictures().uploader(this.id,'<?= $id; ?>',false,<?= $manage; ?>)" class="d-none">
			</div>
			<input type="button" onClick="const a<?= $id; ?> =new pictures(); a<?= $id; ?>.toId='<?= $id; ?>'; a<?= $id; ?>.getFolderFilesForSelect('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="فایل ها">

			<div id="explorer<?= $id; ?>" class="w-100 bg-light p-md-1" style="min-height: 20vh;">

			</div>
			<div class="col-12 ">
				<div style="max-width: 15%; " id="avatarHolder<?= $id; ?>">
					<img class="rounded " style="max-width: 100%;" id="avatar<?= $id; ?>" src="" alt="avatar">
				</div>

				<div class="alert" id="alertCropper<?= $id; ?>" role="alert"></div>
				<div class="progress w-100 m-0 p-0 d-none" id="progress<?= $id; ?>">
					<div id="progress-bar<?= $id; ?>" class="progress-bar progress-bar-striped progress-bar-animated d-none" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
				</div>
			</div>
			<div class="modal fade" id="modalCropper<?= $id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalLabelCropper<?= $id; ?>" data-bs-target="<?= $id; ?>">برش تصویر</h5>
			<button type="button" class="btn-close" data-bs-target="<?= $id; ?>" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="img-container ">
<img id="image<?= $id; ?>" style="width: 100%; " alt="">
			</div>
		</div>
		<div class="modal-footer">
			<div class="btn-group d-flex flex-nowrap" data-toggle="buttons" dir="ltr">
<label class="btn btn-outline-primary" onClick="imageRatio=1.7777777777777777;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.7777777777777777">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
		16:9
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1.3333333333333333;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.3333333333333333">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
		4:3
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
		1:1
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=0.6666666666666666;">

	<input type="radio" class="sr-only" name="aspectRatio" value="0.6666666666666666">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
		2:3
	</span>
</label>
<label class="btn btn-outline-primary " onClick="imageRatio=0.00000000000000000;">
	<input type="radio" class="sr-only" checked name="aspectRatio" value="NaN">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
		آزاد
	</span>
</label>
			</div>
			<div>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بی خیال</button>
<button type="button" data-bs-target="<?= $id; ?>" class="btn btn-primary" id="crop<?= $id; ?>">برش و بارگذاری</button>

			</div>

		</div>
					</div>
				</div>
			</div>



		</div>
	</div>
				</div>

			</div>




		<?php }
	
	public static function showfileManager($id, $title = "مدیریت فایل ها", $manage = true)
	{
		?>
			<script>
				function cropPicture(id) {
	window.addEventListener('DOMContentLoaded', function() {
		var avatarHolder = document.getElementById('avatarHolder' + id);
		var avatar = document.getElementById('avatar' + id);
		avatar.classList.add('d-none');
		var image = document.getElementById('image' + id);
		var input = document.getElementById('inputCropper' + id);
		var $progress = $('#progress' + id);
		var $progressBar = $('#progress-bar' + id);
		var $alert = $('#alertCropper' + id);
		var $modal = $('#modalCropper' + id);


		//$('[data-toggle="tooltip"]').tooltip();

		input.addEventListener('change', function(e) {
			var files = e.target.files;
			var done = function(url) {
				input.value = '';
				image.src = url;
				$alert.hide();
				$modal.modal('show');
			};
			var reader;
			var file;
			var url;

			if (files && files.length > 0) {
				file = files[0];

				if (URL) {
					done(URL.createObjectURL(file));
				} else if (FileReader) {
					reader = new FileReader();
					reader.onload = function(e) {
		done(reader.result);
					};
					reader.readAsDataURL(file);
				}
				image.setAttribute("name", file.name);
				let text = document.createElement("h6");
				text.id = "imageName" + id;
				if (!document.getElementById(text.id)) {
					avatarHolder.after(text);
				} else {

				}
				document.getElementById(text.id).innerHTML = file.name;
			}
		});

		$modal.on('shown.bs.modal', function() {

			var lastW = 600;
			var lastH = 600;

			cropper = new Cropper(image, {
				aspectRatio: -1,
				autoCropArea: 1,
				viewMode: 3,
				zoomable: true,

				data: {
					width: (lastW),
					height: (lastW),
				},
				crop: function(event) {
					var width = Math.round(event.detail.width);
					var height = Math.round(event.detail.height);
					if (imageRatio > 0) {
		width = imageRatio * height;
		cropper.setData({
			width: width,
			height: height,
		});
					}
					if ((width * height) > (2 * 1024 * 1024)) {
		//cropper.setData({ width: lastW, height: lastH, });
					} else {
		lastW = width;
		lastH = height;
					}
				},
			});
		}).on('hidden.bs.modal', function() {
			cropper.destroy();
			cropper = null;
		});

		document.getElementById('crop' + id).addEventListener('click', function() {
			var initialAvatarURL;
			var canvas;

			$modal.modal('hide');

			if (cropper) {
				canvas = cropper.getCroppedCanvas({
					 width: 650,
					 height: 650
				});
				avatar.classList.remove('d-none');
				initialAvatarURL = avatar.src;
				avatar.src = canvas.toDataURL();
				$progress.show();
				$alert.removeClass('alert-success alert-warning');
				canvas.toBlob(function(blob) {

					var formData = new FormData();

					formData.append('avatar', blob, image.name);
					formData.append("folder", selectedFolder);
					$.ajax('requests.php?reqType=croppedImage', {
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false,

		xhr: function() {
			var xhr = new XMLHttpRequest();

			xhr.upload.onprogress = function(e) {
var percent = '0';
var percentage = '0%';

if (e.lengthComputable) {
	percent = Math.round((e.loaded / e.total) * 100);
	percentage = percent + '%';
	$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
}
			};

			return xhr;
		},

		success: function() {


			avatar.classList.remove("d-none");
			new pictures().getFolderImage(selectedFolder, id, <?= $manage; ?>);
			avatarHolder.classList.add('d-none');
			avatar.classList.add("d-none");
		},

		error: function() {
			avatar.classList.add("d-none");
			avatar.src = initialAvatarURL;
			$alert.show().addClass('alert-warning').text('خطا در بارگذاری ');
		},

		complete: function(xhr, state) {
			if (state == "success") {
$alert.show().addClass('alert-success').text(xhr.responseText);
			}

			$progress.hide();
		},
					});
				});
			}
		});
	});
				}
			</script>
			<script>
				cropPicture('<?= $id; ?>');
			</script>
			<div class="border rounded p-1">
			<div class="row m-0 p-0 g-2 bg-light rounded shadow col-12 justify-content-center">
				<div class="col-12 text-center ">
					برای جابجایی یا کپی فایل ها را بکشید و رها کنید<br> برای حذف بر روی دکمه حذف رها کنید
				</div>
				<div class="col text-center">
					حذف
					<br><img class="sortable m-2 rounded border " id="deleteBox" src="src/site_images/delete.png" style="height: 100px;">
				</div>
				<div class="col text-center">
					پوشه جدید
					<br><img class=" m-2 rounded border sortable" id="addBox" onClick="new pictures().addFolder(selectedFolder,'<?= $id; ?>',<?= $manage; ?>)" src="src/site_images/add.jpg" style="height:100px;">
				</div>
				<div class="col text-center">
					انتقال به پوشه والد
					<br><img class="sortable m-2 rounded border " id="moveBox" src="src/site_images/updown.png" style="height:100px;">
				</div>
			</div>
			<div class="btn btn-sm btn-secondary" onClick="clickBtn('bigFile<?= $id; ?>')">بارگذاری فایل
				<input type="file" id="bigFile<?= $id; ?>" onChange="new pictures().uploader(this.id,'<?= $id; ?>',false,<?= $manage; ?>)" class="d-none">
			</div>

			<label class="label btn btn-secondary btn-sm m-1" data-toggle="tooltip" title="برای انتخاب عکس کلکیک کنید">
				بارگذاری تصویر
				<input type="file" class="sr-only d-none" id="inputCropper<?= $id; ?>" name="image" accept="image/*">

			</label>

			<input type="button" onClick="const b<?= $id; ?> =new pictures(); b<?= $id; ?>.toId='<?= $id; ?>'; b<?= $id; ?>.getFolderImage('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="گالری تصاویر">
			<input type="button" onClick="const a<?= $id; ?> =new pictures(); a<?= $id; ?>.toId='<?= $id; ?>'; a<?= $id; ?>.getFolderFiles('uploads','<?= $id; ?>',<?= $manage; ?>);" class="btn btn-sm btn-secondary" value="فایل ها">

			<div id="explorer<?= $id; ?>" class="w-100 bg-light p-md-1" style="min-height: 20vh;">


			</div>
			<div class="col-12 ">
				<div style="max-width: 15%; " id="avatarHolder<?= $id; ?>">
					<img class="rounded " style="max-width: 100%;" id="avatar<?= $id; ?>" src="" alt="avatar">
				</div>

				<div class="alert" id="alertCropper<?= $id; ?>" role="alert"></div>
				<div class="progress w-100 m-0 p-0 d-none" id="progress<?= $id; ?>">
					<div id="progress-bar<?= $id; ?>" class="progress-bar progress-bar-striped progress-bar-animated d-none" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
				</div>
			</div>
			<div class="modal fade" id="modalCropper<?= $id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $id; ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalLabelCropper<?= $id; ?>" data-bs-target="<?= $id; ?>">برش تصویر</h5>
			<button type="button" class="btn-close" data-bs-target="<?= $id; ?>" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="img-container ">
<img id="image<?= $id; ?>" style="width: 100%; " alt="">
			</div>
		</div>
		<div class="modal-footer">
			<div class="btn-group d-flex flex-nowrap" data-toggle="buttons" dir="ltr">
<label class="btn btn-outline-primary" onClick="imageRatio=1.7777777777777777;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.7777777777777777">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
		16:9
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1.3333333333333333;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1.3333333333333333">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
		4:3
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=1;">
	<input type="radio" class="sr-only" name="aspectRatio" value="1">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
		1:1
	</span>
</label>
<label class="btn btn-outline-primary" onClick="imageRatio=0.6666666666666666;">

	<input type="radio" class="sr-only" name="aspectRatio" value="0.6666666666666666">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
		2:3
	</span>
</label>
<label class="btn btn-outline-primary " onClick="imageRatio=0.00000000000000000;">
	<input type="radio" class="sr-only" checked name="aspectRatio" value="NaN">
	<span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
		آزاد
	</span>
</label>
			</div>
			<div>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بی خیال</button>
<button type="button" data-bs-target="<?= $id; ?>" class="btn btn-primary" id="crop<?= $id; ?>">برش و بارگذاری</button>

			</div>

		</div>
					</div>
				</div>
			</div>



		</div>




		<?php }


	public function uploadBigFile()
	{

		$uniq_id = isset($_POST['uniq']) ? $_POST['uniq'] : session_id(); // اسم فایل ارسال شده
		$file = $_FILES['file']; // فایلی که بارگذاری میشود
		$chunksFolder = FILES::ROOT_DIR . '/chunks/' . $uniq_id; // نام پوشه برای ذخیره تکه های فایل
		$this->makeDirIfNotExists($chunksFolder); // ساخت پوشه در صورتی که وجود ندارد
		$fileName = isset($_POST['name']) ? $_POST['name'] : 'fileName.no'; // اسم فایل ارسال شده
		if (isset($_POST['folder'])) {
			$outputFolder = './' . $_POST['folder']; // مسیر ذخیره فایل کامل
		} else {
			$outputFolder = './' . FILES::ROOT_DIR . '/bigFiles'; // مسیر ذخیره فایل کامل
		}

		$this->makeDirIfNotExists($outputFolder); // ساخت پوشه در صورتی که وجود ندارد

		$chunkSize = 2 * 1024 * 1024; // اندازه تکه (در این مثال، 2MB)
		$chunkNumber = isset($_POST['chunkNumber']) ? $_POST['chunkNumber'] : 0; // شماره تکه (از صفر شروع می شود)
		$targetPath = $chunksFolder . '/' . $fileName . '.part' . $chunkNumber; // مسیر ذخیره تکه ی فایل
		
		// اگر قسمت از قبل وجود ندارد بارگذاری می شود
		//if(!file_exists($targetPath)){
			// ذخیره تکهی فایل
			move_uploaded_file($file['tmp_name'], $targetPath);
		//}
		

		// بررسی آیا تمام تکهها بارگذاری شده است
		$totalChunks = isset($_POST['totalChunks']) ? $_POST['totalChunks'] : 0; // تعداد کل تکهها
		$uploadedChunks = count(glob($chunksFolder . '/' . $fileName . '.part*')); // تعداد تکههای بارگذاری شده

		if ($uploadedChunks == $totalChunks) {
			// تمام تکهها بارگذاری شده، میتوانیم فایل را ترکیب کنیم
			$outputFile = $outputFolder . "/" . $fileName; // فایل کامل
			$outputFile = $this->getNewNameIfFileExist($outputFile);
			
			// باز کردن فایل خروجی برای نوشتن
				$outputHandle = fopen($outputFile, 'w');

			// ترکیب تکههای فایل
			for ($i = 0; $i < $totalChunks; $i++) {
				
				$inputFile = $chunksFolder . '/' . $fileName . '.part' . $i; // مسیر تکه ی فایل

				// باز کردن فایل ورودی برای خواندن
				$inputHandle = fopen($inputFile, 'r');

				// خواندن دادههای تکهی فایل و نوشتن آنها در فایل خروجی
				while (!feof($inputHandle)) {
					fwrite($outputHandle, fread($inputHandle, 1024 * 64));
				}

				// بستن فایل ورودی
				fclose($inputHandle);

				// حذف تکهی فایل بعد از استفاده
				unlink($inputFile);
				
			}
			// بستن فایل خروجی
			fclose($outputHandle);
			
			echo $totalChunks . "&" . $outputFile;
			// حذف پوشه تکهها بعد از استفاده
			$this->deleteDir($chunksFolder);
			//rmdir($chunksFolder);
		} 
		else {
			echo $uploadedChunks;
		}
	}
	public function isFileChunkUploaded()
	{

		$uniq_id = isset($_POST['uniq']) ? $_POST['uniq'] : session_id(); // اسم فایل ارسال شده
		$chunksFolder = FILES::ROOT_DIR . '/chunks/' . $uniq_id; // نام پوشه برای ذخیره تکه های فایل
		$this->makeDirIfNotExists($chunksFolder); // ساخت پوشه در صورتی که وجود ندارد
		$fileName = isset($_POST['name']) ? $_POST['name'] : 'fileName.no'; // اسم فایل ارسال شده
		$chunkNumber = isset($_POST['chunkNumber']) ? $_POST['chunkNumber'] : 0; // شماره تکه (از صفر شروع می شود)
		$targetPath = $chunksFolder . '/' . $fileName . '.part' . $chunkNumber; // مسیر ذخیره تکه ی فایل
		
		// آیا قسمت از قبل وجود ندارد 
		//
		if(is_file($targetPath)){
			echo "exists";
		}else{
			echo $targetPath;
		}
	}
}

/*
	class animation
	{
		public static function putShowAnimationJsInPage()
		{
			?>
				<script>
	function onScroolAnimate(Anim = 'animate__pulse') {
		let reveals = document.querySelectorAll(".reveal");

		for (let i = 0; i < reveals.length; i++) {
			let windowHeight = window.innerHeight;
			let elementTop = reveals[i].getBoundingClientRect().top;
			let elementVisible = windowHeight / 2;
			let top = -20;
			let bottom = (windowHeight - top);
			if (elementTop < top || elementTop > bottom) {
				reveals[i].classList.add("animate__fadeOut", "animate__animated");
				//reveals[i].classList.remove(Anim);
			} else {
				reveals[i].classList.remove("animate__fadeOut", "animate__animated");
				//reveals[i].classList.add(Anim,"animate__animated");
			}
			// تشخیص ورود به صفحه از پایین

		}
	}
				</script>
			<?php
		}
		public static function showAnimation($animation = "animate__pulse")
		{
			?>
				<script>
	window.addEventListener("scroll", () => onScroolAnimate(<?= $animation ?>));

	// برای برسی موقعیت اسکرول در زمان بار گذاری صفحه
	onScroolAnimate();
				</script>
			<?php
		}
		public static function putOnInteranceJsInPage($id)
		{
			?>
				<script>
	eval("var intrance<?= $id; ?>=0;");

	function onScroolDetected(id) {
		// تشخیص ورود به صفحه از پایین و بالا
		let reveals2 = document.getElementById(id);
		let windowHeight2 = window.innerHeight;
		let elementTop2 = reveals2.getBoundingClientRect().top;
		if (elementTop2 < windowHeight2 && elementTop2 > (windowHeight2 - 100)) {
			if (intrance + id != 20) {
				intrance + id = 20;
				alert();
			}
		} else {
			intrance + id = 0;
		}




	}
				</script>
			<?php
		}
		public static function onInterance($id)
		{
			?>
				<script>
	window.addEventListener("scroll", () => onScroolDetected(<?= $id; ?>));
	onScroolDetected();
				</script>
			<?php
		}
	}
*/
class bootstrap
{
	public static function accordion($id = "noId", $dataArray = ["hrrj_button1" => ["hrrj_item1", "hrrj_item2"]], $activeBtn = "hrrj_button1", $activeItem = "hrrj_item2", $allways_open = false, $accordion_flush = false, $btnColor = '', $itemColor = '')
	{
		?>
			<div class="accordion p-0<?php if ($accordion_flush == true) echo " accordion-flush "; ?>" id="accordionExample<?= $id; ?>"> <?php
			$j = 1;
			foreach ($dataArray as $btn => $list) {
			?>
	<div class="accordion-item ">
		<h2 class="accordion-header">
			<button class="accordion-button <?php if ($activeBtn != $btn) echo " collapsed "; ?>" style="background-color: <?= $btnColor ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $j . $id; ?>" aria-expanded="<?php if ($activeBtn != $btn) echo false;
	else echo true; ?>" aria-controls="collapseOne<?= $j . $id; ?>">
				<?= $btn ?>
			</button>
		</h2>
		<div id="collapseOne<?= $j . $id; ?>" class="accordion-collapse collapse p-md-1 <?php if ($activeBtn == $btn) echo " show "; ?>" <?php if ($allways_open == false) echo ' data-bs-parent="#accordionExample' . $id . '" '; ?> </div>
			<div class="accordion-body w-100 p-1 m-0">
				<?php foreach ($list as $item) { 	?>
					<div class="w-100 p-0 m-0 <?php if ($activeItem == $item) echo " border border-3 border-info "; ?>" style="background-color: <?= $itemColor; ?>"> <?= $item; ?></div>
				<?php } ?>
			</div>
		</div>
	</div>

				<?php $j++;
			} ?>
			</div>

		<?php
	}

	// ورودی این اسلایدر آدرس یک پوشه از سرور و یا لیستی از تصاویر باید باشد
	public static function slider($listOrDir, $sliderId = "-1", $height = 100)
	{
		if ($height < 100) $height = 100;
		$list = [];
		if (isset($listOrDir)) {
			if (is_array($listOrDir) and count($listOrDir) > 0) {
				foreach ($listOrDir as $item) {
	if (trim($item) != "") $list[] = $item;
				}
			} else {
				$file1 = new FILES();
				$list1 = $file1->getDirPictures($listOrDir);
				foreach ($list1 as $item) {
	if (trim($item) != "") $list[] = $listOrDir . '/' . $item;
				}
			}
		}
		?>
			<?php if (count($list) > 0) { ?>
				<div id="carouselExample<?= $sliderId; ?>" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner">
		<?php $i = 0;
			foreach ($list as $item) { ?>
			<?php if ($i == 0) {
	$i++; ?>
				<div class="carousel-item active">
				<?php } else { ?>
					<div class="carousel-item" style="height: <?= $height; ?>px;">

					<?php	} ?>
					<div class="w-100 text-center d-flex justify-content-center align-items-center m-0 p-0" style="min-height: 100px; max-height: <?= $height; ?>px;">
		<a href="<?= $item; ?>" class="d-flex justify-content-center align-items-center m-0 p-0" style="height:<?= $height; ?>px; " target="_blank">
			<img src="<?= $item; ?>" class="rounded shadow" style="max-height:<?= $height; ?>px; max-width: 100%; " alt="...">
		</a>
					</div>
					</div>
				<?php } ?>
				</div>
				<?php if (count($list) > 1) { ?>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $sliderId; ?>" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $sliderId; ?>" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
					</button>
				<?php } ?>
	</div>
				<?php } ?>
			<?php

	}

	// ورودی این اسلایدر باید به صورت یک ارایه از اطلاعات جیسون شده باشد
	public static function sliderContent($contentList, $sliderId = "-1", $height = 200)
	{

			?>
				<?php if (count($contentList) > 0) { ?>
	<div id="carouselExample<?= $sliderId; ?>" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php $i = 0;
			foreach ($contentList as $item) { ?>
				<?php $item = json_decode($item); ?>
				<?php if ($i == 0) {
	$i++; ?>
					<div class="carousel-item bg-dark active">
					<?php } else { ?>
		<div class="carousel-item bg-dark ">

		<?php	} ?>
		<div class=" d-flex justify-content-center " style="height: <?= $height; ?>px; max-height: <?= $height; ?>px; width:100%;">
			<div class=" " style="height: <?= $height; ?>px; max-height: <?= $height; ?>px; width:100%;">
<?= $item; ?>
			</div>
		</div>
		</div>
					<?php } ?>
					</div>
					<button class="carousel-control-prev " type="button" data-bs-target="#carouselExample<?= $sliderId; ?>" data-bs-slide="prev">
		<span class="carousel-control-prev-icon " aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next " type="button" data-bs-target="#carouselExample<?= $sliderId; ?>" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
					</button>
		</div>
	<?php } ?>
			<?php

	}

}
class Number2Word
{

	protected $digit1 = array(
		0 => 'صفر',
		1 => 'یک',
		2 => 'دو',
		3 => 'سه',
		4 => 'چهار',
		5 => 'پنج',
		6 => 'شش',
		7 => 'هفت',
		8 => 'هشت',
		9 => 'نه',
	);
	protected $digit1_5 = array(
		1 => 'یازده',
		2 => 'دوازده',
		3 => 'سیزده',
		4 => 'چهارده',
		5 => 'پانزده',
		6 => 'شانزده',
		7 => 'هفده',
		8 => 'هجده',
		9 => 'نوزده',
	);
	protected $digit2 = array(
		1 => 'ده',
		2 => 'بیست',
		3 => 'سی',
		4 => 'چهل',
		5 => 'پنجاه',
		6 => 'شصت',
		7 => 'هفتاد',
		8 => 'هشتاد',
		9 => 'نود'
	);
	protected $digit3 = array(
		1 => 'صد',
		2 => 'دویست',
		3 => 'سیصد',
		4 => 'چهارصد',
		5 => 'پانصد',
		6 => 'ششصد',
		7 => 'هفتصد',
		8 => 'هشتصد',
		9 => 'نهصد',
	);
	protected $steps = array(
		1 => 'هزار',
		2 => 'میلیون',
		3 => 'بیلیون',
		4 => 'تریلیون',
		5 => 'کادریلیون',
		6 => 'کوینتریلیون',
		7 => 'سکستریلیون',
		8 => 'سپتریلیون',
		9 => 'اکتریلیون',
		10 => 'نونیلیون',
		11 => 'دسیلیون',
	);
	protected $t = array(
		'and' => 'و',
	);

	function number_format($number, $decimal_precision = 0, $decimals_separator = '.', $thousands_separator = ',')
	{
		$number = explode('.', str_replace(' ', '', $number));
		$number[0] = str_split(strrev($number[0]), 3);
		$total_segments = count($number[0]);
		for ($i = 0; $i < $total_segments; $i++) {
			$number[0][$i] = strrev($number[0][$i]);
		}
		$number[0] = implode($thousands_separator, array_reverse($number[0]));
		if (!empty($number[1])) {
			$number[1] = $this->Round($number[1], $decimal_precision);
		}
		return implode($decimals_separator, $number);
	}

	protected function groupToWords($group)
	{
		$d3 = floor($group / 100);
		$d2 = floor(($group - $d3 * 100) / 10);
		$d1 = $group - $d3 * 100 - $d2 * 10;

		$group_array = array();

		if ($d3 != 0) {
			$group_array[] = $this->digit3[$d3];
		}

		if ($d2 == 1 && $d1 != 0) { // 11-19
			$group_array[] = $this->digit1_5[$d1];
		} else if ($d2 != 0 && $d1 == 0) { // 10-20-...-90
			$group_array[] = $this->digit2[$d2];
		} else if ($d2 == 0 && $d1 == 0) { // 00
		} else if ($d2 == 0 && $d1 != 0) { // 1-9
			$group_array[] = $this->digit1[$d1];
		} else { // Others
			$group_array[] = $this->digit2[$d2];
			$group_array[] = $this->digit1[$d1];
		}

		if (!count($group_array)) {
			return FALSE;
		}

		return $group_array;
	}

	public function numberToWords($number)
	{
		$formated = $this->number_format($number, 0, '.', ',');
		$groups = explode(',', $formated);

		$steps = count($groups);

		$parts = array();
		foreach ($groups as $step => $group) {
			$group_words = self::groupToWords($group);
			if ($group_words) {
				$part = implode(' ' . $this->t['and'] . ' ', $group_words);
				if (isset($this->steps[$steps - $step - 1])) {
	$part .= ' ' . $this->steps[$steps - $step - 1];
				}
				$parts[] = $part;
			}
		}
		return implode(' ' . $this->t['and'] . ' ', $parts);
	}
}
