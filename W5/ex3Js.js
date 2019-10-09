$(document).ready(function() {
  $("#getInput").click(function() {
    console.log("clicked");
    let searchVal = $('#inputSearchVal').val();
    searchVal = searchVal.toLocaleLowerCase();
    if (searchVal == "day" ||
      searchVal == "transportation" ||
      searchVal == "breakfast" ||
      searchVal == "lunch" ||
      searchVal == "dinner" ||
      searchVal == "clothing" ||
      searchVal == "exercise")
      displayDayDetail(searchVal);
    else
      displayNoData();
  });
});


function displayDayDetail(searchVal) {
  var jqxhr = $.getJSON("dayDetail.json", function() {
    console.log("success");
    console.log(jqxhr.responseJSON);
    var jsonObject = jqxhr.responseJSON;
    for (var day in jsonObject) {
      if ($('#' + day).length) {
        $('#searchResultDiv').empty();
        $('#searchResultDiv').append("<p>Enter day/transportation/breakfast/lunch/dinner/clothing/exercise</p>");
        $('#' + day).empty();
        $('#' + day).append("<h1>" + day + "</h1>")
        var dayDetail = jsonObject[day][0];
        for (var prop in dayDetail) {
          if (prop == searchVal || searchVal == "day")
            $('#' + day).append("<p>" + prop + " : " + dayDetail[prop] + "</p>")
        }
      }
    }
  });
}

function displayNoData() {
  $('#searchResultDiv').empty();
  $('.dayDiv').empty();
  $('#searchResultDiv').append("<p>No Data Found</p>");
}
