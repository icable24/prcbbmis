<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width=100%>
<td width = "10%" valign="center" align="center"><p>Product</p></td>
<td width = "10%" valign="top" align="center">
<?php
$item = $_GET["product"];
if ($item == "")
{
	$item = 1;
}
?>
<select onChange="window.location='ban.php?product='+this.value" >
<?php
$product = array(
	"",
	"PC",
	"Scanner",
	"Printer",
	"Monitor");
for ($i = 1; $i <= 4; $i++)
{
?>
<option value="<?=$i?>" <? if ($item == $i) { print "SELECTED";}?>> <?=$product[$i]?></option>
<?php
}
?>
</select>
</td>
<td width= "50" valign="middle"><img src = "<?=$item?>.gif" width="32" height="20"/>
</td>
</table>
</body>
</html>