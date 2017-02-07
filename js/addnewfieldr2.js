
var countBox =1;
function add()
{
     var countBox; 
document.getElementById('responce2').innerHTML+='<table>\
                                                        <tr class="control-group">\
                                                            <td>\
                                                            <select class="form-control" id="bloodgroup"  name="bloodgroup" style="width: 2.3in">\
									 <?php\
									foreach($bank as $row){\
									'echo '<option value="'.$row['component'].'">'.$row['component'].'</option>';'\
									}\
									?>\
								</select>\
                                                            </td>\
                                                            <td style="padding-left: 20px">\
							  <div class="controls">\
                                                              <input id="qty" name="qty" type="text" class="form-control" required="" style="width: 100px">\
							  </div>\
                                                             </td>\
                                                                    </tr>\
                                                                        </table>';
    countBox += 1;
}