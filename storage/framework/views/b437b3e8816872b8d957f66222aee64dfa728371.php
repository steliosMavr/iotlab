<?php if(!$project->is_published()): ?>

  <div class="alert alert-success m-0  text-center" role="alert">
  <h5 class="h5-responsive d-inline" style="font-size:15px;">Αν θέλετε να δημοσιεύσετε το project σας πατήστε στον παρακάτω σύνδεσμο:<a href="/project/<?php echo e($project->id); ?>/publish" class="publish">Δημοσιευση</a></h5>

</div>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">


        <div class="jumbotron p-0" id="intro">
   
   <img class="card-img-top img-fluid" src="/storage/projects/cover_images/<?php echo e($project->cover_image); ?>" style="height:400px">
       
   <div class="project_info p-3" style="background-color:grey;color:white;">
 
       <h2 class="h2-responsive"><?php echo e($project->name); ?></h2>
 
     <p><?php echo e($project->description); ?></p>


 
 
   </div>
 
 
 
 </div>
   

        <div class="jumbotron p-0"  id="about" >
   
  
       
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Λειτουργία</h4>

      <hr>
 
     <p><?php echo $project->about; ?></h4>
 
 
   </div>
 
   
     
 
 </div>



        <div class="jumbotron p-0" id="schemas">
        <div class="project_info p-3">
        <h4 class="h4-responsive ">Σχηματικά</h4>

<hr>

</div>

<div class="container">
<div class="row justify-content-center">
<?php $__currentLoopData = $project->getSchemas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schemas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-12 py-2">
<p class="m-0 p-0 text-center font-weight-bold"><?php echo e($schemas->originalFileNames); ?></p>

<img class="img-fluid mx-auto d-block" src="/storage/projects/schemas/<?php echo e($schemas->filename); ?>" style="width:100%;">
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
 </div>
 </div>



 
   


        <div class="jumbotron p-0"  id="code" >


 
     
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Κώδικας</h4>

      <hr>

   

      <div style="margin-top:5px;">
   


<?php if(count($code)>0): ?>

<?php $__currentLoopData = $code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<p class="m-0 p-0 text-center font-weight-bold"><?php echo e($project->getCode[0]->originalFileNames); ?></p>
<div class="col-md-12 py-3 mt-1" style="background-color:grey;  overflow-y: scroll;max-height:350px;">
<pre>
<?php $__currentLoopData = $c; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<code> <?php echo e($k); ?></code>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</pre>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


</div>






   </div>
 
   
     
 
 </div>
   


     
     <div class="jumbotron p-0"  id="comments" >
   
  
       
   <div class="project_info p-3">
   <h4 class="h4-responsive ">Σχόλια</h4>

      <hr>
 
  <div class="row">
    <div class="col-md-12">
    
    <?php if(!Auth::guest()): ?>



    <?php if($errors->has('comment')): ?>
    <div class="alert alert-danger" role="alert">
    <?php echo e($errors->first('comment')); ?></div>
                                <?php endif; ?>

            

    <form id="comment-form" method="post" action="/comment/store" >

                       <?php echo csrf_field(); ?>
                       <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>" >

                        <textarea class="form-control" name="comment" placeholder="Γράψτε κάποιο σχόλιο.." require></textarea>
                        <button type="submit" class="btn btn-primary btn-block btn-md mt-2">Αποστολη</button>
                    </form>

      <?php else: ?>

    <p class="text-center">Παρακαλούμε <a href="/login">εισέλθετε</a> για να σχολιάσετε.</p>

      <?php endif; ?>
     
    </div>
  </div>



<!-- comment section -->



<div class="row mt-5">

<?php $__currentLoopData = $project->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-2 user_avatar">
        	        <img src="/storage/users_avatars/<?php echo e($comment->user->avatar); ?>" class="img-fluid">
        	      
        	    </div>

  <div class="col-md-10 comment-container ">
  <p><a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?php echo e($comment->name); ?></strong></a> </p>
  <div class="clearfix"></div>
  <p style="word-wrap: break-word;"><?php echo e($comment->comment); ?></p>
  <?php if(!Auth::guest()): ?>

  <p style="font-size:12px;"><a class="reply" href="#" project_id="<?php echo e($project->id); ?>" cid="<?php echo e($comment->id); ?>" name_a="<?php echo e(Auth::user()->name); ?>" token="<?php echo e(csrf_token()); ?>" >Απαντηση</a></p>
  <?php else: ?>
  <p style="font-size:12px;"><a href="/login">Απαντηση</a></p>
<?php endif; ?>
 <div class="reply-form ">
                                    
  <!-- Dynamic Reply form -->
                                    
  </div>
  <hr>

    <div class="row border-left">
     <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if($comment->id === $rep->comment_id): ?>
                                   
                                     <div class="col-md-2 user_avatar">
        	        <img src="/storage/users_avatars/<?php echo e($rep->user->avatar); ?>" class="img-fluid">
        	      
        	    </div>

  <div class="col-md-10 reply-container">
  <p><a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?php echo e($rep->name); ?></strong></a> </p>
  <div class="clearfix"></div>
  
  <p style="word-wrap: break-word;"><?php echo e($rep->reply); ?></p>
  <?php if(!Auth::guest()): ?>

  <p style="font-size:12px;"><a class="reply-to-reply" href="#" project_id="<?php echo e($project->id); ?>" cid="<?php echo e($comment->id); ?>" name_a="<?php echo e(Auth::user()->name); ?>" token="<?php echo e(csrf_token()); ?>" >Απαντηση</a></p>
  <?php else: ?>
  <p style="font-size:12px;"><a href="/login">Απαντηση</a></p>

  <?php endif; ?>
 <div class="reply-to-reply-form ">
                                    
  <!-- Dynamic Reply form -->
                                    
  </div>
  <hr>

  </div>


                                    <?php endif; ?> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
  </div>
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
  <div class="p-2 bd-highlight"><img src="/storage/users_avatars/<?php echo e($project->user->avatar); ?>" alt="thumbnail" class="mr-1"style="width: 100px;height:100px;"></div>
  <div class="p-2 bd-highlight">
  <p style="color:#666" class="font-weight-bold"><?php echo e($project->user->name); ?></p>
  
  
  </div>
</div>

  


    </div>




  </div>

  <div class="row">


    <div class="col-md-12 mt-4">
    <h5 class="m-0 p-0" style="font-family:Times New Roman", Times, serif">Δημιουργήθηκε</h5>
    <hr class="m-1">

    <p><?php echo e(date('F d, Y', strtotime($project->created_at))); ?></p>


    </div>

    <div class="col-md-12 comm">
    <a href="#comments" class="btn btn-primary btn-block text-capitalize" role="button"><i class="fa fa-comment-o" aria-hidden="true"></i> Σχόλια</a>

    </div>

     <?php if(Auth::check() && Auth::User()->id==$project->user_id): ?>
        <div class="col-md-12 mt-2">
      <a href="<?php echo e(route('project.edit',$project->id)); ?>" class="btn btn-light btn-block text-capitalize" role="button"><i class="fa fa-edit" aria-hidden="true"></i> Επεξεργασία</a>
  </div>
      <?php endif; ?>

  </div>
  

<div class="row sticky-top">
   <div class="col-md-12 mt-4 ">
    <h5 class="m-0 p-0" style="font-family:Times New Roman", Times, serif">Περιεχόμενα</h5>
    <hr class="m-1">

    
               
    <div id="scrollspy">

<!-- Links -->
<ul class="nav nav-pills default-pills smooth-scroll  flex-column" data-allow-hashes="" id="myNav">
  <li class="nav-item"><a class="nav-link active" href="#intro"><?php echo e($project->name); ?></a></li>

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


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>