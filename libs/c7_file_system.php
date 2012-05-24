<?php
// Функция записи файла на сервер из переменной $_FILES (переменная $path должна содержать "/" в конце)
function C7_fs_file_upload($input_name, $path)
  {

     	if ($_FILES[$input_name]["tmp_name"] != "")
     	{
     	#DEBUG echo  "<script>alert('".$_FILES[$input_name]["name"]." ready!')</script>\n";
     	$new_file_name = C7_fs_is_exists_file ($_FILES[$input_name]["name"], $path);
     	#DEBUG echo  "<script>alert('".$new_file_name." готов!')</script>\n";
     	move_uploaded_file($_FILES[$input_name]["tmp_name"], $_SERVER["DOCUMENT_ROOT"].$path.$new_file_name);
     	if ($GLOBALS['debug_mode'] == true) echo  "<script>alert('".$_SERVER["DOCUMENT_ROOT"].$path.$new_file_name." saved!')</script>\n";
     	#DEBUG echo  "<script>alert('".$_SERVER["DOCUMENT_ROOT"].$path.$new_file_name." saved!')</script>\n";
     	#DEBUG echo  "<script>alert('".$_FILES[$input_name]["tmp_name"]." saved!')</script>\n";
     		if (C7_fs_file_check($new_file_name, $path)) return $new_file_name;
     		else
     		{
            rename ($_SERVER["DOCUMENT_ROOT"].$path.$new_file_name, $_SERVER["DOCUMENT_ROOT"].$path."error_file");
     		return "error_file";
     		}
     	}

  }

// Функция проверки наличия файла, возвращает или входное название или добавляет префикс (переменная $path должна содержать "/" в конце)
function C7_fs_is_exists_file ($filename, $path)
  {
	   $new_file_name = $filename;
       $unique_name_find = false;
       while ($unique_name_find != true) {
         if (file_exists($_SERVER["DOCUMENT_ROOT"].$path.$new_file_name))
         {
           $new_file_name = "copy".$i."_".$filename;
         }
         else {$unique_name_find = true;}
         $i++;
       }
       return $new_file_name;
  }

// Функция записи в файл $filename - путь к файлу относительно index.php или абсолютный путь, $data - информация для записи.
  function write_in_file ($filename, $data)
  {
  	$filename = C7_fs_stripfilename($filename);
	if ( is_writeable($filename) ) :
	$fh = fopen($filename, "a+");
	fwrite($fh, $data);
	fclose($fh); else :
	print "Could not open $filename for writing";
	endif;
	return true;
  }

// Функция проверки названия файла для защиты сервера.
  function C7_fs_file_check ($new_file_name, $path)
  {
  $file_ok = false;
  if (preg_match("/.png/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.jpg/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.jpeg/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.bmp/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.gif/i",$new_file_name)) $file_ok = true;

  if ( ($file_ok == true) && (C7_fs_verify_image($_SERVER["DOCUMENT_ROOT"].$path.$new_file_name)) ) $file_ok = true;

  if (preg_match("/.doc/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.xls/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.txt/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.docx/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.xlsx/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.ppt/i",$new_file_name)) $file_ok = true;
  if (preg_match("/.pptx/i",$new_file_name)) $file_ok = true;

  if ($file_ok == true) return true;
  else return false;
  }

// Проверка файла на вредоносный код / Scan image files for malicious code
function C7_fs_verify_image($file) {
	$txt = file_get_contents($file);
	$image_safe = true;
	if (preg_match('#&(quot|lt|gt|nbsp|<?php);#i', $txt)) { $image_safe = false; }
	elseif (preg_match("#&\#x([0-9a-f]+);#i", $txt)) { $image_safe = false; }
	elseif (preg_match('#&\#([0-9]+);#i', $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\`\'\"]*)script:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\`\'\"]*)javascript:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\'\"]*)vbscript:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*expression\([^>]*>#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*behaviour\([^>]*>#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#</*(applet|link|style|script|iframe|frame|frameset)[^>]*>#i", $txt)) { $image_safe = false; }
	return $image_safe;
}

// Очистить имя файла от лишних символов / Strip file name
function C7_fs_stripfilename($filename) {
	$filename = strtolower(str_replace(" ", "_", $filename));
	$filename = preg_replace("/^\W/", "", $filename);
	$filename = preg_replace('/([_-])\1+/', '$1', $filename);
	$filename = str_replace ("//","_",$filename);
	if ($filename == "") { $filename = "emptyfile"; }

	return $filename;
}

?>