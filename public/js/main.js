$(".myForm").submit(function(e){
  
  e.preventDefault();
  var formData = new FormData($(this)[0]);


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/store",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
           
                if(data.msg=="success"){
               alert("Η φόρμα αποθηκεύτικε επιτυχώς,μπορείτε να προχωρήσετε")

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});


$(".reply-container").delegate(".reply-to-reply","click",function(e){
e.preventDefault();
var well = $(this).parent().parent();
well.find(".reply-to-reply").empty();


var cid = $(this).attr("cid");
var project_id = $(this).attr('project_id');
var token = $(this).attr('token');

var name = $(this).attr('name_a');

var form = '<form method="post" action="/replies/store"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="project_id" value="'+ project_id +'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Γράψτε μία απάντηση" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary btn-md" type="submit" value="αποστολη"> </div></form>';

well.find(".reply-to-reply-form").append(form);

});





$(".comment-container").delegate(".reply","click",function(e){
  e.preventDefault();
  var well = $(this).parent().parent();
  well.find(".reply-form").empty();

  var cid = $(this).attr("cid");
  var project_id = $(this).attr('project_id');


  var name = $(this).attr('name_a');
  var token = $(this).attr('token');


  var form = '<form method="post" action="/replies/store"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="project_id" value="'+ project_id +'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Γράψτε μία απάντηση" > </textarea> </div> <div class="form-group"> <input class="btn btn-primary btn-md" type="submit" value="αποστολη"> </div></form>';

  well.find(".reply-form").append(form);

});

$(".myForm1").submit(function(e){
  
  e.preventDefault();
  var formData = new FormData($(this)[0]);


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/update",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
             
                if(data.msg=="success"){
               alert("Η φόρμα αποθηκεύτικε επιτυχώς,μπορείτε να προχωρήσετε")

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});

$("#updateHistory").submit(function(e){
  e.preventDefault();
   
  var formData = new FormData();
  formData.append('about',tinyMCE.activeEditor.getContent());
  formData.append('project_id',$("#pr_id").val());




  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/update",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
             
                if(data.msg=="success"){
               alert("Η φόρμα αποθηκεύτικε επιτυχώς,μπορείτε να προχωρήσετε")

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});


$(".aboutForm").submit(function(e){
  e.preventDefault();
  
  var formData = new FormData();
  formData.append('about',tinyMCE.activeEditor.getContent());




  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/store",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                 
                if(data.msg=="success"){
               alert("Η φόρμα αποθηκεύτικε επιτυχώς,μπορείτε να προχωρήσετε")

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});

$("#update_project").submit(function(e){
  e.preventDefault();
  var formData = new FormData($(this)[0]);
  

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/updateTheForm",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                 
                if(data.msg=="success"){
                 alert("Το Project σας ανέβηκε με επιτυχία");
                  location.href = "/dashboard";

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});


$("#upload_project").submit(function(e){
 
  e.preventDefault();
  var formData = new FormData($(this)[0]);


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"/project/saveTheForm",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                  
                if(data.msg=="success"){
                 alert("Το Project σας ανέβηκε με επιτυχία");
                  location.href = "/dashboard";

                }


                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

        

});



$('input[name=avatar]').change(function() { 
var filename = $('input[type=file]').val().split('\\').pop();

$(".custom-file-label ").html(filename);

});

$('input[name=cover_image]').change(function() { 
   
var filename = $('input[type=file]').val().split('\\').pop();

$("#cover_image_label").html(filename);

});

$("#code_input").change(function() { 
  
var filename = $('#code_input').prop("files");

var names = $.map(filename, function(val) {
  var str="";
  str=val.name+"-"+str;
   return str; 
  
  });

$("#code_label").html(names);

});

$("#schemas_input").change(function() { 
  
var filename = $('#schemas_input').prop("files");

var names = $.map(filename, function(val) {
var str="";
str=val.name+"-"+str;
 return str; 

});

$("#schemas_label").html(names);

});


function changeTabs(tabName){
//$('#myTabs a[href="#history"]').tab('show') // Select tab by name
var tabName="'"+tabName+"'";


$("#myTabs a[href="+tabName+"]").tab('show') // Select tab by name
}

$(".publish").click(function(e){
  e.preventDefault();

  var msg="Είστε σίγουροι ότι θέλετε το project σας να γίνει δημόσιο?";
  if(confirm(msg)){
        
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
         $.ajax({
                  type     :"post",   
                  url      :$(this).attr('href'),         
                  success  : function(data) {
                  
                    if(data=="true"){
                      window.location.href = "/dashboard";
  
                    }else{
                      alert("Κάτι πήγε στραβά");
                    }
                 
                
  
                   jQuery.each(data.errors, function(key, value){
                     alert(value);	
                        });
                  },
                  error:function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        
        }  
   
              });


  }
  
  


});

$(".delete").click(function(e){
  e.preventDefault();
  var msg="Είστε σίγουρος ότι θέλετε να διαγράψετε το συγκεκριμένο project ?";

  if(confirm(msg)){

  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :$(this).attr('href'),         
                success  : function(data) {
                  if(data=="true"){
                    alert('Το project σας διαγράφτηκε επιτυχώς');
                    window.location.href = "/dashboard";

                  }else{
                    alert("Κάτι πήγε στραβά")
                  }
               
              

                 jQuery.each(data.errors, function(key, value){
                   alert(value);	
                      });
                },
                error:function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      
      }  
 
            });

    
          }
 


});

  $("#side li a").on('click', function (event) {
   
    $("#side li a").removeClass('active');
    $(this).addClass('active');

     if (this.hash !== "") {
       event.preventDefault();
       

       const hash = this.hash;
      

       $('html, body').animate({
         scrollTop: $(hash).offset().top
       }, 800, function () {

         window.location.hash = hash;
       });
     }
   });

