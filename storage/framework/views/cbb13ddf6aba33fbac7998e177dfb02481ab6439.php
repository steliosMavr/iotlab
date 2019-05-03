<?php $__env->startSection('content'); ?>


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


<?php if(count($projects)>0): ?>
<?php $a = 0; ?>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->hasPermission()): ?>
                    <?php $a = 1; ?>

 <div class="col-md-4">
  <div class="card m-1">
  <!-- Card image -->
  <a  href="/project/<?php echo e($project->id); ?>/show" >
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

<small class="text-muted float-right text-truncate"> Δημιουργός:<?php echo e($project->user->name); ?></small>


      <small class="text-muted float-left"><i class="fa fa-clock-o pr-1"></i><?php echo e($project->created_at); ?></small>
    

    </div>
  </div>
</div>




<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>



</div>





      
    </div>
  </section>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>