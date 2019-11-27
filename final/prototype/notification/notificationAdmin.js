$(document).ready(function() {
  addTableContent(tableData);
  $(".tableButton").click(function() {
    var id = $(this).attr('id');
    var url = "../notification/displayNotification.php?selectedId=" + id;
    window.location.href = url;
  });
  $(".tableDeleteButton").click(function() {
    var id = $(this).attr('id');
    var url = "../notification/delete.php?del=" + id;
    $.ajax({
      url: url,
      cache: false,
      success: function(result) {
      location.reload();
      }
    });
  });
});

function postNew() {
  if (showLoginMessage == true) {
    $("#replySection").slideDown();
  } else {
    $("#loginSection").slideDown();
  }
}

function addTableContent(tableData) {
  var noPostTemplate = $('#noPostTemplate').html();
  var table = $('#notificationTableBody');
  table.html("");
  if (tableData == null) {
    table.append(noPostTemplate);
  } else {
    for (var i = tableData.length - 1; i >= 0; i--) {
      table.append("<tr> <td><p  id = " + tableData[i].id + " class = 'tableButton'>" + tableData[i].topic + "</p></td> <td > " + tableData[i].createDate + " </td> <td><p  id = " + tableData[i].id + " class = 'tableDeleteButton'>Delete</p></td></tr>");
    }
  }
}
