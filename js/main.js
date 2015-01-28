 var strtxt;

$(function() {
         
              
 
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
    
    function editcat(el){  
                console.log('test2'); 
             var eForm = document.createElement("form");
             var eTxtinput = document.createElement("input"); 
             var eBtnSave   = document.createElement("button");
             var eBtnCancel   = document.createElement("button");
             
             var eAlcname=$(el).prev();
             var eEditimg=$(el);
             
             eTxtinput.type="text";
             eTxtinput.name="category";
             eTxtinput.value=$(el).prev().text();
             eBtnCancel.type="button";
             eBtnSave.type="button";
             eBtnCancel.innerHTML="Cancel";
             eBtnSave.innerHTML="Save";
             eBtnCancel.dataset.catname=$(el).prev().text();
             eBtnCancel.dataset.catid=$(el).attr("data-catid");
             eBtnCancel.onclick = function(){ cancelcat(this) };
             eBtnSave.onclick = function(){ savecat(this) };
             
             $(eTxtinput).addClass("category");
             $(eBtnSave).addClass("btn btn-default");
             $(eBtnCancel).addClass("btn btn-default cancel");
             
             $(eForm).append(eTxtinput,eBtnSave,eBtnCancel);
             $(el).parent().append(eForm);
             $(eAlcname).remove();
             $(eEditimg).remove();
                
             /*strtxt='<form><input class="category" type="text" name="category" value="';
             strtxt+=$(this).prev().text();  
             strtxt+='"/>';             
             strtxt+='<a class="btn btn-default" href="#" role="button">Save</a> <a class="btn btn-default cancel" href="#" role="button" data-catname="';
             strtxt+=$(this).prev().text(); 
             strtxt+='">Cancel</a></form>';
             $(this).parent().html(strtxt);*/
                
             
        };
        
        
            function  cancelcat(el){
            console.log('test');             
             strtxt='<strong class="catname">';
             strtxt+=$(el).attr('data-catname');
             strtxt+='</strong><img class="editcat" src="../img/edit.png" data-catid="';
             strtxt+=$(el).attr('data-catid');
             strtxt+='" onClick="editcat(this)">';
             $(el).parents("span").html(strtxt); 
             $(el).parents("form").remove();                          
        }; 
        
        function  savecat(el){
              $.ajax({
                type:"GET",
                url:"editcategories"+'/'+$(this).attr('data-catid')+'/'+$(el).prev().text(),
                data:'',
                success: function(){
                    
                }
            }); 
        }
 
