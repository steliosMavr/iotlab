@extends('layouts.app')
@if(!$project->is_published())

  <div class="alert alert-success m-0  text-center" role="alert">
  <h5 class="h5-responsive d-inline" style="font-size:15px;">Αν θέλετε να δημοσιεύσετε το project σας πατήστε στον παρακάτω σύνδεσμο:<a href="/project/{{$project->id}}/publish" class="publish">Δημοσιευση</a></h5>

</div>
@endif
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">


        <div class="jumbotron p-0" id="intro">
   
   <img class="card-img-top img-fluid" src="/storage/projects/cover_images/{{$project->cover_image}}" style="height:400px">
       
   <div class="project_info p-3" style="background-color:grey;color:white;">
 
       <h2 class="h2-responsive">{{$project->name}}</h2>
 
     <p>{{$project->description}}</p>


 
 
   </div>
 
 
 
 </div>
   

        <div class="jumbotron p-0"  id="about" >
   
  
       
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Λειτουργία</h4>

      <hr>
 
     <p>{!!$project->about!!}</h4>
 
 
   </div>
 
   
     
 
 </div>



        <div class="jumbotron p-0" id="schemas">
        <div class="project_info p-3">
        <h4 class="h4-responsive ">Σχηματικά</h4>

<hr>

</div>

<div class="container">
<div class="row justify-content-center">
@foreach($project->getSchemas as $schemas)

<div class="col-md-12 py-2">
<p class="m-0 p-0 text-center font-weight-bold">{{$schemas->originalFileNames}}</p>

<img class="img-fluid mx-auto d-block" src="/storage/projects/schemas/{{$schemas->filename}}" style="width:100%;">
</div>

@endforeach
</div>
 </div>
 </div>



 
   


        <div class="jumbotron p-0"  id="code" >


 
     
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Κώδικας</h4>

      <hr>

   

      <div style="margin-top:5px;">
   


@if(count($code)>0)

@foreach($code as $c)

<p class="m-0 p-0 text-center font-weight-bold">{{$project->getCode[0]->originalFileNames}}</p>
<div class="col-md-12 py-3 mt-1" style="background-color:grey;  overflow-y: scroll;max-height:350px;">
<pre>
@foreach( $c as $k)
<code> {{$k}}</code>
@endforeach
</pre>
</div>

@endforeach
@endif


</div>






   </div>
 
   
     
 
 </div>
   


     
     <div class="jumbotron p-0"  id="comments" >
   
  
       
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Σχόλια</h4>

      <hr>
 
  <div class="row">
    <div class="col-md-12">
    
    @if (!Auth::guest())



    @if ($errors->has('comment'))
    <div class="alert alert-danger" role="alert">
    {{ $errors->first('comment') }}</div>
                                @endif

            

    <form id="comment-form" method="post" action="/comment/store" >

                       @csrf
                       <input type="hidden" name="project_id" value="{{$project->id}}" >

                        <textarea class="form-control" name="comment" placeholder="Γράψτε κάποιο σχόλιο.." require></textarea>
                        <button type="submit" class="btn btn-primary btn-block btn-md mt-2">Αποστολη</button>
                    </form>

      @else

    <p class="text-center">Παρακαλούμε <a href="/login">εισέλθετε</a> για να σχολιάσετε.</p>

      @endif
     
    </div>
  </div>



<!-- comment section -->



<div class="row mt-5">

@foreach($project->comments as $comment)
<div class="col-md-2 user_avatar">
        	        <img src="/storage/users_avatars/{{$comment->user->avatar}}" class="img-fluid">
        	      
        	    </div>

  <div class="col-md-10 comment-container ">
  <p><a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$comment->name}}</strong></a> </p>
  <div class="clearfix"></div>
  <p style="word-wrap: break-word;">{{$comment->comment}}</p>
  @if (!Auth::guest())

  <p style="font-size:12px;"><a class="reply" href="#" project_id="{{$project->id}}" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" >Απαντηση</a></p>
  @else
  <p style="font-size:12px;"><a href="/login">Απαντηση</a></p>
@endif
 <div class="reply-form ">
                                    
  <!-- Dynamic Reply form -->
                                    
  </div>
  <hr>

    <div class="row border-left">
     @foreach($comment->replies as $rep)
                                     @if($comment->id === $rep->comment_id)
                                   
                                     <div class="col-md-2 user_avatar">
        	        <img src="/storage/users_avatars/{{$rep->user->avatar}}" class="img-fluid">
        	      
        	    </div>

  <div class="col-md-10 reply-container">
  <p><a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{$rep->name}}</strong></a> </p>
  <div class="clearfix"></div>
  
  <p style="word-wrap: break-word;">{{$rep->reply}}</p>
  @if (!Auth::guest())

  <p style="font-size:12px;"><a class="reply-to-reply" href="#" project_id="{{$project->id}}" cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}" >Απαντηση</a></p>
  @else
  <p style="font-size:12px;"><a href="/login">Απαντηση</a></p>

  @endif
 <div class="reply-to-reply-form ">
                                    
  <!-- Dynamic Reply form -->
                                    
  </div>
  <hr>

  </div>


                                    @endif 
                                @endforeach


    </div>
  </div>
  
@endforeach



</div>



<!-- -->








    
   </div>
 
   
   
     
 
 </div>



   
   
 
   

    </div>


    <div class="col-md-4">

  <div class="row">
    <div class="col-md-12">
    <h5 class="m-0 p-0" style="font-family:Times New Roman", Times, serif">Δημιουργός</h5>
    <hr class="m-1">

       <div class="d-flex bg-white mt-2">
  <div class="p-2 bd-highlight"><img src="/storage/users_avatars/{{$project->user->avatar}}" alt="thumbnail" class="mr-1"style="width: 100px;height:100px;"></div>
  <div class="p-2 bd-highlight">
  <p style="color:#666" class="font-weight-bold">{{$project->user->name}}</p>
  
  
  </div>
</div>

  


    </div>




  </div>

  <div class="row">


    <div class="col-md-12 mt-4">
    <h5 class="m-0 p-0" style="font-family:Times New Roman", Times, serif">Δημιουργήθηκε</h5>
    <hr class="m-1">

    <p>{{date('F d, Y', strtotime($project->created_at))}}</p>


    </div>

    <div class="col-md-12 comm">
    <a href="#comments" class="btn btn-primary btn-block text-capitalize" role="button"><i class="fa fa-comment-o" aria-hidden="true"></i> Σχόλια</a>

    </div>

     @if (Auth::check() && Auth::User()->id==$project->user_id)
        <div class="col-md-12 mt-2">
      <a href="{{ route('project.edit',$project->id) }}" class="btn btn-light btn-block text-capitalize" role="button"><i class="fa fa-edit" aria-hidden="true"></i> Επεξεργασία</a>
  </div>
      @endif

  </div>
  

<div class="row sticky-top">
   <div class="col-md-12 mt-4 ">
    <h5 class="m-0 p-0" style="font-family:Times New Roman", Times, serif">Περιεχόμενα</h5>
    <hr class="m-1">

    
               
    <div id="scrollspy">

<!-- Links -->
<ul class="nav nav-pills default-pills smooth-scroll  flex-column" data-allow-hashes="" id="myNav">
  <li class="nav-item"><a class="nav-link active" href="#intro">{{$project->name}}</a></li>

<li class="nav-item"><a  href="#about">Τί αφορά</a></li>
<li class="nav-item"><a  href="#schemas">Schematics</a></li>
<li class="nav-item"><a  href="#code">Κώδικας</a></li>
<li class="nav-item"><a  href="#comments">Σχόλια</a></li>


</ul>
<!-- Links -->

</div>
                
                 
            



    </div>
</div>
   
  


    
    </div>




</div>


@endsection

