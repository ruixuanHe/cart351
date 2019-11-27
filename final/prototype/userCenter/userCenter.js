function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    }
    reader.readAsDataURL(input.files[0]);
  }
}


$(document).ready(function() {
  $("#imageUpload").change(function() {
    readURL(this);
  });
  uploadUserCenterInfo(userCenterData);
});

function uploadUserCenterInfo(userCenterData) {
  var url = "data:" + userCenterData[0].fileType + ";base64," + userCenterData[0].imgContent;
  $('#imagePreview').css('background-image', 'url(' + url + ')');
  $('#name').attr('placeholder', userCenterData[0].name);
  $('#condoUnit').attr('placeholder',userCenterData[0].condoUnit );
  }
