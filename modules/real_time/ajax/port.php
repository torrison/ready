<?php

// Admin Reactions
if ($_SESSION['user_role'] > 0)
{	$output['debug'] = "Admin Reaction!<br />";
	$res = $GLOBALS['mysql_obj']->free_sql ("SELECT * from real_time_main");
	while ($row=mysql_fetch_array($res))
	{      $output['on_line_user'] .= "

      ID: ".$row['id']."
      Name ".$row['name']."
      Link_now: ".$row ['link_now']."
      IP: ".$row['ip']."
      Last Time:".$row['last_time']."
      Cookie = ".$row['cookie']."
      <br />Last Href = <a href=\"".$row['last_href']."\" target=\"_blank\">".$row['last_href']."</a>
      <br /><a style=\"cursor:pointer\">Manage Now</a><br /><br />";

      if (time() - $row['last_time'] > 5)
      {      	$GLOBALS['mysql_obj']->free_sql ("DELETE from real_time_main WHERE id = ".$row['id']);
      }
	}
}

//User Reactions
else
{
	// First Enter to Site from a Long time
	if (!isset($_COOKIE['real-time']))
	{		$random_key = rand(0, 999999);
		// User_Key
		setcookie("real-time", $random_key, time()+2500);

		// Add to DB Table
        $GLOBALS['mysql_obj']->free_sql ("INSERT INTO real_time_main (ip, cookie, about, last_time) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$random_key."', 'test', '".time()."')");
        setcookie("real-time_last", time(), time()+3);
	}

	// Update OnLine
	if (!isset($_COOKIE['real-time_last']))
	{
		// Last Enter
		$res = $GLOBALS['mysql_obj']->free_sql ("SELECT id, ip from real_time_main WHERE cookie = ".$_COOKIE['real-time']);
		$row = mysql_fetch_array($res);
        if ($row['id'] > 0)
     	$GLOBALS['mysql_obj']->free_sql ("UPDATE real_time_main SET last_time = '".time()."', last_href = '".C7_defend_get_fast ("now_url")."' WHERE cookie = ".$_COOKIE['real-time']);
     	else
     	$GLOBALS['mysql_obj']->free_sql ("INSERT INTO real_time_main (ip, cookie, about, last_time, last_href) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$_COOKIE['real-time']."', 'test', '".time()."', '".C7_defend_get_fast ("now_url")."')");
     	setcookie("real-time_last", time(), time()+3);
	}

	// Timer Reaction
	$output['debug'] = "Reaction!<br />IP = ".$_SERVER['REMOTE_ADDR']. " Cookie = ".$_COOKIE['real-time']." href = ".C7_defend_get_fast ("now_url")."<br />";
}
echo json_encode($output);
?>