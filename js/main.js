$(function() {
  console.log('roekoe');

       var strtxt;         
 
        $('.like-btn').click(function(){
            $.ajax({
                type:"GET",
                url:"whiskylike"+'/'+$(this).attr('data-whiskyid')+'/'+$(this).attr('data-userid'),
                data:'',
                success: function(){
                    
                }
            });
        });
        
        
      
            $('.editcat').click(function(){
                  
             strtxt='<form><input class="datum" type="text" name="category" id="category" value="';
             strtxt+=$(this .catname).text();
             strtxt+='"/><input class="datum" type="hidden" name="categoryid" id="terugdatum" /><input type="submit" value="Save" id="save" /><input type="submit" value="Cancel" id="cancel" /></form>';
             $(this).parent().html(strtxt);
             console.log($(this).parent().text());
 
 
        });
        
        
        



});