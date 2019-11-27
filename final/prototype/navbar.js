$(document).ready(function() {
  loadNavLoginMassage();
  if(adminModel == true){
    $("#NotificationHref").attr("href", "../notification/notificationAdmin.php")
    $("#ForumHref").attr("href", "../forum/forumAdmin.php");
    $("#VoteHref").attr("href", "../vote/voteAdmin.php");
  }
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
  };
}
