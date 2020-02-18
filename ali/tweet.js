function maxLength(element, max){
  value = element.value;
  max = parseInt(max);
  if(value.length > max){
      element.value = value.substr(0, max);
  }
}

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
        load_comment();
      }
    }
  })
})
})
load_comment();
function load_comment() {
  setTimeout(function (){
  $.ajax ({
    url:"fetch_comment.php",
    method:"post",
    success:function(data)
    {
      $('#display_comment').html(data);
    }
  })
},2000)
}
load_comment();
