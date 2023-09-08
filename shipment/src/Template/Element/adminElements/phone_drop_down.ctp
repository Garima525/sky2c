<style>
    .ct{
    display:none;
    }
.form-body {
  padding: 10px 20px !important;
}
.form .form-actions, .portlet-form .form-actions {
  background-color: #f5f5f5 !important;
  border-top: 1px solid #e7ecf1;
  margin: 0;
  padding: 20px !important;
}
p.note_msg {
  bottom: 0;
  position: relative;
  top: 20px;
}
</style>
<script type="text/javascript">
$(function(){
	$("#countries").msDropdown();

  /**************************************** phone number masking start here *********************************************/
  $('#phone').keydown(function (e) {
    var key = e.which || e.charCode || e.keyCode || 0;
    $phone = $(this);

    // Auto-format- do not expose the mask as the user begins to type
    if (key !== 8 && key !== 9) {
      if ($phone.val().length === 3) {
        $phone.val($phone.val() + '-');
      }
      if ($phone.val().length === 7) {
        $phone.val($phone.val() + '-');
      }
    }

    // Allow numeric (and tab, backspace, delete) keys only
    return (key == 8 || key == 9 || key == 46 || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
    
    }).bind('focus click', function () {
      $phone = $(this);
      var val = $phone.val();
      $phone.val('').val(val); // Ensure cursor remains at the end
    }).blur(function () {
      $phone = $(this);
  });
  /**************************************** phone number masking end here *********************************************/

});
</script>
