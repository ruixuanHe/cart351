$(document).ready(function() {
  getData();
});

function reply() {
  $("#replySection").slideDown();
}

function getData() {
  var tableData = (function() {
    var tableArray = null;
    $.ajax({
      'async': false,
      'global': false,
      'url': "../dataBase/forumData.json",
      'dataType': "json",
      'success': function(data) {
        tableArray = data;
        addTableContent(tableArray);
      },
      'error': function(data) {
        tableArray = null;
        addTableContent(tableArray);
      },
    });
    return tableArray;
  })();
}

function addTableContent(postArray) {
  var postContent = $('#mainContent');
  postContent.html("");
  for (var i = postArray.length - 1; i >= 0; i--) {
    if (postArray[i].topic == selectedId) {
      postContent.append("<div class='container display-1'>" + postArray[i].topic + "</div>");
      postContent.append("<div class='container' style='font-size: 20px;'>User: " + postArray[i].currentUser + " says</div>");
      postContent.append("<div class='container' style='font-size: 30px;'>" + postArray[i].content + "</div>");
      for (var j = 0; j < postArray[i].reply.length; j++) {
        postContent.append("<div class='container' style='font-size: 20px;'>User: " + postArray[i].reply[j].currentUser + " says</div>");
        postContent.append("<div class='container' style='font-size: 30px;'>" + postArray[i].reply[j].content + "</div>");
      }
    }
  }
}
