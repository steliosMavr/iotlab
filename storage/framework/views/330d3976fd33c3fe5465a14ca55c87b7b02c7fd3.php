<?php $__env->startSection('content'); ?>


<div class="container jumbotron p-3 text-center">


  <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>


                    <?php if(!auth()->user()->verified()): ?>
                        <div class="alert alert-danger p-2 m-2 text-left" role="alert">
                           <p class="p-0 m-0" style="font-size:14px;"><strong>Παρακαλούμε ενεργοποιήστε τον λογιαριασμό σας για να
                                έχετε πρόσβαση σε όλες τις λειτουργίες της ιστοσελίδας μας.Σάς έχει αποσταλεί ο κωδικός ενεργοποίησης στο E-mail σας.</strong>
                        </p>
                        </div>
                        <br>
                    <?php endif; ?>



<div class="section-header py-2">
<h5 class="h5-responsive d-inline section-subtitles" style="font-size:22px;">Λογαριασμός</h5>
</div>

        
  


 <div class="row">

                   


                   


<div class="col-md-4 user_avatar">
<img src="/storage/users_avatars/<?php echo e(auth()->user()->avatar); ?>" class="rounded-circle"style="width: 190px">
</div>

<div class="col-md-4 mt-4"> 
<form enctype="multipart/form-data" action="<?php echo e(route('dashboard')); ?>" method="POST">
<?php echo csrf_field(); ?>
<div class="form-inline">
  <div class="form-group">
  <div class="col">
Αλλαγή φωτογραφίας

<div class="input-group mt-2">

<div class="custom-file">


<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<input type="file" class="custom-file-input" id="inputGroupFile01" name="avatar" aria-describedby="inputGroupFileAddon01" required>
<label class="custom-file-label" for="inputGroupFile01" id="avatarLabel"></label>

</div>
</div>
<?php if($errors->has('avatar')): ?>
          <strong style="color:red;font-size:14px;"><p class="p-2 m-0"><?php echo e($errors->first('avatar')); ?></p></strong>
             <?php endif; ?>
<button type="submit" class="btn btn-primary btn-block m-">Ανεβασμα</button>

</div>

        
       
       
        
        
         
        </div>
         
       
       
        </div>


         </form>
         </div>



</div>
</div>


<div class="container jumbotron p-3 mt-2 text-center">

<div class="section-header py-2">
<h5 class="h5-responsive d-inline section-subtitles" style="font-size:22px;">Ιδιωτικά Projects</h5>
</div>




<div class="row p-2">



<?php if(count($projects)>0): ?>
<div class="alert alert-info text-left p-2 " role="alert">
<p>Τα ιδιωτικά projects μπορείτε να τα βλέπετε μόνο εσείς.Άν επιθυμήτε να γίνουν δημόσια μπορείτε να πατήσετε το κουμπί <span style="color:green;">Δημοσίευση</span> το οποίο βρισκετε
κάτω δεξια στα project σας.Τό project σας θα μπορούν να το βλέπουν και άλλοι χρήστες του IOTLAB μετά απο 2-3 μέρες.
</p>
</div>


                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$project->is_published()): ?>
 <div class="col-md-4">
  <div class="card m-1">
  <!-- Card image -->
  <a  href="<?php echo e(route('project.show',$project->id)); ?>" >
                    <div class="view overlay">
                              <img src="/storage/projects/cover_images/<?php echo e($project->cover_image); ?>" alt="placeholder" style="width:100%;">
                              <div class="mask  waves-effect waves-light rgba-blue-strong p-2">
                                <p class="white-text font-weight-bold text-left" style="word-wrap:break-word;"><?php echo e($project->description); ?></p>
                              </div>
                            </div>
                    </a>
                    <!-- Card content -->

      <hr class="m-0 p-0">
    <div class="card-body">
     <!-- Title -->
  <h6 class="card-title text-left" style="word-wrap:break-word;color: #879191;"><?php echo e($project->name); ?></h6>

    </div>
    <div class="card-footer">

      
      <small class="text-muted float-left"><i class="fa fa-clock-o pr-1"></i><?php echo e($project->created_at); ?></small>
      <?php if(!$project->is_published()): ?>
      <small class="text-muted float-right"> <a  style="color:red;"   href="/project/<?php echo e($project->id); ?>/delete" class="dark-text delete">Διαγραφή</a></small>

      <small class="text-muted float-right"> <a href="/project/<?php echo e($project->id); ?>/publish" class="dark-text publish" >Δημοσίευση / </a></small>
      
      
      <?php else: ?>
      <small class="text-muted float-right"> <a  style="color:red;"   href="/project/<?php echo e($project->id); ?>/delete" class="dark-text delete">Διαγραφή</a></small>

      <small class="text-muted float-right text-success">Δημοσιεύτικε / </small>

      <?php endif; ?>



    </div>
  </div>
</div>


  <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>





                  

                  <?php else: ?>

  <div class="col mt-2">
<p class="text-muted">Ανεβάστε το πρώτο σας project <a href="/project/create">τώρα</a></p>
                  
</div>

           
<?php endif; ?>





</div>





</div>






<div class="container jumbotron p-3 mt-2 text-center">

<div class="section-header py-2">
<h5 class="h5-responsive d-inline section-subtitles" style="font-size:22px;">Δημόσια Projects</h5>
</div>




<div class="row p-2">



<?php if(count($projects)>0): ?>
<?php $a = 0; ?>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->is_published()): ?>
                    <?php $a = 1; ?>
                   


 <div class="col-md-4">
  <div class="card m-1">
  <!-- Card image -->
  <a  href="<?php echo e(route('project.show',$project->id)); ?>" >
                    <div class="view overlay">
                              <img src="/storage/projects/cover_images/<?php echo e($project->cover_image); ?>" alt="placeholder" style="width:100%;">
                              <div class="mask  waves-effect waves-light rgba-blue-strong p-2">
                                <p class="white-text font-weight-bold text-left" style="word-wrap:break-word;"><?php echo e($project->description); ?></p>
                              </div>
                            </div>
                    </a>
                    <!-- Card content -->

      <hr class="m-0 p-0">
    <div class="card-body">
     <!-- Title -->
  <h6 class="card-title text-left" style="word-wrap:break-word;color: #879191;"><?php echo e($project->name); ?></h6>

    </div>
    <div class="card-footer">

            <small class="text-muted float-right"> <a  style="color:red;"   href="/project/<?php echo e($project->id); ?>/delete" class="dark-text delete">Διαγραφή</a></small>



        <?php if(!$project->hasPermission()): ?>
      <small class="text-muted float-right text-success">Αναμονή / </small>
      <?php else: ?>
      <small class="text-muted float-right text-success">Δημοσιεύτικε / </small>
    <?php endif; ?>

      <small class="text-muted float-left"><i class="fa fa-clock-o pr-1"></i><?php echo e($project->created_at); ?></small>
    

    </div>
  </div>
</div>


  <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php if($a==0): ?>


<div class="col">
<p class="text-muted">Δέν έχετε δημοσιεύση κάποιο project</p>
                
</div>
<?php endif; ?>


</div>





                  


           
<?php endif; ?>





</div>





    
           
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>