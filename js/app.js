$('#address-input').keyup(function(e) {
  $("#user-address").html(window.location.href + "share.php?id=" + $(this).val());
});
$(document).ready(function() {
  $("#clean-button").click(function(){
    $("#message-box").html("");
  });
});
