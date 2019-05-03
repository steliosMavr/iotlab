@extends('layouts.app')

@section('content')


<section>
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">PROJECTS</p>

        
    </div>


    <div class="row mt-4">

      
      <div class="col-lg-12">
      <div class="alert alert-dark" role="alert">

                
                      <p class="lead" style="font-size:17px;">
                    Παρακάτω μπορείτε να δείτε κάποια απο τα project που έχουν ανέβει απο τους χρήστες του IOTLAB.Μπορείτε επίσης αν επιθημέιτε να επικοινωνήσετε με τον δημιουργό
                    για τυχόν απορίες ή ερωτήσεις που έχετε σχετικά με το συγκεκριμένο project.Άν έχετε και εσέις κάποιο project το οποίο θέλετε να μας δείξετε μπορείτε να το ανεβάσετε
                    από <a href="/project/create">εδώ</a>.         
                      </p>
                     
                 </div> 
        </div>




      </div>


<div class="row mt-5">


@if(count($projects)>0)
<?php $a = 0; ?>
                @foreach($projects as $project)
                    @if($project->hasPermission())
                    <?php $a = 1; ?>

 <div class="col-md-4">
  <div class="card m-1">
  <!-- Card image -->
  <a  href="/project/{{$project->id}}/show" >
                    <div class="view overlay">
                              <img src="/storage/projects/cover_images/{{$project->cover_image}}" alt="placeholder" style="width:100%;">
                              <div class="mask  waves-effect waves-light rgba-blue-strong p-2">
                                <p class="white-text font-weight-bold text-left" style="word-wrap:break-word;">{{$project->description}}</p>
                              </div>
                            </div>
                    </a>
                    <!-- Card content -->

      <hr class="m-0 p-0">
    <div class="card-body">
     <!-- Title -->
  <h6 class="card-title text-left" style="word-wrap:break-word;color: #879191;">{{$project->name}}</h6>

    </div>
    <div class="card-footer">

<small class="text-muted float-right text-truncate"> Δημιουργός:{{$project->user->name}}</small>


      <small class="text-muted float-left"><i class="fa fa-clock-o pr-1"></i>{{$project->created_at}}</small>
    

    </div>
  </div>
</div>




@endif
@endforeach
@endif



</div>





      
    </div>
  </section>







@endsection
