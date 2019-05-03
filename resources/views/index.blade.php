<!doctype html>
<html lang="{{ app()->getLocale() }}">
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
    <body data-spy="scroll" data-target="#main-nav" id="home" data-offset="70">



<header>


 
                         
                        

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" id="main-nav">

  <div class="container">
  

    <!-- Brand -->
    <a class="navbar-brand" href="{{ url('/') }}">

          <strong>IOTLAB</strong>
        </a>


    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">ΑΡΧΙΚΗ
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
        
          <a class="nav-link" href="#about">ΠΙΟΙ ΕΙΜΑΣΤΕ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#education" >ΠΕΡΙΕΧΟΜΕΝΑ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#projecthub" >PROJECTHUB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#ourTeam">ΟΜΑΔΑ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contactUs">ΕΠΙΚΟΙΝΩΝΙΑ</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="/project/create" >ΑΝΕΒΑΣΜΑ</a>
        </li>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">

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
<!-- Navbar -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide" data-ride="carousel" style="height:80vh;">

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="view" style="background-image:url('images/intro_images/arduinopic.png'); background-repeat: no-repeat; background-size: cover;">

        <!-- Mask & flexbox options-->
        <div class="mask d-flex justify-content-center align-items-center" style=" background: #1d213a; opacity: 0.8;">

          <!-- Content -->
          <div class="text-center white-text mx-5 wow fadeIn">
            <h1 class="mb-4">
              <strong>Arduino UNO</strong>
            </h1>

           
            <p class="mb-4 d-none d-md-block">
              <strong>Μάθετε να προγραμματίζεται την αναπτυξιακή πλακέτα Arduino UNO, να φτιάχνεται τα δικά σας κυκλώματα και να τα <br>  προγραμματίζεται με απλές εντολές της γλώσσας C συνδεδεμένα με το διαδίκτυο των πραγμάτων, internet of things, (IoT)</strong>
            </p>

          
          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

      </div>
    </div>
    <!--/First slide-->

    <!--Second slide-->
    <div class="carousel-item">
      <div class="view" style="background-image:url('images/intro_images/siemenspic.png'); background-repeat: no-repeat; background-size: cover;">

        <!-- Mask & flexbox options-->
        <div class="mask d-flex justify-content-center align-items-center" style=" background: #1d213a; opacity: 0.8;">

          <!-- Content -->
          <div class="text-center white-text mx-5 wow fadeIn">
            <h1 class="mb-4">
              <strong>Siemens PLC</strong>
            </h1>


            <p class="mb-4 d-none d-md-block">
              <strong>Είναι προγραμματιζόμενες λογικές συσκευές οι οποίες διαθέτουν εισόδους, εξόδους, διακόπτες ελέγχου, οθόνη, τροφοδοτικό, <br> προγραμματιζόμενες μνήμες και ανάλογα το πρόγραμμα που γράφουμε εκτελούν την διασύνδεση εισόδων εξόδων.</strong>
            </p>

           
          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

      </div>
    </div>
    <!--/Second slide-->



    <!--Third slide -->

      <div class="carousel-item">
      <div class="view" style="background-image:url('images/intro_images/knxpic.png'); background-repeat: no-repeat; background-size: cover;">

        <!-- Mask & flexbox options-->
        <div class="mask d-flex justify-content-center align-items-center" style=" background: #1d213a; opacity: 0.8;">

          <!-- Content -->
          <div class="text-center white-text mx-5 wow fadeIn">
            <h1 class="mb-4">
              <strong>KNX</strong>
            </h1>


            <p class="mb-4 d-none d-md-block">
              <strong>Το μέλλον των ηλεκτρικών εγκαταστάσεων και διαχείρισης ενέργειας σε οικίες, ξενοδοχεία, μεγάλες παραγωγικές μονάδες <br> όπου χρειάζεται η απομακρυσμένη διαχείριση συσκευών και η επιτήρηση από παντού.</strong>
            </p>

           
          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

      </div>
    </div>


    <!--/Third slide-->


  </div>
  <!--/.Slides-->

  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
  <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
    <span class="sr-only">Previous</span>
  </a>


  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
  <i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

</header>

<!-- about us-->


<section id="about"  class="py-5">
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">ΠΟΙΟΙ ΕΙΜΑΣΤΕ</p>

         <h2 class="h2-responsive section-title">ΚΑΛΩΣ ΗΡΘΑΤΕ ΣΤΟ IOTLAB.GR</h2>
    </div>


    <div class="row mt-4">

      
      <div class="col-lg-12">
                  <blockquote class="blockquote">
                      <p class="lead" style="font-size:17px;">
                      Η ιστοσελίδα φτιάχτηκε με σκοπό να σας βάλει στην λογική του προγραμματισμού μικροελεγκτών με την αναπτυξιακή πλακέτα του Arduino Uno με απλές εντολές στην γλώσσα C. Απευθύνεται σε μαθητές, φοιτητές, ερασιτέχνες ηλεκτρονικούς, χομπίστες που θέλουν να ασχοληθούν με το κόσμο των ηλεκτρονικών και να παντρέψουν το ψηφιακό κομμάτι με τον προγραμματισμό. Στο εμπόριο υπάρχουν εκατοντάδες μικροελεγκτές, διαφόρων εταιριών που διακρίνονται ανάλογα με την ταχύτητα τους, τα εσωτερικά περιφερειακά που διαθέτουν και φυσικά το κόστος τους. Με τους μικροελεγκτές πλέον μπορούμε να κάνουμε χαμηλού κόστους κυκλώματα αυτόματου ελέγχου, απλούς αυτοματισμούς κίνησης, να συνδέσουμε αισθητήρια όπως θερμοκρασίας, υγρασίας και να καταγράψουμε τις μέτρησης σε μια μνήμη flash ή να της μεταφέρουμε στον υπολογιστή μας σε πραγματικό χρόνο. Ο προγραμματισμός γίνεται με απλά προγράμματα, compilers, που σκοπός τους είναι να μετατρέψουν μια γλώσσα υψηλού επιπέδου σε γλώσσα μηχανής έτσι ώστε να είναι εγγράψιμη στον αντίστοιχο μικροελεγκτή που χρησιμοποιούμε. Στην ιστοσελίδα γίνεται χρήση του ATmega 328p της εταιρίας Atmel και την αναπτυξιακή πλακέτα Arduino που ο καθένας μπορεί να την προμηθευτεί από ένα κατάστημα ηλεκτρονικών. Είναι ένα ολοκληρωμένο αναπτυξιακό που περιέχει την διασύνδεση με τον υπολογιστή μέσο της θύρας USB 2, την σταθεροποίηση τροφοδοσίας και τον ATmega328p σε μορφή ολοκληρωμένου Pdip ή 28-pin-MLF. Η δομή της ιστοσελίδας είναι χωρισμένη σε θεωρία, περιφερειακά, workshop. Στην θεωρία μπορείτε να βρείτε μια εκτενή ύλη για τον μικροελεγκτή, τα εσωτερικά περιφερικά του, τον τρόπο που μπορείτε να τα ενεργοποιήσετε για την λειτουργία που απαιτείται για την εφαρμογή σας. Υπάρχουν εκτενή παραδείγματα από τον προγραμματισμό με καταχωρητές έως τις απλές εντολές του μεταγλωττιστή Arduino IDE με τις έτοιμες συναρτήσεις που κάποιοι έχουν φτιάξει για εσάς όπως την analogRead(A0). Στο κεφάλαιο περιφερικά θα μπορέσετε να βρείτε πως συνδέεται μια οθόνη χαρακτήρων lcd 2x16 που βρίσκεται σε ταμειακές συσκευές και απεικονίζει σύμβολοχαρακτήρες, ένας σερβοκινητήρας και πως παράγεται ο παλμός ελέγχου και άλλα πολλά. Στην περιοχή workshop βρίσκονται οι ολοκληρωμένες κατασκευές μας, το σχηματικό διάγραμμα του κυκλώματος και το pcb στο πρόγραμμα Eagle, το οποίο είναι και δωρεάν για διαστάσεις 10cmx10cm και μπορείτε να το κατεβάσετε, και φυσικά ο κώδικας για τον ATmega 328p σε γλώσσα C. Μπορείτε να χρησιμοποιήσετε ελεύθερα κείμενα και κατασκευές από την ιστοσελίδα μας , να βελτιστοποιήσετέ ένα κώδικα και να τον στείλετε για να τον δημοσιεύσουμε, πάντα φυσικά να έχει δίπλα του σχόλια περιγράφοντας τα βήματα σας.

                      </p>
                 </blockquote>            
        </div>
      </div>
    </div>
  </section>


<!-- about us end-->





<!-- education -->

<section id="education" class="py-5">
  
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">ΤΙ ΚΑΝΟΥΜΕ</h5>

         <h2 class="h2-responsive section-title">ΠΕΡΙΕΧΟΜΕΝΑ</h2>
    </div>

      <div class="row justify-content-center mt-5">
     
      <ul class="nav nav-tabs" role="tablist">
     <li class="nav-item">
     <button type="button" class="btn btn-outline-primary waves-effect" data-toggle="tab" href="#arduinoTheory" role="tab">ARDUINO ΘΕΩΡΙΑ</button>
     </li>
     <li class="nav-item">
     <button type="button" class="btn btn-primary" data-toggle="tab" href="#periferiaka" role="tab">ΠΕΡΙΦΕΡΙΑΚΑ</button>
     </li>
    
 </ul>
        </div>


        <div class="row mt-5">
           <!-- Tab panels -->
           
 <div class="tab-content">

  
     <!--ARDUINO THEORY-->
     <div class="tab-pane fade in show active" id="arduinoTheory" role="tabpanel">



       <div class="row justify-content-center ">

<!--Grid column-->

<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  
    <img src="{{asset('images/theory_imgs/meaning_progr.png')}}" class="img-fluid ">
    
    <div class="mask flex-center waves-effect rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/theory_imgs/arduino_2.png')}}" class="img-fluid">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Light overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->



<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/theory_imgs/AT-MEGA.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Super light overlay</p>
    </div>
  </div>
</a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
<div class="view overlay">
<img src="{{asset('images/theory_imgs/input_output.png')}}" class="img-fluid ">
  <div class="mask flex-center waves-effect waves-light rgba-black-strong">
    <p class="white-text">Super light overlay</p>
  </div>
</div>
</a>
</div>
<!--/Grid column-->



<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
<div class="view overlay">
<img src="{{asset('images/theory_imgs/watchdog.png')}}" class="img-fluid ">

  <div class="mask flex-center waves-effect waves-light rgba-black-strong">
    <p class="white-text">Super light overlay</p>
  </div>
</div>
</div>
<!--/Grid column-->
</a>
</div>


<div class="row justify-content-center">
<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/interupts.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/sleepmode.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/timer_8.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/timer_16.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/timer_8.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

</div>


<div class="row justify-content-center">

<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/usart.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/analogCompare.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/SPI.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/twi.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/theory_imgs/ADC.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

  </div>

  <div class="row">
    <!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4  offset-md-1">
<a href="https://www.w3schools.com">
<div class="view overlay">
  <img src="{{asset('images/theory_imgs/lockbits_16.png')}}" class="img-fluid ">
  <div class="mask flex-center waves-effect waves-light rgba-black-strong">
    <p class="white-text">Strong overlay</p>
  </div>
</div>
</a>
</div>
<!--/Grid column-->

    </div>


     </div>
      <!--/ARDUINO THEORY PANEL-->
     





      <!-- PERIFERIAKA PANEL -->
      <div class="tab-pane fade" id="periferiaka" role="tabpanel">
    


<div class="row justify-content-center">
<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/accessories-img/74HC595.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/hc-sr04.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/lcd_2x16.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/servo_sg90.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/sevensegment.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

</div>


<div class="row justify-content-center">
<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
    <img src="{{asset('images/accessories-img/keyaboard 4x4.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->


<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/TFT.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/ht12serious.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->

<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">
<a href="https://www.w3schools.com">
  <div class="view overlay">
  <img src="{{asset('images/accessories-img/esp8266.png')}}" class="img-fluid ">
    <div class="mask flex-center waves-effect waves-light rgba-black-strong">
      <p class="white-text">Strong overlay</p>
    </div>
  </div>
  </a>
</div>
<!--/Grid column-->
<!--Grid column-->
<div class="col-lg-2 col-md-3 col-sm-6 mb-4">

  <div class="view overlay">
 
</div>
<!--/Grid column-->

</div>



     </div>

    <!-- /PERIFERIAKA PANEL -->

 </div>
          </div>



  </div>


</section>

<!-- education end-->


<section id="projecthub" class="py-5">
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">PROJECTS</p>

        
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






<!-- OUR TEAM-->

<section id="ourTeam" class="py-5">
  
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">ΓΝΩΡΙΣΤΕ ΤΗΝ ΟΜΑΔΑ ΜΑΣ</h5>

         <h2 class="h2-responsive section-title">Η ΟΜΑΔΑ ΜΑΣ</h2>
    </div>



    <div class="row justify-content-between mt-5">
      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-lg-1 text-center">
      <div class="avatar mx-auto">
      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle z-depth-1" alt="Sample avatar">
      </div>
      <h5 class="font-weight-bold mt-4 mb-3">John Doe</h5>
      <p class="text-uppercase blue-text"><strong>Web developer</strong></p>
      <p class="grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ipsa accusantium doloremque rem laudantium totam aperiam.</p>
      <ul class="list-unstyled mb-0">
        <!-- Facebook -->
        <a class="p-2 fa-lg fb-ic">
          <i class="fa fa-facebook blue-text"> </i>
        </a>
        <!-- Instagram -->
        <a class="p-2 fa-lg ins-ic">
          <i class="fa fa-instagram blue-text"> </i>
        </a>
      </ul>
    </div>
    <!-- Grid column -->


      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-lg-1 text-center">
      <div class="avatar mx-auto">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle z-depth-1" alt="Sample avatar">
      </div>
      <h5 class="font-weight-bold mt-4 mb-3">John Doe</h5>
      <p class="text-uppercase blue-text"><strong>Web developer</strong></p>
      <p class="grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ipsa accusantium doloremque rem laudantium totam aperiam.</p>
      <ul class="list-unstyled mb-0">
        <!-- Facebook -->
        <a class="p-2 fa-lg fb-ic">
          <i class="fa fa-facebook blue-text"> </i>
        </a>
        <!-- Instagram -->
        <a class="p-2 fa-lg ins-ic">
          <i class="fa fa-instagram blue-text"> </i>
        </a>
      </ul>
    </div>
    <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-3 col-md-6 mb-lg-1 text-center">
      <div class="avatar mx-auto">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle z-depth-1" alt="Sample avatar">
      </div>
      <h5 class="font-weight-bold mt-4 mb-3">John Doe</h5>
      <p class="text-uppercase blue-text"><strong>Web developer</strong></p>
      <p class="grey-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ipsa accusantium doloremque rem laudantium totam aperiam.</p>
      <ul class="list-unstyled mb-0">
        <!-- Facebook -->
        <a class="p-2 fa-lg fb-ic">
          <i class="fa fa-facebook blue-text"> </i>
        </a>
        <!-- Instagram -->
        <a class="p-2 fa-lg ins-ic">
          <i class="fa fa-instagram blue-text"> </i>
        </a>
      </ul>
    </div>
    <!-- Grid column -->


    </div>

    

</div>
</section>


<!-- /OUR TEAM-->





<!-- CONTACT US -->


<section id="contactUs" class="py-5">
  
  <div class="container">
  <div class="section-header mt-5">
          <h5 class="h5-responsive d-inline section-subtitles">ΕΠΙΚΟΙΝΩΝΗΣΤΕ ΜΑΖΙ ΜΑΣ</h5>
    </div>


    <div class="row justify-content-between mt-5">

    <div class="col-md-6 col-xl-5">

<!--Card-->
<div class="card">

  <!--Card content-->
  <div class="card-body">

    <!-- Form -->
    <form name="">
      <!-- Heading -->
      <h3 class="mt-2 text-center"><i class="fa fa-envelope fa-2x"></i></h3>

      <hr>

      <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        <input type="text" id="form3" class="form-control">
        <label for="form3">Όνομα</label>
      </div>
      <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="text" id="form2" class="form-control">
        <label for="form2">Εmail</label>
      </div>

      <div class="md-form">
        <i class="fa fa-pencil prefix grey-text"></i>
        <textarea type="text" id="form8" class="md-textarea"></textarea>
        <label for="form8">Μήνυμα</label>
      </div>

      <div class="text-center">
        <button class="btn btn-indigo">Αποστολη</button>
      </div>

    </form>
    <!-- Form -->

  </div>

</div>
<!--/.Card-->

</div>
<!--Grid column-->
  
  <div class="col-md-6">


<!--Card-->
<div class="card">

  <!--Card content-->
  <div class="card-body">

    <!-- Form -->
    <form name="">
      <!-- Heading -->
      <h3 class="mt-2 text-center"><i class="fa fa-paper-plane-o fa-2x"></i></h3>

      <p class="text-center mt-3">NEWSLETTER </p>

      <hr>

      
      <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="text" id="form2" class="form-control">
        <label for="form2">Εmail</label>
      </div>

      

      <div class="text-center">
        <button class="btn btn-indigo">Εγγραφη</button>
      </div>

    </form>
    <!-- Form -->

  </div>

</div>
<!--/.Card-->







     
  </div>



    </div>

</section>


<!-- /CONTACT US -->






     <!-- SCRIPTS -->




    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
    
    // Init Scrollspy
    $('body').scrollspy({ target: '#main-nav' });

 

    // Smooth Scrolling
    $("#main-nav a").on('click', function (event) {
     
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
