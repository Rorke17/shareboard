$(document).ready(function(){

  $('#drop-area').on('dragenter', function(e){
    e.preventDefault();
    $(this).css('background', '#fff');
    $('#drop-area').css('opacity', '0.5');
  });

  $('#drop-area').on('drop', function(e){
    e.preventDefault();
  });

  $('#drop-area').on('drop', function(e){
    $(this).css('background', '#fff');
    e.preventDefault();
    var image = e.orginalEvent.dataTrnsfer.files;
     createFormData(image);
  });
});

function createFormData(image){
  var formImage = new FormData();
  formImage.append('userImage', image[0]);
  uploadFormData(formImage);
}

function uploadFormData(formData){
  $.ajax({
    url: "upload_image.php",
    type: "POST",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data){
      $('#drop-area').html(data);
    }
  });
}
