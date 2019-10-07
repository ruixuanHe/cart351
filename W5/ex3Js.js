$(document).ready(function() {
  $("#getInput").on("click", function() {
    console.log("clicked");
    let searchVal = $('#inputSearchVal').val();
    if (searchVal == "My Days")
      displayDayDetail();
    else
      displayNoData();
  });
});

function displayDayDetail() {
  var jqxhr = $.getJSON("dayDetail.json", function() {
    console.log("success");
    console.log(jqxhr.responseJSON);
    var jsonObject = jqxhr.responseJSON;
    for (var day in jsonObject) {
      if ($('#' + day).length) {
        $('#searchResultDiv').empty();
        $('#' + day).empty();
        $('#' + day).append("<h1>" + day + "</h1>")
        var dayDetail = jsonObject[day][0];
        for (var prop in dayDetail) {
          $('#' + day).append("<p>" + prop + " : " + dayDetail[prop] + "</p>")
        }
      }
    }
  });

}

function displayNoData() {
  $('#searchResultDiv').empty();
  $('#searchResultDiv').append("<p>No Data Found</p>");
}
