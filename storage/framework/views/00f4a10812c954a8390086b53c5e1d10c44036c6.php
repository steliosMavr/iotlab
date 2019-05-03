<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>IOTLAB</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap core CSS -->
       
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

        <!-- Material Design Bootstrap -->
       
        <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">
       
        <!-- Your custom styles (optional) -->
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    </head>
<body style="background-color:#cde6f2">
                      
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" id="main-nav">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                   <strong>IOTLAB</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
      <li class="nav-item">
          <a  href="<?php echo e(route('login')); ?>" class="btn btn-outline-blue-grey">
            <i class="fa fa-user-o mr-2" style="color:white;"></i><span style="color:white;font-size:12px;">εισοδος</span>
          </a>
        </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" style="color:white;font-size:15px;" class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <img src="/storage/users_avatars/<?php echo e(auth()->user()->avatar); ?>" alt="thumbnail" class="rounded-circle mr-1"style="width: 32px;height:32px;">
          <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
            </a>

           <div class="dropdown-menu dropdown-menu-right "  aria-labelledby="navbarDropdown">

            <a class="dropdown-item py-1" href="<?php echo e(route('dashboard')); ?>" style="font-size:13px;"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard</a>
            <a class="dropdown-item py-1" href="<?php echo e(route('project.create')); ?>" style="font-size:13px;"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Ανέβασμα</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item py-1"  style="font-size:13px;" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
<i class="fa fa-sign-out" aria-hidden="true"></i>

            Έξοδος
           </a>

          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                     <?php echo csrf_field(); ?>
                     </form>
                   </div>
             </li>


        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

<!-- Navbar -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide" data-ride="carousel">


<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">
    <div class="view" style="background-image:url('/images/contact-bg.jpg'); background-repeat: no-repeat; background-size: cover;">

      <!-- Mask & flexbox options-->
      <div class="mask d-flex justify-content-center align-items-center" style=" background: #1d213a; opacity: 0.8;">
       
        <!-- Content -->
        <div class="col-md-7 text-center white-text mx-auto wow fadeIn">
         
        <h2 class="mb-4">ΜΟΙΡΑΣΤΗΤΕ ΤΟ PROJECT ΣΑΣ</h2>
          <p class="mb-4 d-none d-md-block" style="font-size:18px;">
            <strong>

Εάν και εσείς έχετε φτιάξει ένα project με την αναπτυξιακή πλακέτα Arduino Uno ή οποιαδήποτε άλλη και θέλετε να το συμπεριλάβουμε στην ιστοσελίδα μας, θα το κάναμε με μεγάλη χαρά. Προϋπόθεση φυσικά είναι να έχετε γράψει ένα κείμενο με το σκοπό της εφαρμογή σας, το σχηματικό διάγραμμα συνδεσμολογίας με την βοήθεια ενός σχεδιαστικού προγράμματος όπως το fritzing ή το Eagle και φυσικά το κώδικα σας και οτιδήποτε άλλο βοηθούσε κάποιο αναγνώστη να φτιάξει ένα παρόμοιο project.
Τα κείμενα σας να είναι αποθηκευμένα σε μορφή Word, γραμμένα στα ελληνικά, τα αρχεία του eagle να είναι σε κατάληξη .brd και .sch και οποιαδήποτε βιβλιοθήκη εξαρτήματος έχετε συμπεριλάβει που δεν είναι στις τυποποιημένες βιβλιοθήκες του προγράμματος eagle.
Επίσης αναφέρεται το Facebook σας ώστε η δημοσίευση να έχει τα στοιχεία σας.

Υ.Γ: ο χρόνος ανάρτησης εξαρτάται από το φόρτο εργασίας μας. Είμαστε ερασιτέχνες και προσπαθούμε να φτιάξουμε μια ιστοσελίδα που να μπορεί να σας βάλει στο πνεύμα του προγραμματισμού και να κατανοήσετέ που χρειαζόταν η γλώσσα C που σας δίδασκαν κάποτε στα σχολεία χωρίς να ξέρετε το γιατί.


            </strong>
          </p>

        
        </div>
        <!-- Content -->

      </div>
      <!-- Mask & flexbox options-->

    </div>
  </div>
  <!--/First slide-->



</div>


</div>
<!--/.Carousel Wrapper-->

</header>

       
            <?php echo $__env->yieldContent('content'); ?>

    
      <!-- SCRIPTS -->




    <!-- JQuery -->
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>

     <script type="text/javascript" src="/js/jquery.steps.js"></script>

     <script type="text/javascript" src="/js/jquery.steps.min.js"></script>

 <script type="text/javascript" src="/js/main.js"></script>

 
      <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="/js/tinymce/init_tinymce.js"></script>

   
</body>
</html>
