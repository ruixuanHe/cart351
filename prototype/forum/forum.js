$(document).ready(function() {
  getData();
  $(".tableButton").click(function() {
    var id = $(this).attr('id');
    var url = "../forum/displayPage.php?selectedId=" + id;
    window.location.href = url;
  });
});



function postNew() {
  if (showLoginMessage == true) {
    window.location.href = "../forum/postPage.php";
  } else {
    $("#loginSection").slideDown();
  }
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


function addTableContent(tableArray1) {
  var noPostTemplate = $('#noPostTemplate').html();
  var table = $('#forumTableBody');
  table.html("");
  if (tableArray1 == null) {
    table.append(noPostTemplate);
  } else {
    for (var i = tableArray1.length - 1; i >= 0; i--) {
      table.append("<tr> <td><p  id = " + tableArray1[i].topic + " class = 'tableButton'>" + tableArray1[i].topic + "</p></td> <td > " + tableArray1[i].currentUser + " </td> <td > " + tableArray1[i].date + " </td> </tr>");
    }
  }
}
