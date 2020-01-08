$().ready(function(){

    $("#country").keyup(function(){

          var query = $(this).val();

          if (query !='') {

              $.ajax({
 
                   url: "{{ url('searchcountryresult') }}",
                   method:"POST",
                   data:{query:query},
                   success:function(data)
                   {
                       $('#searchresult').fadeIn();
                       $('#searchresult').html(data);
                   }
              });
          }
          else{

               $('#searchresult').fadeOut();
               $('#searchresult').html(""); 
          }
    });

      $(document).on('click','li',function(){
           
               $('#country').val($(this).text());
               $('#searchresult').fadeOut();
      });
});