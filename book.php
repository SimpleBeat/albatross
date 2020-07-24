<?

 include ( "btop.txt" );
$max = "1000"; // максимальное колличество букв (проделов, точек и т. п.) в сообщении

$timestamp = date("d M Y, H:i");

$form = "
<table align=\"center\" width=\"450\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\"><tr><td>
<Div class=\"maintext\">
<form name=\"form1\" method=\"post\" action=\"book.php\">
<Div class=\"maintext\">Имя:</Div>
  <input class=\"maintext\" type=\"text\" size=\"40\"name=\"name\"><br>
<Div class=\"maintext\">Отзыв:</Div>
  <textarea class=\"maintext\" rows=\"7\" cols=\"40\" name=\"mess\"></textarea><br>
  <input class=\"maintext\" type=\"submit\" name=\"Submit\" value=\"&nbspОпубликовать\">
</form>
</Div>
</td></tr></table><p>";

$table = "
<Div class=\"maintext\">
<table align=\"center\" width=\"450\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\">
  <tr> 
    <td width=\"225\" bgcolor=\"#fffccc\"><Span class=\"headerdate\" style=\"text-align: left; font-family: 'Verdana'; font-style: normal; font-weight: 700; line-height: normal; margin-top: 1px; margin-bottom: 3px; margin-left: 7px; margin-right: 3px\">$name</span></td>
    <td width=\"225\" bgcolor=\"#fffccc\" align=\"right\"><Span class=\"headerdate\" style=\"text-align: right; font-family: 'Verdana'; font-style: italic; font-weight: 400; line-height: normal; margin-top: 1px; margin-bottom: 3px; margin-left: 7px; margin-right: 3px\">$timestamp</span></td>
  </tr>
  <tr><td colspan=\"2\" width=\"450\" bgcolor=\"#e4effe\">
    <Div class=\"maintext\">$mess</div>
  </td></tr>
 </table>
</Div>";

$added = "
<table align=\"center\" width=\"400\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\"><tr><td>
<Div class=\"header\">Отзыв добавлен!</Div>
<Div class=\"maintext\">Вы можете вернуться к просмотру всех отзывов, нажав на слова 'Посмотреть отзывы' сверху в левой колонке.</Div>
</td></tr></table><p>";

$timestamp = date("d M Y, H:i");
$base = "data.dat";
touch("$base");

 if (seenform != "y")
	print "$form";
 if ($name == "" or $mess == "")
	{
	$error = "1";	
	}
 if (eregi("href",$mess))
 	{
 	$error = "2";
 	}
 if (eregi("href",$name))
 	{
 	$error = "2";
 	}
 if (eregi("http",$mess))
 	{
 	$error = "2";
 	}
 if (eregi("http",$name))
 	{
 	$error = "2";
 	}
 if (eregi("www",$mess))
 	{
 	$error = "2";
 	}
 if (eregi("www",$name))
 	{
 	$error = "2";
 	}
 if ($error == "")
 	{
	$fd = fopen("gb.txt","a");
 	fwrite ($fd, "$table\r\n");
 	fclose($fd);
	print "$added";
	}
 if ($error == "")
 	{
	touch("$base");
	$fd = fopen("$base","a");
 	fwrite ($fd, "$name:$mess:$REMOTE_ADDR\n");
 	fclose($fd);
	$general=file($base);
	$lines=count($general);
	$all_messages = $lines;
	}
 include ( "bottom.txt" );
?>