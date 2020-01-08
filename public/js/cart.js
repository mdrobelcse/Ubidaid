$(function(){
    $(".addtocart").on("submit", function(e){
        e.preventDefault();


        var form = $(this);
        var url = form.attr("action");
        var type = form.attr("method");
        var data = form.serialize();

        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType: "JSON",
            success: function(data){
                if(data == "success"){
                    toastr.success('product added to your cart','success',{
                        closeButton:true,
                        progressBar:true,
                    });
                }else if(data == "error"){
                    toastr.info('product already added to your cart','info',{
                        closeButton:true,
                        progressBar:true,
                    });
                }
            },


        });




    });




});
