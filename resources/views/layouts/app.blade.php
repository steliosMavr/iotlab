<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IOTLAB</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap core CSS -->
       
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Material Design Bootstrap -->
       
        <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
       
        <!-- Your custom styles (optional) -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>
<body style="background-color:#cde6f2" data-spy="scroll" data-target="#scrollspy">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#3d3a3a">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <strong>IOTLAB</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
      <li class="nav-item">
          <a  href="{{ route('login') }}" class="btn btn-outline-blue-grey">
            <i class="fa fa-user-o mr-2" style="color:white;"></i><span style="color:white;font-size:12px;">εισοδος</span>
          </a>
        </li>
      @else
      <li class="nav-item dropdown">
        <a id="navbarDropdown" style="color:white;font-size:15px;" class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img src="/storage/users_avatars/{{auth()->user()->avatar}}" alt="thumbnail" class="rounded-circle mr-1"style="width: 32px;height:32px;">
          {{ Auth::user()->name }} <span class="caret"></span>
            </a>

           <div class="dropdown-menu dropdown-menu-right "  aria-labelledby="navbarDropdown">

            <a class="dropdown-item py-1" href="{{ route('dashboard') }}" style="font-size:13px;"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
            <a class="dropdown-item py-1" href="{{route('project.create')}}" style="font-size:13px;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Ανέβασμα</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item py-1"  style="font-size:13px;" href="{{ route('logout') }}"
           onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
<i class="fa fa-sign-out" aria-hidden="true"></i>

            Έξοδος
           </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                     </form>
                   </div>
             </li>


        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
      <!-- SCRIPTS -->




    <!-- JQuery -->
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>


    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="/js/tinymce/init_tinymce.js"></script>
      <script type="text/javascript" src="/js/main.js"></script>


      <script>

    
$('input[name=avatar]').change(function() { 
  
    var filename = $('input[type=file]').val().split('\\').pop();
 
 $("#avatarLabel").html(filename);

});

</script>


    
    <script>

    
    $('input[name=cover_image]').change(function() { 
      
        var filename = $('input[type=file]').val().split('\\').pop();
     
     $("#cover_image_label").html(filename);
 
    });

    </script>

    
 <script>
    $("#code_input").change(function() { 
      
        var filename = $('#code_input').prop("files");
       
        var names = $.map(filename, function(val) {
          var str="";
          str=val.name+"-"+str;
           return str; 
          
          });
     
     $("#code_label").html(names);
 
    });

    </script>





    <script>
    $("#basic_form").submit(function(e){
  e.preventDefault();
  var formData = new FormData($(this)[0]);
 

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"{{ URL::to('/update_basic_form') }}",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                  alert(data);
                if(data.msg=="success"){
                  $('#myTabs a[href="#history"]').tab('show')

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


    </script>


    <script>
    
$("#historyForm").submit(function(e){
  e.preventDefault();
  var formData = new FormData();
  formData.append("about",tinyMCE.activeEditor.getContent());

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"{{ URL::to('/update_history_form') }}",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                alert(data);
                if(data.msg=="success"){
                  $('#myTabs a[href="#software"]').tab('show')

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

    </script>


    <script>

$("#softwareForm").submit(function(e){
  e.preventDefault();
  var formData = new FormData($(this)[0]);


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

       $.ajax({
                type     :"post",   
                url      :"{{ URL::to('/update_software_form') }}",  
                data:formData,
                processData: false,
                contentType: false,
                success  : function(data) {
                alert(data);
                if(data.msg=="success"){
                  $('#myTabs a[href="#software"]').tab('show')

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
    </script>

<script>

 $('body').scrollspy({ target: '#scrollspy' });
  </script>





<script>
  $("#myNav li a").on('click', function (event) {
  
    $("#myNav li a").removeClass('active');
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

</script>



<script>
  $(".comm a").on('click', function (event) {
  
    $("#myNav li a").removeClass();
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

</script>

    
</body>
</html>
