$(document).ready(function() {
  addForumContent(voteInfo, voteDetailInfo);
});

function vote() {
  if (showLoginMessage == true) {
  } else {
    $("#loginSection").slideDown();
  }
}

function viewResult(){
  var voteResultContainer = $('#voteResultContainer');
  voteResultContainer.css("visibility","visible");
}

function addForumContent(voteInfo, voteDetailInfo) {
  var postContent = $('#voteTopic');
  postContent.html("");
  postContent.append("<div class='container display-1'>" + voteInfo[0].topic + "</div>");
  postContent.append("<div class='container' style='font-size: 15px;'>Create Date: " + voteInfo[0].createDate);
  postContent.append("<div class='container' style='font-size: 20px;'>User: " + voteInfo[0].currentUser );

  var voteResultContainer = $('#voteResultContainer');
  var totalAgree = 0;
  for (var i = 0; i < voteDetailInfo.length; i++) {
    totalAgree += parseInt(voteDetailInfo[i].selection);
  }
  var agreeRate = (totalAgree/ voteDetailInfo.length*100).toFixed(0);
  var disagreeRate = 100 - agreeRate;
  voteResultContainer.append("<div class='container' style='font-size: 20px;'>Agree Rate: " + agreeRate + "%");
  voteResultContainer.append('<div class="progress"><div class="progress-bar" role="progressbar" style="width: '+ agreeRate+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>');
  voteResultContainer.append("<div class='container' style='font-size: 20px;'>Disagree Rate: " + disagreeRate + "%" );
  voteResultContainer.append('<div class="progress"><div class="progress-bar" role="progressbar" style="width: '+ disagreeRate+'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>');
}
