
var countBox =1;
function addInput()
{
     var countBox; 
     document.getElementById('responce1').innerHTML+='<table style="padding-bottom: 20px;">\
                                                        <tr class="control-group">\
                                                                <td>\
                                                            <select class="form-control" id="bloodgroup" name="bloodgroup" style="width: 100px">\
									<option selected="selected" disabled></option>\
                                                                        <option>A</option>\
									<option>B</option>\
									<option>AB</option>\
									<option>O</option>\
                                                                </select>\
                                                                     </td>\
                                                                     <td style="padding-left: 20px">\
                                                                <select class="form-control" name="rhtype" id="rhtype" style="width: 100px">\
									<option selected="selected" disabled></option>\
									<option>Positive</option>\
									<option>Negative</option>\
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
