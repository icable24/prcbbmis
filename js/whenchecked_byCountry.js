	
  function toggleStatus() {
   
    if ($('#p').is(':checked')) {
        $('#f3 :input').removeAttr('disabled');
        //
    } else {
        $('#f3 :input').attr('disabled', true);
    }
    if ($('#ffp').is(':checked')) {
        $('#f2 :input').removeAttr('disabled');
        //
    } else {
        $('#f2 :input').attr('disabled', true);
    }

    if ($('#wb').is(':checked')) {
        $('#f1 :input').removeAttr('disabled');
        //
    } else {
        $('#f1 :input').attr('disabled', true);
    }
	}
       
