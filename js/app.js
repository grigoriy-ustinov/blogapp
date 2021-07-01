$(document).ready(function(){
  $(function () {

    $('#registerform').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'authentication.php',
        dataType: 'json',
        data: $('form').serialize(),
        success: function (response) {
          console.log(response)
          if(response['err'] =='true'){
            $('.formcontainer').append('<div class="alert alert-danger" role="alert">' +response['msg']+ '</div>')
            setTimeout(function(){ $('.alert').fadeOut("slow") }, 3000)
          }
          else{
            console.log('im in else with no error')
            window.location.assign('/blogapp/index.php')
          }
        }
      });

    });
    
    $('#loginform').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: 'authentication.php',
        dataType: 'json',
        data: $('form').serialize(),
        success: function (response) {
          console.log(response)
          if(response['err'] =='true'){
            $('.formcontainer').append('<div class="alert alert-danger" role="alert">' +response['msg']+ '</div>')
            setTimeout(function(){ $('.alert').fadeOut("slow") }, 3000)
          }
          else{
            console.log('im in else with no error')
            window.location.assign('/blogapp/index.php')
          }
        }
      });

    });

  });
});