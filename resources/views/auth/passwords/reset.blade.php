<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

                    
                    <form method="POST" class="mt-5" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password" placeholder="Κωδικός" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Επαλήθευση κωδικού" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                           
                            
<!-- Sign in button -->
<button class="btn btn-info btn-block my-4"  type="submit">Ανακτηση Λογαριασμου</button>
                      
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

