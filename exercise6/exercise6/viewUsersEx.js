$(document).ready(function() {
  addTableContent(tableData)
});

function addTableContent(tableArray1) {
  var noPostTemplate = $('#noPostTemplate').html();
  var table = $('#forumTableBody');
  table.html("");
  if (tableArray1 == null) {
    table.append(noPostTemplate);
  } else {
    for (var i = tableArray1.length - 1; i >= 0; i--) {
      table.append("<tr><td > " + tableArray1[i].username + " </td> <td > " + tableArray1[i].password + " </td> </tr>");
    }
  }
}
