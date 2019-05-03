<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <body>


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center ">

                    <div class="container">
                        <div class="row justify-content-center">
                           <div class="col-md-7 py-5">


                            <p class="h3 mb-5"><strong>IOTLAB</strong></p>

                            <h3 class="mb-3">Κάντε εγγραφή τώρα εύκολα και γρήγορα</h3>

                            <p class="mb-3"><em>Δημιουργήστε λογαριασμό για να μπορείτε να  ανεβάζετε τα δικα σας project  και να   επικοινωνείτε με άλλους προγραμματιστές</em></p>

                    

<form class="text-center mt-5"  id="registerForm" method="POST" action="<?php echo e(route('register')); ?>">
<?php echo csrf_field(); ?>

<!-- User name -->
<div class="form-group row">

        <div class="col-md-12">
           <input id="name" type="text" placeholder="Username" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

          <?php if($errors->has('name')): ?>
            <span class="invalid-feedback" role="alert">
             <strong><?php echo e($errors->first('name')); ?></strong>
              </span>
           <?php endif; ?>
        </div>
  </div>
                

<!-- Email -->

<div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        


<!-- Password -->
<div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Κωδικός" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


<!-- Password -->
<div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Επαλήθεση κωδικού" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



<!-- Sign in button -->
<button class="btn btn-info btn-block my-4"  type="submit">Εγγραφη</button>

<!-- Register -->
<p>Είστε ήδη μέλος;
    <a href="<?php echo e(route('login')); ?>" id="login"> Είσοδος</a>
</p>


</form>
       










       

                           </div>
                        </div>
                    </div>


           

            </div>

             <div class="col-md-5 d-none d-md-block px-2" style="height:970px">
                <div id="imageHolder"></div>
            


            </div>
        </div>
    </div>





    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

 

</body>
</html>

