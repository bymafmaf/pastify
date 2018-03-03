$('#address-input').keyup(function(e) {
  $("#user-address").html(window.location.href + $(this).val());
});
$(document).ready(function() {
  $("#clean-button").click(function(){
    $("#message-box").html("");
  });
});
