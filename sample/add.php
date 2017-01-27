<input type="button" onclick="addInput()"/>

<span id="responce"></span>
<script>
var countBox =1;
var boxName = 0;
function addInput()
{
     var boxName="textBox"+countBox; 
     document.getElementById('responce').innerHTML+='<br/><input type="text" id="'+boxName+'" value="'+boxName+'" "  /><br/>';
     countBox += 1;
}
</script>