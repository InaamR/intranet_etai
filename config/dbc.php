<?php

define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PASS","");
define ("DB_NAME","methode");

define ("MYSQL","mysql:host=".DB_HOST.";dbname=".DB_NAME."; charset=utf8");
define ("SQLserverCollect","");


$bdd = new PDO(MYSQL, 'root', '',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));

/*$bdd = new PDO('sqlsrv:Server=10.9.6.10;Database=EnergysData', 'energysdata', '$Energy2020!',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
));*/

/*$mssqldriver = '{SQL Server}'; 
$mssqldriver = '{SQL Server Native Client 11.0}';
$mssqldriver = '{ODBC Driver 11 for SQL Server}';

$hostname='10.9.6.10';
$dbname='EnergysData';
$username='energysdata';
$password='$Energy2020!';
$bdd = new PDO("odbc:Driver=$mssqldriver;Server=$hostname;Database=$dbname", $username, $password);*/



$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($db,"SET NAMES 'utf8'");

$user_registration = 0;

$expire = time() + 60 * 60 * 24;

define("COOKIE_TIME_OUT", $expire);

define('SALT_LENGTH', 9);

//define ("ADMIN_NAME", "admin");

define ("ADMIN_LEVEL", 1);

define ("PDG_LEVEL", 2);

define ("CHEF_DE_SERVICE_LEVEL", 3);

define ("CHEF_EQUIPE_LEVEL", 4);

define ("TECHNICIEN_LEVEL", 5);

define ("GUEST_LEVEL", 6);

define ("TAILLE_MAX_UP", 100000);

ini_set('max_execution_time', 300);
/************** MODULE ******************/


/*************** DES FONCTIONS POUR VERFIER SI C'EST UN ADMIN OU NON ****************/

function checkAdmin() {
if($_SESSION['user_level'] == ADMIN_LEVEL) {return 1;} else {return 0;}
}


function checkPdg() {

if($_SESSION['user_level'] == PDG_LEVEL) {return 1;} else {return 0;}

}


function checkCHEF_DE_SERVICE() {

if($_SESSION['user_level'] == CHEF_DE_SERVICE_LEVEL) {return 1;} else {return 0;}

}

function checkCHEF_EQUIPE() {

if($_SESSION['user_level'] == CHEF_EQUIPE_LEVEL) {return 1;} else {return 0;}

}

function checkTECHNICIEN() {

if($_SESSION['user_level'] == TECHNICIEN_LEVEL) {return 1;} else {return 0;}

}

function checkGUEST() {

if($_SESSION['user_level'] == GUEST_LEVEL) {return 1;} else {return 0;}

}





/*************** A UTILISER PLUS TARD ****************/

function checkWeb() {
if($_SESSION['team'] == 1 || $_SESSION['team'] == 20) {return 1;} else {return 0;}
}

/*************** reCAPTCHA KEYS****************/
$publickey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$privatekey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";


/**** PAGE PROTECT CODE  ********************************/

function page_protect() {
session_start();

global $db; 	

	if (isset($_SESSION['HTTP_USER_AGENT']))
	{
	    if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT']))
	    {
	        logout();
	        exit;
	    }
	}

	if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_name']) ) 
	{
		if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_key'])){
		
		$cookie_user_id  = filter($_COOKIE['user_id']);
		$rs_ctime = mysqli_query($db,"select `ckey`,`ctime` from `users_methode` where `id` ='$cookie_user_id'") or die(mysqli_error());
		list($ckey,$ctime) = mysqli_fetch_row($rs_ctime);
			if( (time() - $ctime) > COOKIE_TIME_OUT) {
			logout();
			}

		 if( !empty($ckey) && is_numeric($_COOKIE['user_id']) && isUserID($_COOKIE['user_name']) && $_COOKIE['user_key'] == sha1($ckey)  ) {
		 	  
				
				session_regenerate_id(); //against session fixation attacks.
				$_SESSION['user_id'] = $_COOKIE['user_id'];
				$_SESSION['user_name'] = $_COOKIE['user_name'];
				/* query user level from database instead of storing in cookies */	
				list($user_level, $equipe_id) = mysqli_fetch_row(mysqli_query($db,"select user_level, equipe_id from users_methode where id='$_SESSION[user_id]'"));

				$_SESSION['user_level'] = $user_level;
				$_SESSION['team'] = $equipe_id;
				$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
			  
		   } else {
		   logout();
		   }

	  }else {
		  
		header("Location: ../index.php");
		exit();
	}
	}

}

/********************************************************/


function filter($data) {
	
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
	
		$data = stripslashes($data);
	
	return $data;
}



function EncodeURL($url)
{
$new = strtolower(ereg_replace(' ','_',$url));
return($new);
}

function DecodeURL($url)
{
$new = ucwords(ereg_replace('_',' ',$url));
return($new);
}

function ChopStr($str, $len) 
{
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . "...";
}	

function isEmail($email){
  return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}

function isUserID($username)
{
	if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
		return true;
	} else {
		return false;
	}
 }	
 
function isURL($url) 
{
	if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
		return true;
	} else {
		return false;
	}
}

function passComplex($password) 
{
 
    if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
    	return true;
	} else {
		return false;
	}	

} 
function FormatTel($numTel) {
		  $i=0;
		  $j=0;
		  $formate = "";
		  while ($i<strlen($numTel)) { //tant qu il y a des caracteres
			if ($j < 2) {
			  if (preg_match('/^[0-9]$/', $numTel[$i])) { //si on a bien un chiffre on le garde
				$formate .= $numTel[$i];
				$j++;
			  }
			  $i++;
			}
			else { //si on a mis 2 chiffres a la suite on met un espace
			  $formate .= " ";
			  $j=0;
			}
		  }
		  return $formate;
		}

function checkPwd($x,$y) 
{
if(empty($x) || empty($y) ) { return false; }
if (strlen($x) < 4 || strlen($y) < 4) { return false; }

if (strcmp($x,$y) != 0) {
 return false;
 } 
return true;
}

function GenPwd($length = 7)
{
  $password = "";
  $possible = "0123456789bcdfghjkmnpqrstvwxyz";
  
  $i = 0; 
    
  while ($i < $length) { 

    
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
       
    
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  return $password;

}

function GenKey($length = 7)
{
  $password = "";
  $possible = "0123456789abcdefghijkmnopqrstuvwxyz"; 
  
  $i = 0; 
    
  while ($i < $length) { 

    
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
       
    
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  return $password;

}

function securite_bdd($db,$string)

{

	// On regarde si le type de string est un nombre entier (int)

	if(ctype_digit($string))

	{

		$string = intval($string);

	}

	// Pour tous les autres types

	else

	{

		$string = mysqli_real_escape_string($db, $string);

		$string = addcslashes($string, '%_');

	}

	

	return htmlentities($string);

}

function saveState($name, $state, $bdd)
{
	try {
		//if the name already exist then update else insert a new row in db
		$query = "INSERT INTO `datatables_states` ( `name`, `state`) VALUES ( :name , :state)";
		$query.= " ON DUPLICATE KEY UPDATE state=VALUES(state)";//to avoid multiple inserts, we update the column "state" if a row with the same name  exists
		$stmt = $bdd->prepare($query);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':state', json_encode($state));
		$stmt->execute();
		echo "saved";
	} catch (PDOException $e) {
		print "ERROR !: " . $e->getMessage() . "<br/>";
		die();
	}
}


function loadState($name, $bdd)
{
	try {

		$stmt = $bdd->prepare("SELECT state FROM `datatables_states` WHERE `name` LIKE :name");

		$stmt->execute(array(":name" => $name));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $result['state'] ;
	} catch (PDOException $e) {
		print "ERROR !: " . $e->getMessage() . "<br/>";
		die();
	}
}
	
function logout()
{
global $db;
session_start();

$sess_user_id = strip_tags(mysqli_real_escape_string($db,$_SESSION['user_id']));
$cook_user_id = strip_tags(mysqli_real_escape_string($db,$_COOKIE['user_id']));

if(isset($sess_user_id) || isset($cook_user_id)) {
mysqli_query($db,"UPDATE `users_methode` SET `ckey` = '', `ctime` = '' WHERE `user_id` = '$sess_user_id' OR `user_id` = '$cook_user_id'") or die(mysqli_connect_error());
}
unset($_SESSION['user_id']);
unset($_SESSION['user_fullname']);
unset($_SESSION['user_level']);
unset($_SESSION['team']);
unset($_SESSION['HTTP_USER_AGENT']);
session_unset();
session_destroy();
setcookie("user_id", '', time()-COOKIE_TIME_OUT, '/', null, false, true);
setcookie("user_fullname", '', time()-COOKIE_TIME_OUT, '/', null, false, true);
setcookie("team", '', time()-COOKIE_TIME_OUT, '/', null, false, true);
setcookie("user_key", '', time()-COOKIE_TIME_OUT, '/', null, false, true);
header("Location: ../index.php");
}


function PwdHash($pwd, $salt = null)
{
    if ($salt === null)     {
        $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
    }
    else     {
        $salt = substr($salt, 0, SALT_LENGTH);
    }
    return $salt . sha1($pwd . $salt);
}


function get_nb_open_days($date_start, $date_stop) {
	
	$timestamp1    = strtotime($date_start);
	$timestamp2    = strtotime($date_stop);
	
	$tot = 0;

	$date1 = date("z", $timestamp1) ;
	$date2 = date("z", $timestamp2) ;
	
	$day_stamp = 86400 ;

	$year1 = date("Y", $timestamp1) ;
	$year2 = date("Y", $timestamp2) ;

	$num = 0;
	$counter = 0;
	
	$year = $year1;	
	
	{
		$date3         = date("Y-n-d", mktime(0, 0, 0, 1,  1,  $year));
		$timestamp3 = strtotime($date3); 
		$counter = 0;
		
		$easterDate   = easter_date($year) ;
		$easterDay    = date('j', $easterDate) ;
		$easterMonth  = date('n', $easterDate) ;
		$easterYear   = date('Y', $easterDate) ;
	
		

		$closed = array
		(
			// dates fixes
			date("z", mktime(0, 0, 0, 1,  1,  $year)),  // 1er janvier
			date("z", mktime(0, 0, 0, 5,  1,  $year)),  // Fête du travail
			date("z", mktime(0, 0, 0, 5,  8,  $year)),  // Victoire des alliés
			date("z", mktime(0, 0, 0, 7,  14, $year)),  // Fête nationale
			date("z", mktime(0, 0, 0, 8,  15, $year)),  // Assomption
			date("z", mktime(0, 0, 0, 11, 1,  $year)),  // Toussaint
			date("z", mktime(0, 0, 0, 11, 11, $year)),  // Armistice
			date("z", mktime(0, 0, 0, 12, 25, $year)),  // Noel

			// Dates basées sur Paques
			date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)),  // Lundi de Paques
			date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)), // Ascension
			date("z", mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear))  // Lundi de Pentecote
			
		);
		
		if( $year == $year1 && $year < $year2 )
		{ 
			$i = $date1; 
			$counter +=  (364+date("L", mktime(0, 0, 0, 1, 1, $year))) ; 
		}

		
		if( $year > $year1 && $year < $year2 )
		{
			$i = date("z", mktime(0, 0, 0, 1,  1,  $year));  
			$counter += 364+date("L", mktime(0, 0, 0, 1, 1, $year)); 
		}
		if( $year == $year2 && $year > $year1 )
		{ 
			$i = date("z", mktime(0, 0, 0, 1,  1,  $year)); 
			$counter += $date2 ; 
		}
		
		if( $year == $year1 && $year == $year2 )
		{ 
			$i = $date1; 
			$counter += $date2 ; 
		}
		
		while ( $i <= $counter )
		{
			$tot = $tot +1;

			if( in_array($i, $closed) ) 
			{
				$num++;
			}
			
			if(((date("w", $timestamp3 + $i * $day_stamp) == 6) or (date("w", $timestamp3 + $i * $day_stamp) == 0)) and !in_array($i, $closed)) 
			{
				$num++ ;
			}
			$i++;
		}
		$year++ ;
		}
		
		$res = $tot - $num;
		
		return $res;
}

function biss_hours($start, $end){

	$startDate = new DateTime($start);
	$endDate = new DateTime($end);
	$periodInterval = new DateInterval( "PT1H" );
	
	$period = new DatePeriod( $startDate, $periodInterval, $endDate );
	$count = 0;
	
	foreach($period as $date){
	
	$startofday = clone $date;
	$startofday->setTime(8,00);
	
	$endofday = clone $date;
	$endofday->setTime(17,00);
	
	if($date > $startofday && $date <= $endofday && !in_array($date->format('l'), array('Sunday','Saturday'))){
	
		$count++;
	}
	
	}
	
	$start_d = date("Y-m-d h:00:00", strtotime($start));
	$start_d_seconds = strtotime($start_d);
	$start_t_seconds = strtotime($start);
	$start_seconds = $start_t_seconds - $start_d_seconds;
	
	$end_d = date("Y-m-d h:00:00", strtotime($end));
	$end_d_seconds = strtotime($end_d);
	$end_t_seconds = strtotime($end);
	$end_seconds = $end_t_seconds - $end_d_seconds;
	
	$diff = $end_seconds-$start_seconds;
	
	if($diff!=0):
		$count--;
	endif;
	
	$total_min_sec = date('i:s',$diff);	
	return $count.":".$total_min_sec;
}


function addTime($temps, $hours=0, $minutes=0, $seconds=0){
	$temp_string = explode(":", $temps);
	$totalHours = $temp_string[0] + $hours;
	$totalMinutes = $temp_string[1] + $minutes;
	if ( $totalMinutes / 60 > 1) {
	 $totalHours = $totalHours + floor($totalMinutes/60);
	 $totalMinutes = $totalMinutes % 60;
	}
	$totalSeconds = $temp_string[2] + $seconds;
	if ( $totalSeconds / 60 > 1) {
	 $totalMinutes = $totalHours + floor($totalSeconds/60);
	 $totalSeconds = $totalSeconds % 60;
	}
	if( $totalHours < 10 ) {
	 $totalHours = "0" . $totalHours;
	}
	if( $totalMinutes < 10 ) {
	 $totalMinutes = "0" . $totalMinutes;
	}
	if( $totalSeconds < 10 ) {
	 $totalSeconds = "0" . $totalSeconds;
	}
	$myTime = $totalHours . ":" . $totalMinutes . ":" . $totalSeconds;
	return $myTime;
}

function date_change_format($ladate,$from,$to){
	if($ladate !=''){
		$date = DateTime::createFromFormat($from, $ladate);
		return $date->format($to);
	}else{
		return "";
	}
}


function get_working_hours($ini_str,$end_str){
    $ini_time = [7,0]; //hr, min
    $end_time = [18,0]; //hr, min
    $ini = date_create($ini_str);
    $ini_wk = date_time_set(date_create($ini_str),$ini_time[0],$ini_time[1]);
    $end = date_create($end_str);
    $end_wk = date_time_set(date_create($end_str),$end_time[0],$end_time[1]);
    $workdays_arr = get_workdays($ini,$end);
    $workdays_count = count($workdays_arr);
    $workday_seconds = (($end_time[0] * 60 + $end_time[1]) - ($ini_time[0] * 60 + $ini_time[1])) * 60;
    $ini_seconds = 0;
    $end_seconds = 0;
    if(in_array($ini->format('Y-m-d'),$workdays_arr)) $ini_seconds = $ini->format('U') - $ini_wk->format('U');
    if(in_array($end->format('Y-m-d'),$workdays_arr)) $end_seconds = $end_wk->format('U') - $end->format('U');
    $seconds_dif = $ini_seconds > 0 ? $ini_seconds : 0;
    if($end_seconds > 0) $seconds_dif += $end_seconds;
    $working_seconds = ($workdays_count * $workday_seconds) - $seconds_dif;	 
	$secondes   = floor ( ( ( $working_seconds % 86400 ) % 3600 ) % 60 ) ;
	$minutes    = floor ( ( ( $working_seconds % 86400 ) % 3600 ) / 60 ) ;
	$hours      = floor ( ( $working_seconds % 86400 ) / 3600 ) ;
	$affichage = $hours.':'.$minutes.':'.$secondes;

    return $affichage ; //return hrs
}
function get_working_hours_2($ini_str,$end_str){
    $ini_time = [7,0]; //hr, min
    $end_time = [18,0]; //hr, min
    $ini = date_create($ini_str);
    $ini_wk = date_time_set(date_create($ini_str),$ini_time[0],$ini_time[1]);
    $end = date_create($end_str);
    $end_wk = date_time_set(date_create($end_str),$end_time[0],$end_time[1]);
    $workdays_arr = get_workdays($ini,$end);
    $workdays_count = count($workdays_arr);
    $workday_seconds = (($end_time[0] * 60 + $end_time[1]) - ($ini_time[0] * 60 + $ini_time[1])) * 60;
    $ini_seconds = 0;
    $end_seconds = 0;
    if(in_array($ini->format('Y-m-d'),$workdays_arr)) $ini_seconds = $ini->format('U') - $ini_wk->format('U');
    if(in_array($end->format('Y-m-d'),$workdays_arr)) $end_seconds = $end_wk->format('U') - $end->format('U');
    $seconds_dif = $ini_seconds > 0 ? $ini_seconds : 0;
    if($end_seconds > 0) $seconds_dif += $end_seconds;
    $working_seconds = ($workdays_count * $workday_seconds) - $seconds_dif;	 
	$secondes   = floor ( ( ( $working_seconds % 86400 ) % 3600 ) % 60 ) ;
	$minutes    = floor ( ( ( $working_seconds % 86400 ) % 3600 ) / 60 ) ;
	$hours      = floor ( ( $working_seconds % 86400 ) / 3600 ) ;
	$affichage = $working_seconds;

    return $affichage ; //return hrs
}
function get_workdays($ini,$end){
    $skipdays = [6,0]; //saturday:6; sunday:0
    $skipdates = []; //eg: ['2016-10-10'];
    $current = clone $ini;
    $current_disp = $current->format('Y-m-d');
    $end_disp = $end->format('Y-m-d');
    $days_arr = [];
    while($current_disp <= $end_disp){
        if(!in_array($current->format('w'),$skipdays) && !in_array($current_disp,$skipdates)){
            $days_arr[] = $current_disp;
        }
        $current->add(new DateInterval('P1D')); //adds one day
        $current_disp = $current->format('Y-m-d');
    }
    return $days_arr;
}

function trunc($phrase, $max_words)
{
   $phrase_array = explode(' ',$phrase);
   if(count($phrase_array) > $max_words && $max_words > 0)
      $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...'; 
   return $phrase;
}

/**********************INITIALE**********************************/


function initiales($nom){
	$nom_initiale = ''; // déclare le recipient
	$n_mot = explode(" ",$nom);
	foreach($n_mot as $lettre){
		$nom_initiale .= $lettre{0}.'.';
	}
	return strtoupper($nom_initiale);
}


/**********************FONT_WEIGHT_BOLD**********************************/



function bold($weight){
	$font_weight = '';
	$font_weight = '<b>'.$weight.'</b>';
	return $font_weight;
}



?>