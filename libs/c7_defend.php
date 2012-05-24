<?php
// Input Data Filter. Root and Guest types
function C7_defend_filter ($defendtype, $data)
{
if ($defendtype == "1") {   // For Guest
//$data = str_replace ("'","&#8217;",$data);
//$data = str_replace ("'","''",$data);
//$data = str_replace ("\"","&#34;",$data);
//$data = str_replace ("\\","&#92;",$data);
$data = mysql_escape_string($data);
$data = str_replace ("&","&amp;",$data);
$data = str_replace ("<","&lt;",$data);
$data = str_replace (">","&gt;",$data);
$data = str_replace ("\"","&#34;",$data);


}
if ($defendtype == "2") {   // For Admin
$data = mysql_escape_string($data);
}

if ($defendtype == "3") {   // For Forms
$data = str_replace ("&","",$data);
$data = str_replace ("<","",$data);
$data = str_replace (">","",$data);
$data = str_replace ("\"","",$data);
$data = str_replace ("'","",$data);
}

if ($defendtype == "4") {   // For string, which works in filesystem functions
$data = preg_replace("/[^a-z0-9_]/i", "1", $data);
}
return $data;
}

// Defent Array [] {} etc. to string
function C7_defend_array ($defendtype, $array)
{    for ($i=0;$i<count($array); $i++)
		{
				$array[$i] = Ñ7_defend_filter ($defendtype, $array[$i]);
		}
	return $array;
}

// For Simplify Code
function C7_defend_post_fast ($name)
{
if (isset($_POST[$name])) return C7_defend_filter ("1", $_POST[$name]);
}

function C7_defend_get_fast ($name)
{
if (isset($_GET[$name])) return C7_defend_filter ("1", $_GET[$name]);
}

if ($GLOBALS['debug_mode'] == true) echo "C7_defend Lib Included<br /> URL Line Defended [".$_GET['url_line']."]";

?>