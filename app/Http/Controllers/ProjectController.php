<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\ProjectCodeFiles;
use App\ProjectSchemas;
use App\Comment;


use Session;

use Image;


class ProjectController extends Controller
{


   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth',['except'=>['showToall']]);
    }




     
       
       

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function delete($id){
      
        $project = Project::find($id);
        $projectSchemmas = Projectschemas::where('project_id','=',$id);
        $projectCodeFiles = ProjectCodeFiles::where('project_code_id','=',$id);
        $comments = Comment::where('project_id','=',$id);
        // Check for correct user
        if($project==null || auth()->user()->id !==$project->user_id){
            return "false";
        }else{
           

            if($projectSchemmas!=null){
                $projectSchemmas->delete();
            }
             if($projectCodeFiles!=null){
                $projectCodeFiles->delete();
            }
             if($comments!=null){
                $comments->delete();
            }

            if($project!=null){
                $project->delete();
            }

           

           
         
            return "true";



        }
       

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //if user is not verificated return him to dashboard
          if(!auth()->user()->verified()){
            return redirect() ->route('dashboard');
        }else{
        //if user is autenticated show him project upload page
             return view('project.create');
        }



    }









    public function updateProject(Request $request){
     
       $project=$this->updateModelSession($request);
     
       
         if($request->hasFile('cover_image')){    

            $validator = $this->checkIfImgValid($request);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
               
                $project=$this->uploadCoverImage($request,$project);
               

            }
           
 
 
         }
 
         if($request->hasFile('schemas')){    


            $validator = $this->checkIfSchemasIsValid($request);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
              
            $schemaFilesNames=$this->uploadSchemas($request);
            $this->setSession($request,'schemaFileNames',$schemaFilesNames);
            $projectSchemasFiles = ProjectSchemas::where('project_id','=',$request->project_id);
            $projectSchemasFiles->delete();
            }


          
 
 
         }

        

         if($request->hasFile('code')){

            $validator=$this->checkIfCodeIsValid($request);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
           
                $codeFileNames=$this->uploadCodeFiles($request);
                $this->setSession($request,'codeFileNames',$codeFileNames);
                $projectcodeFiles = ProjectCodeFiles::where('project_code_id','=',$request->project_id);
                $projectcodeFiles->delete();
            }
          
 
         }
 
 
         $this->setSession($request,'updateProject',$project);

         return response()->json(['msg'=>"success"]);
     }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       
        $project=$this->storeDataToSession($request);
       
        if($request->hasFile('cover_image')){    
            $validator = $this->checkIfImgValid($request);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
                $project=$this->uploadCoverImage($request,$project);
              
            }
           
          
             

        }

        if($request->hasFile('code')){
            
            $validator=$this->checkIfCodeIsValid($request);

            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
            $codeFileNames=$this->uploadCodeFiles($request);
            $this->setSession($request,'codeFileNames',$codeFileNames);
            }
           

        }


        if($request->hasFile('schemas')){
            $validator = $this->checkIfSchemasIsValid($request);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            }else{
                $schemaFilesNames=$this->uploadSchemas($request);
                $this->setSession($request,'schemaFileNames',$schemaFilesNames);
            }
           

          
        }


        $this->setSession($request,'formsData',$project);
      
        return response()->json(['msg'=>"success"]);

    }

    private function checkIfSchemasIsValid(Request $request){

        $validator = \Validator::make($request->all(), [
            'schemas.*' =>  'mimes:jpeg,png|max:3096',
        ],$messages = [      
            'schemas.*' => 'Λάθος τύπος αρχείου (jpeg, png)',
           
           
        ]);


            return $validator;

    }

    private function uploadSchemas(Request $request){
        
        
            $items = array();
            $originalFileNames = array();
    
            foreach ($request->schemas as $schema) {
    
                $originalFileName = $schema->getClientOriginalName();
               
                $filename = $schema->store('public/projects/schemas/');
              
                array_push($originalFileNames,$originalFileName);
                array_push($items,basename($filename));
    
               
             
            }
           
            if(count($items)>0 && $items!=null && count($originalFileNames)>0 && $originalFileNames!=null){
              return array($items, $originalFileNames);
    
            }
    
            



          


        


    }

    private function checkIfCodeIsValid(Request $request){
            
        $validator = \Validator::make($request->all(), [
            'code.*' => 'mimetypes:text/plain,text/x-c,text/x-c++,text/x-java,text/x-php|max:3096',
        ],$messages = [      
            'code.*' => 'Λάθος τύπος αρχείου (ino, txt)',
           
           
        ]);

        return $validator;

    }

    private function uploadCodeFiles($request){

           
           //if user upload code store the code files under the location storage/image and
           //update the database with the names and project_id foregn key
   
          //set up the rules for user data validation

          
          //set up the rules for user data validation
          //set up the rules for user data validation

          
            
        $items = array();
        $originalFileNames = array();

        foreach ($request->code as $cod) {

            $originalFileName = $cod->getClientOriginalName();
           
            $filename = $cod->store('public/projects/code_files/');
          
            array_push($originalFileNames,$originalFileName);
            array_push($items,basename($filename));

           
         
        }
        
       
       
        if(count($items)>0 && $items!=null && count($originalFileNames)>0 && $originalFileNames!=null){
          
            return array($items,$originalFileNames);
        }



        
       

    }

    private function setSession($request,$sessionName,$varName){

        $request->session()->put($sessionName,$varName);

    }

    private function checkIfImgValid(Request $request){
        //set up the rules for user data validation
        $validator = \Validator::make($request->all(), [
            'cover_image' => 'mimes:jpeg,png|max:3096',
        ],$messages = [      
            'cover_image.mimes' => 'Λάθος τύπος αρχείου (jpeg, png)',
            'max'=>'Επιλέξτε φωτογραφία < 3096 kb',
        
        ]);

        return $validator;


    }

    private function uploadCoverImage(Request $request,$project){

       

      
            $cover_image = $request->file('cover_image');
            $filename = time() . '.' . $cover_image->getClientOriginalExtension();
            Image::make($cover_image)->resize(500,500)->save( storage_path('app/public/projects/cover_images/' . $filename ));


            $project->cover_image=$filename;

            return $project;

        
    }


    public function showToAll($id)
    {
        
        $project = Project::find($id);
       
       
        
        if($project==null){
            return redirect('/');
        }

        

        return view('project.show')->with('project', $project)->with('code',$project->getCodeFileContents());

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $project = Project::find($id);
       
       
        
        if($project==null || auth()->user()->id !==$project->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        

        return view('project.show')->with('project', $project)->with('code',$project->getCodeFileContents());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        // Check for correct user
        if($project==null || auth()->user()->id !==$project->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }
        return view('project.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function updateTheForm(Request $request){

      
        if(empty($request->session()->get('updateProject'))){  
            $project = Project::find($request->project_id);
        }else{
            $project = $request->session()->get('updateProject');
        }

       
        $project->save();
        if(!empty( $request->session()->get('codeFileNames'))){
            $code_filenames = $request->session()->get('codeFileNames');
          

            for($i=0; $i<count($code_filenames[0]); $i++){
               
                ProjectCodeFiles::create([
                    'originalFileNames' =>$code_filenames[1][$i],
                    'project_code_id' =>$project->id,
                    'filename' =>$code_filenames[0][$i],
                   
                ]);

            }

            $request->session()->forget('codeFileNames');
            

            
        }

        
        if(!empty( $request->session()->get('schemaFileNames'))){
            $schemas_filenames = $request->session()->get('schemaFileNames');
            for($i=0; $i<count($schemas_filenames[0]); $i++){
               
                ProjectSchemas::create([
                    'originalFileNames' =>$schemas_filenames[1][$i],
                    'project_id' =>$project->id,
                    'filename' =>$schemas_filenames[0][$i],
                   
                ]);

            }

            $request->session()->forget('schemaFileNames');
          

            
        }

          //delete the session
          if(!empty( $request->session()->get('updateProject'))){
            $request->session()->forget('updateProject');
           }
          
           return response()->json(['msg'=>"success"]);


    }




    public function saveTheForm(Request $request){
       
       
        //check if a session exists
        if(empty($request->session()->get('formsData'))){
            //create Project Model
            $project = new Project();


        }else{
            //retrive Project Model
            $project = $request->session()->get('formsData');
          
        }

      
         $project->user_id=auth()->user()->id;
         $project->save();

        if(!empty( $request->session()->get('codeFileNames'))){
            $code_filenames = $request->session()->get('codeFileNames');
          

            for($i=0; $i<count($code_filenames[0]); $i++){
               
                ProjectCodeFiles::create([
                    'originalFileNames' =>$code_filenames[1][$i],
                    'project_code_id' =>$project->id,
                    'filename' =>$code_filenames[0][$i],
                   
                ]);

            }

            $request->session()->forget('codeFileNames');
            

            
        }

        
        if(!empty( $request->session()->get('schemaFileNames'))){
            $schemas_filenames = $request->session()->get('schemaFileNames');
            for($i=0; $i<count($schemas_filenames[0]); $i++){
               
                ProjectSchemas::create([
                    'originalFileNames' =>$schemas_filenames[1][$i],
                    'project_id' =>$project->id,
                    'filename' =>$schemas_filenames[0][$i],
                   
                ]);

            }

            $request->session()->forget('schemaFileNames');
          

            
        }

        
           //delete the session
           if(!empty( $request->session()->get('formsData'))){
            $request->session()->forget('formsData');
           }
          
           return response()->json(['msg'=>"success"]);

    }


    /**
     * Save user data to a session for later use
     */

    private function storeDataToSession(Request $request){
        
        //check for a session

      
        if(empty($request->session()->get('formsData'))){  
            //create Project Model
            $project = new Project();

          

        }else{
            //retrive project Model
            $project = $request->session()->get('formsData');

        }

          $data = array_filter($request->except('code','cover_image','schemas','project_id'));
          //fill with user data except code files
          $project->fill($data);


        
  


        
          return $project;

    }



    public function publish($id){

        $project = Project::find($id);
        // Check for correct user
        if($project==null || auth()->user()->id !==$project->user_id){
            return redirect('/dashboard')->with('error', 'Unauthorized Page');
        }

        $project->is_publish=true;
       
        if($project->save()){
            return "true";
        }





    }







    private function updateModelSession(Request $request){
      

        if(empty($request->session()->get('updateProject'))){  
            $project = Project::find($request->project_id);
        }else{
            $project = $request->session()->get('updateProject');
        }

        $userInput = $request->except(['project_id','cover_image','schemas','code']);

      
        $data = array_filter( $userInput);
        $project->fill($data);

       return $project;
    }


   


    

}
