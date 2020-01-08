<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP suggested search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
       .search-form{

         padding: 25px;
    }
    .search-form h2{

             padding: 8px;
      font-size: 30px;
      margin-bottom: 4%;
      text-align: center;
    }
    .search-form input[type='text']{


    }
    .searchresult{

        padding: 0;
        margin: 0;
        background: #ddd;
    }
    .searchresult li{

            list-style: none;
      padding: 10px 23px;
      font-size: 18px;
      cursor: pointer;
    }
    .searchresult li:hover{

          background: red;
          color: #fff;
    }
  </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="search-form">
                  <h2>Like Google Autocomplete textbox</h2>
                    
               <div class="form-group">
                <input type="text" class="form-control" id="country" placeholder="Enter your keyword" name="country">
                 <div id="countrylist">
                    
                 </div>
                     
              </div>

               {{ csrf_field() }}
             
            </div>
        </div>
    </div>
</div>
 

<script>
$(document).ready(function(){

 $('#country').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetchdata') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countrylist').fadeIn();  
                    $('#countrylist').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#country').val($(this).text());  
        $('#countrylist').fadeOut();  
    });  

});
</script>
</body>
</html>