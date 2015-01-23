$(function() {
  console.log('roekoe');


        $('.like-btn').click(function(){
            id = $(this).attr('data-whiskyid');
            console.log(id);
            $.ajax({
                type:"GET",
                url:"whiskylike"+'/'+$(this).attr('data-whiskyid')+'/'+$(this).attr('data-userid'),
                data:'',
                success: function(){ 
                     var strHTML = "(Liked)";
                     $('#item'+id).html(strHTML);
                                        
                }
            });
        });



});
