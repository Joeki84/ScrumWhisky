$(function() {
  console.log('roekoe');


        $('.like-btn').click(function(){
            $.ajax({
                type:"GET",
                url:"whiskylike"+'/'+$(this).attr('data-whiskyid')+'/'+$(this).attr('data-userid'),
                data:'',
                success: function(){
                    
                }
            });
        });



});