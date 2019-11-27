$(document).ready(function() {
  addForumContent(forumData, forumReplyData);
});

function reply() {
  if (showLoginMessage == true) {
    $("#replySection").slideDown();
  } else {
    $("#loginSection").slideDown();
  }
}


function addForumContent(forumData, forumReplyData) {
  var postContent = $('#mainContent');
  postContent.html("");
  postContent.append("<div class='container display-1'>" + forumData[0].topic + "</div>");
  postContent.append("<div class='container' style='font-size: 15px;'>Create Date: " + forumData[0].createDate);
  postContent.append("<div class='container' style='font-size: 20px;'>User: " + forumData[0].currentUser + " says</div>");
  postContent.append("<div class='container' style='font-size: 30px;'>" + forumData[0].content + "</div>");
  for (var j = 0; j < forumReplyData.length; j++) {
    postContent.append("<div class='container' style='font-size: 20px;'>User: " + forumReplyData[j].currentUser + " says</div>");
    postContent.append("<div class='container' style='font-size: 10px;'>Create Date: " + forumReplyData[j].createDate);
    postContent.append("<div class='container' style='font-size: 30px;'>" + forumReplyData[j].content + "</div>");
  }
}
