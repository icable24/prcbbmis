
var countBox =1;
var boxName = 0;
function addInput()
{
     var boxName="textBox"+countBox; 
     document.getElementById('responce').innerHTML+='<div class="control-group">\
                                                     <label class="control-label" for="bloodgroup">Blood Type</label>\
                                                     <select class="form-control" id="bloodgroup" name="bloodgroup" disabled>\
                                                     <option selected="selected" disabled></option>\
                                                      <option>A</option>\
                                                        <option>B</option>\
							<option>AB</option>\
							<option>O</option>\
                                                        </select>\
                                                         <div class="control-group">\
								<label class="control-label" for="rhtype">Rh Type</label>\
                                                                <select class="form-control" name="rhtype" id="rhtype" disabled >\
									<option selected="selected" disabled></option>\
									<option>Positive</option>\
									<option>Negative</option>\
								</select>\
							</div>\n\
                                                            <div id="f2">\
                                                        <div class="control-group">\
                                                            <label class="control-label" for="bloodgroup">Blood Component</label>\
								<select class="form-control" id="bloodgroup"  name="bloodgroup" >\
									<option selected="selected" disabled></option>\
									<option>Red Cell</option>\
									<option>Fresh Frozen Plasma</option>\
									<option>Platelet Concentrate</option>\
									<option>Whole Blood</option>\
								</select>\
							</div>\
                                                        </div>';
     countBox += 1;
}
