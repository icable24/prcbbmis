<html>
<head>
<title>Tippecanoe County GIS Request Form</title>
<script type="text/javascript">
 <!--// Written by: WillyDuitt@hotmail.com \\;
  function disableSelects(form){
    for(var i=0;i<form.elements.length;i++){
      if(form.elements[i].type.match(/select/i)){
         form.elements[i].disabled = 1;
      }
      if(form.elements[i].type.match(/checkbox/i)){
         form.elements[i].onclick = function(){
         this.parentNode.getElementsByTagName('select')[0].disabled =
         this.parentNode.getElementsByTagName('select')[0].disabled == 0 ? 1 : 0; 
        }
      }
    }
  }
 //-->
</script>
</head>

<body onload="disableSelects(document.forms['frmGISRequest'])">
<form name="frmGISRequest">
<table border="1" width="900" align="center">
<tr>
    <td colspan="2" width = "100%"><b>PAPER SIZE:</b></td>
</tr>
 <tr><td width = "15%">&nbsp;&nbsp;&nbsp;A(8 1/2" X 11")</td>
    <td width = "85%" align = "left">  <input type="checkbox" name="A" value="yes">&nbsp;&nbsp;&nbsp;
      <select name="COPIES_A">
        <option value="0">NUMBER OF COPIES
        <option value="1">1
        <option value="2">2
        <option value="3">3
        <option value="4">4
        <option value="5">5
      </select></td>
</tr>
<tr>
<td width = "15%">&nbsp;&nbsp;&nbsp;B(11" X 17")</td>
     <td width = "85%" align = "left"><input type="checkbox" name="B" value="yes">&nbsp;&nbsp;&nbsp;
     <select name="COPIES_B">
        <option value="0">NUMBER OF COPIES
        <option value="1">1
        <option value="2">2
        <option value="3">3
        <option value="4">4
        <option value="5">5
      </select></td>
</tr>
<tr>
<td width = "15%">
    &nbsp;&nbsp;&nbsp;C(18" X 24")</td>
    <td width = "85%" align = "left"><input type="checkbox" name="C" value="yes">&nbsp;&nbsp;&nbsp;
    <select name="COPIES_C">
        <option value="0">NUMBER OF COPIES
        <option value="1">1
        <option value="2">2
        <option value="3">3
        <option value="4">4
        <option value="5">5
      </select></td>
</tr>
<tr>
<td width = "15%">&nbsp;&nbsp;&nbsp;D(24" X 36")</td>
     <td width = "85%" align = "left"><input type="checkbox" name="D" value="yes">&nbsp;&nbsp;&nbsp;
     <select name="COPIES_D">
        <option value="0">NUMBER OF COPIES
        <option value="1">1
        <option value="2">2
        <option value="3">3
        <option value="4">4
        <option value="5">5
      </select>
</td>
</tr>
<tr>
  <td width = "15%">
      &nbsp;&nbsp;&nbsp;E(36" X 48")</td>
      <td width = "85%" align = "left"><input type="checkbox" name="E" value="yes">&nbsp;&nbsp;&nbsp;
      <select name="COPIES_E">
        <option value="0">NUMBER OF COPIES
        <option value="1">1
        <option value="2">2
        <option value="3">3
        <option value="4">4
        <option value="5">5
      </select>
</td></tr>    
<tr><td colspan = "2">&nbsp;</td>
</tr>
</table>
</form>
</body>