//alert('coucou');

$(document).ready(function(){
 
$('form').submit(function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
    url:"add_comment.php",
    method:"POST",
    data: form_data,
    dataType:"JSON",
    success: function(data) {

      if(data.error != '')
      {
        $('#comment_form')[0].reset();
        $('#comment_message').html(data.error);
      }
    }
  })
})
})
