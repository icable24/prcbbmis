<!DOCTYPE html>
<html>
<head>
    <title>Enable or Disable Checkbox on DropDown Selection - JavaScript</title>
    <style>
        body, select {
            font:14px Verdana;
        }
    </style>
</head>
<body>
    <div>
        Laptop: 
        <select id="sel" onchange="updateCheckBox(this)">
            <option>-- Select --</option>
            <option value="Del">Del</option>
            <option value="Asus">Asus</option>
        </select>
        <p>
            <input type="checkbox" name="donor" hidden="" id="chk1" value="Exchange Offer"/>  <br />
            <input type="checkbox" name="offer" hidden="" id="chk2" /> Gift Voucher <br />
            <input type="checkbox" name="offer" hidden="" id="chk3" /> Free UPS
        </p>
    </div>

<script>
    function updateCheckBox(opts) {
        var chks = document.getElementsByName("donor");

        if (opts.value == 'Del') {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].hidden = false;
            }
        }
        else {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].hidden = true;
                chks[i].checked = false;
            }
        }
    }
</script>
</body>
</html>