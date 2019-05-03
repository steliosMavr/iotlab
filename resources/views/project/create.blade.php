@extends('layouts.project_header')

@section('content')
<div class="container">

<ul class="nav md-pills pills-secondary justify-content-center" role="tablist" id="myTabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#basic" data-toggle="tab">Βασικά</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#history" data-toggle="tab">Ιστορία</a>
  </li>

   <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#schemas" data-toggle="tab">Σχηματικά</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#software" data-toggle="tab">Software</a>
  </li>΄

   <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#upload" data-toggle="tab">Ανέβασμα</a>
  </li>΄
</ul>

<!-- Tab panels -->
<div class="tab-content pt-4">

 <!--Basic Panel -->
 <div class="tab-pane fade in show  py-4" id="schemas" role="tabpanel">
  <div class="container">
  
  <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center py-1">
            <p class="h4 py-1">Σχηματικά</p>
            <p>-</p>

            </div>
          </div>

 <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-left mt-2 p-3">
            
         
            <form class="myForm">
@csrf

                
                  
                  
                      
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Σχηματικά</label>
  <div class="col">
  <div class="input-group mt-2">

<div class="custom-file">

  <input type="file" class="custom-file-input" id="schemas_input" name="schemas[]" aria-describedby="inputGroupFileAddon01" required multiple>
  <label class="custom-file-label" id="schemas_label" for="inputGroupFile01"></label>
 
</div>

</div>
<small class="form-text text-muted" style="text-align:left;">Επιλέξτε Αρχεία</small>

  </div>
</div>
          

 
                 
      

                              <div class="form-group row justify-content-around mt-2">

                              
               
               <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                     <button type="button"  onClick="changeTabs('#history')" class="btn btn-primary mr-1">
  <i class="fa fa-arrow-left fa-2x"></i> 
</button>
             

               

               

              
<button type="submit" class="btn btn-success">
  <i class="fa fa-check fa-2x"></i> 
</button>

              
              <button type="button"  onClick="changeTabs('#software')" class="btn btn-primary ml-1">
  <i class="fa fa-arrow-right fa-2x"></i> 
</button>
             
               
              
 
</div>
              

</div>                    


</form>
  </div>
</div>

      </div>
      
  </div>



<div class="tab-pane fade  py-4" id="upload" role="tabpanel">
<div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center py-1">
            <p class="h4 py-1">Ανέβασμα</p>
            <p>Αν τελίωσατε ανεβάστε το project σας τώρα</p>

            </div>



          </div>


  <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-left mt-2 p-3">
           <p class="text-muted">Παρακάτω είναι το τελευταίο βήμα για να ανεβάσετε το project σας,αν νομίζετε οτι έχετε τελίωσει πατώντας το κουμπί ανέβασμα 
           το project θα ανέβει στον server του iotlab.Στην συνέχεια θα βρεθείτε στο Dashboard όπου μπορείτε να δείτε τα project σας και να τα
           δημοσιεύσετε αν επιθειμήτε να τα δούν και άλλη χρήστες.Επίσης σας δίνετε η δυνατότητα να τα επεξεργαστείτε η να προσθέσετε κάτι μετα το ανέβασμα.
           
           </p>

           <div class="col-md-12 text-center">
            <form id="upload_project">
        @csrf
        
             
                  
                        
                <div class="form-group row justify-content-around mt-2">
               <div class="col-md-6">
               <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
               <button type="button"  onClick="changeTabs('#software')" class="btn btn-primary mr-1">
  <i class="fa fa-arrow-left fa-2x"></i> 
</button>
             
<button type="submit"   class="btn btn-success mr-1">
  <i class="fa fa-cloud-upload fa-2x"></i> 
</button>
              
            
</div>
               
 
</div>
              

</div>           
        </form>
        </div>
            </div>

            </div>

          
          </div>
          
</div>



  <!--Basic Panel -->
  <div class="tab-pane fade in show active py-4" id="basic" role="tabpanel">
      <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center py-1">
            <p class="h4 py-1">Βασικά</p>
            <p>Γράψτε μας λιγες πληροφορίες για το project σας</p>

            </div>
          </div>


            <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center mt-2 p-3">
              
<form class="myForm" id="basic_form">
        @csrf
                 <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label" >Όνομα Project</label>
  <div class="col-10">
    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" maxlength="21" minlength="0">
    @if ($errors->has('name'))
    <small  class="form-text text-muted" style="text-align:left;"><p class="p-0 m-0" style="color:red;">{{ $errors->first('name') }}</p></small>
  
             
           @endif
    <small  class="form-text text-muted" style="text-align:left;">Πληκρολογήστε το όνομα που θέλετε να έχει το Project σας</small>
  </div>
</div>
                  
                    <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Περιγραφή</label>
  <div class="col-10">
       <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3" maxlength="150" minlength="0"></textarea>
       @if ($errors->has('description'))
    <small  class="form-text text-muted" style="text-align:left;color:red;"><p class="p-0 m-0" style="color:red;">{{ $errors->first('description') }}</p></small>
          @endif
       <small class="form-text text-muted" style="text-align:left;">Πληκτρολογήστε με σύντομο τρόπο τη λειτουργία του</small>
  </div>
</div>
                  
                      
                    
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Cover Image</label>
  <div class="col">
  <div class="input-group mt-2">

<div class="custom-file">

  <input type="file" class="custom-file-input" id="cover_image_id" name="cover_image" aria-describedby="inputGroupFileAddon01">
  <label class="custom-file-label" for="inputGroupFile01" id="cover_image_label"></label>
 
</div>

</div>
<small class="form-text text-muted" style="text-align:left;">Επιλέξτε φωτογραφία</small>

  </div>
</div>
                  

                  
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Βαθμος δυσκολίας</label>
  <div class="col-10">
     <select class="form-control" name="difficulty">
    <option value="Εύκολο">Εύκολος</option>
    <option value="Μέτριο">Μέτριος</option>
    <option value="Δύσκολο">Δύσκολος</option>
  </select>
  @if ($errors->has('difficulty'))
    <small  class="form-text text-muted" style="text-align:left;color:red;"><p class="p-0 m-0" style="color:red;">{{ $errors->first('difficulty') }}</p></small>
          @endif
  <small class="form-text text-muted" style="text-align:left;">Επιλέξτε κατα την γνώμη σας πόσο δύσκολο ηταν το Project που φτίαξατε</small>
    </div>
</div>

                
                <div class="form-group row justify-content-around mt-2">
                <div class="col-md-6">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

<button type="submit" class="btn btn-success">
  <i class="fa fa-check fa-2x"></i> 
</button>
                
              
<button type="button"  onClick="changeTabs('#history')" class="btn btn-primary ml-1">
  <i class="fa fa-arrow-right fa-2x"></i> 
</button>
             
           
             
                
              
</div>
  
</div>
               

</div>                    

</form>

            </div>
          </div>
           


        </div>

  </div>

  
 

  <!--History Panel 2-->
  <div class="tab-pane fade py-4" id="history" role="tabpanel">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center py-1">
            <p class="h4 py-1">Ιστορία</p>
            <p>Πείτε μας λίγα λόγια για το πώς δουλεύει αυτό το project</p>

            </div>



          </div>

           <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center mt-2 p-3">
            <form class="aboutForm" id="historyForm">
@csrf

 @if ($errors->has('about'))
 <div class="alert alert-danger" role="alert">
  <strong>{{ $errors->first('about') }}!</strong>
</div>
   
  
             
           @endif
               
<div class="form-group">
    <textarea class="form-control" name="about" id="article-ckeditor"></textarea>
  </div>
                     

                      
                      <div class="form-group row justify-content-around mt-2">
             
               <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                              <button type="button"  onClick="changeTabs('#basic')" class="btn btn-primary mr-1">
  <i class="fa fa-arrow-left fa-2x"></i> 
</button>
             

               

               

              
<button type="submit" class="btn btn-success">
  <i class="fa fa-check fa-2x"></i> 
</button>

              
              <button type="button"  onClick="changeTabs('#schemas')" class="btn btn-primary ml-1">
  <i class="fa fa-arrow-right fa-2x"></i> 
</button>
             
               

            

              
 
</div>
              

</div>                    


</form>
              </div>
</div>

      </div>

  </div>
  <!--/.Panel 2-->


  

  <!--Panel 3-->
  <div class="tab-pane fade py-4" id="software" role="tabpanel">
  <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 bg-white text-center py-1">
    <p class="h4 py-1">Κώδικας</p>
            <p>Ανεβάστε τον κώδικα του project σας με τον οποίο λειτουργεί.</p>
    </div>
      </div>

       <div class="row justify-content-center">
            <div class="col-md-10 bg-white text-center mt-2 p-3">
              
<form class="myForm"  id="softwareForm">
@csrf

                 <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label" >Τίτλος</label>
  <div class="col-10">
    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="code_title">
    @if ($errors->has('name'))
    <small  class="form-text text-muted" style="text-align:left;"><p class="p-0 m-0" style="color:red;">{{ $errors->first('name') }}</p></small>
  
             
           @endif
  </div>
</div>
                  
                    <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Περιγραφή</label>
  <div class="col-10">
       <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="code_description" rows="1"></textarea>
       @if ($errors->has('description'))
    <small  class="form-text text-muted" style="text-align:left;color:red;"><p class="p-0 m-0" style="color:red;">{{ $errors->first('description') }}</p></small>
          @endif
       <small class="form-text text-muted" style="text-align:left;">Πληκτρολογήστε με σύντομο τρόπο τη λειτουργία του</small>
  </div>
</div>
                  
                      
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Αρχεία Κώδικα</label>
  <div class="col">
  <div class="input-group mt-2">

<div class="custom-file">

  <input type="file" class="custom-file-input" id="code_input" name="code[]" aria-describedby="inputGroupFileAddon01" multiple>
  <label class="custom-file-label" id="code_label" for="inputGroupFile01"></label>
 
</div>

</div>
<small class="form-text text-muted" style="text-align:left;">Επιλέξτε Κώδικα</small>

  </div>
</div>
          

 
                 
      

                              <div class="form-group row justify-content-around mt-2">

                              
               
               <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">




                     <button type="button"  onClick="changeTabs('#schemas')" class="btn btn-primary mr-1">
  <i class="fa fa-arrow-left fa-2x"></i> 
</button>
             

               

               

              
<button type="submit" class="btn btn-success">
  <i class="fa fa-check fa-2x"></i> 
</button>

              
              <button type="button"  onClick="changeTabs('#upload')" class="btn btn-primary ml-1">
  <i class="fa fa-arrow-right fa-2x"></i> 
</button>






              
              
 
</div>
              

</div>                    


</form>

              <div>
</div>

      

      </div>

  </div>
  <!--/.Panel 3-->



</div>

</div>


@endsection

