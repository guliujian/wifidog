<?php

/**
 * 通过判断token  来判断是否放行
 *
 * 如果不放行，请返回以下代码
 * echo ("Auth: 0\n");
 * echo ("Messages: No Access\n");
 * exit;
 */
// $token = $_GET['token'];
// if(empty($token)) die('error');
// echo ("Auth: 0\n");
// echo ("Messages: No Access\n");
// exit;
$host     = '127.0.0.1';
$username = 'root';
$password = 'glj1234@!';
mysql_connect($host, $username, $password) or die('连接数据库失败!');
mysql_select_db('wifidog') or die('选择数据库失败!');
if ($_GET[token] == NULL) {
	$ip     = $_GET[ip];
	$query  = "INSERT INTO wifidog(ip) VALUE('$ip')";
	$result = mysql_query($query);
	$sql    = "select mac from wifidog where mac='".$_GET[mac]."'";
	$result = mysql_query($sql);
	$row    = mysql_fetch_row($result);
	if ($row != NULL) {echo ("Auth: 1\n");
		echo ("Messages: Allow Access\n");
	} else {echo ("Auth: 0\n");
		echo ("Messages: No Access\n");}
} else {
	$to     = $_GET[token];
	$ma     = $_GET[mac];
	$ip     = $_GET[ip];
	$query  = "Select mac from wifidog where ip=$ip";
	$result = mysql_query($query);
	if ($result != NULL) {
		$query  = "INSERT INTO wifidog(user, mac) VALUE('$to', '$ma') where ip=$ip";
		$result = mysql_query($query);}

	$sql    = "select mac from wifidog where mac='".$_GET[mac]."'";
	$result = mysql_query($sql);
	$row    = mysql_fetch_row($result);
	if ($row != NULL) {echo ("Auth: 1\n");
		echo ("Messages: Allow Access\n");
	} else {echo ("Auth: 0\n");
		echo ("Messages: No Access\n");}
}
?>