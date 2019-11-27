$(document).ready(function() {
  addNotificationContent(tableData);
});

function addNotificationContent(tableData) {
  var postContent = $('#mainContent');
  postContent.html("");
  postContent.append("<div class='container display-1'>" + tableData[0].topic + "</div>");
  postContent.append("<div class='container' style='font-size: 15px;'>Create Date: " + tableData[0].createDate);
  postContent.append("<div class='container' style='font-size: 20px;'>User: " + tableData[0].currentUser + " says</div>");
  postContent.append("<div class='container' style='font-size: 30px;'>" + tableData[0].content + "</div>");

}
