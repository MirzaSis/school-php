<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="bootstrap5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="iliya.css" type="text/css" rel="stylesheet">
</head>

<body dir="rtl" style="margin: 60px">
<form>
	<select name="hafte">
	<option value="daily">روزانه</option>
	<option value="weekly">هفتگی</option>
	<option value="monthly_3">سه ماهه</option>
	</select>
	
<?php
	$swich="";	
	$option=$_REQUEST['hafte'];
		$daily='<tr>
							<th>درس/روز</th>
                            <th>شنبه</th>
                            <th>یکشنبه</th>
                            <th>دوشنبه</th>
                            <th>سه شنبه</th>
                            <th>چهارشنبه</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_yek_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_do_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_se_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_chahar_sanbe" type="number">  
							</td>
                          </tr>';
		
		$weekly='<tr>
							<th>درس/هفته</th>
                            <th>هفته اول</th>
                            <th>هفته دوم</th>
                            <th>هفته سوم</th>
                            <th>هفته چهارم</th>
                            <th>هفته پنجم</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_week_1" type="number">  
							</td>
							<td>
							<input name="math_week_2" type="number">  
							</td>
							<td>
							<input name="math_week_3" type="number">  
							</td>
							<td>
							<input name="math_week_4" type="number">  
							</td>
							<td>
							<input name="math_week_5" type="number">  
							</td>

                          </tr>';
		
		$monthly_3=[
			
			'پاییز'=>'<tr>
							<th>درس/ماه</th>
                            <th>مهر</th>
                            <th>آبان</th>
                            <th>آذز</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_mehr" type="number">  
							</td>
							<td>
							<input name="math_aban" type="number">  
							</td>
							<td>
							<input name="math_azar" type="number">  
							</td>
                          </tr>',
			'زمستون'=>'<tr>
							<th>درس/ماه</th>
                            <th>دی</th>
                            <th>بهمن</th>
                            <th>اسفند</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_dey" type="number">  
							</td>
							<td>
							<input name="math_bahman" type="number">  
							</td>
							<td>
							<input name="math_esfand" type="number">  
							</td>
                          </tr>',
			'بهار'=>'<tr>
							<th>درس/ماه</th>
                            <th>فروردین</th>
                            <th>اردیبهشت</th>
                            <th>خرداد</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_farvardin" type="number">  
							</td>
							<td>
							<input name="math_ordibehesht" type="number">  
							</td>
							<td>
							<input name="math_khordad" type="number">  
							</td>
                          </tr>',
				   ];
		$monthly_3_help='
		<select name="hafte_help">
	<option value="پاییز">پاییز</option>
	<option value="زمستون">زمستون</option>
	<option value="بهار">بهار</option>
	</select>
	<input name="final" type="submit" value="ارسال نهایی">
		';
		
	if(isset($_REQUEST['start'])){
				switch($option){
                           case "daily":
                           $swich=$daily;
                           break;
                           case "weekly":
                           $swich=$weekly;	
                           break;
                           case "monthly_3":
                           $swich=$monthly_3_help;
                           break;
						};

		
	
	}elseif(isset($_REQUEST['final'])){
		$option2=$_REQUEST['hafte_help'];
		$swich=$monthly_3[$option2];
	};
	echo '<table class="table table-bordered table-hover text-center fs-6">
                        <tbody>'.$swich
                        .'</tbody>
                      </table>
	<input name="nim" type="submit" value="ارسال">';
?>
	<input type="submit" name="start" value="شروع">
	</form>
</body>
</html>




