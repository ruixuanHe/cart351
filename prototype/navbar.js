$(document).ready(function() {
  loadNavLoginMassage();
});

function loadNavLoginMassage() {
  var isLoginTemplate = $('#isLoginTemplate').html();
  var nonloginTemplate = $('#nonloginTemplate').html();

  $('#targetTable').remove();
  if (showLoginMessage == true) {
    $('#navLeft').append(isLoginTemplate);
    var navLoginString = 'Login As: ' + currentUser;
    $("#loginInfo").text(navLoginString);
  } else {
    $('#navLeft').append(nonloginTemplate);
  }
}
