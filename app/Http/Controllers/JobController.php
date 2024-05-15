<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobController extends Controller
{
    public function userjobcreate(Request $request){
          
        $user_id = $request->header('id');
       // dd($user_id);      
         Job::create([
            'title'=>$request->input('title'),
            'user_id'=> $user_id,
            'category_id'=>$request->input('category_id'),
            'jobtype_id'=>$request->input('jobtype_id'),
            'vacancy'=>$request->input('vacancy'),
            'salary'=>$request->input('salary'),
            'location'=>$request->input('location'),
            'description'=>$request->input('description'),
            'benefits'=>$request->input('benefits'),
            'experience'=>$request->input('experience'),
            'responsibility'=>$request->input('responsibility'),
            'qualifications'=>$request->input('qualifications'),
            'keywords'=>$request->input('keywords'),
            'company_name'=>$request->input('company_name'),
            'company_location'=>$request->input('company_location'),
            'website'=>$request->input('website'),
         ]);
         return response()->json([
            'status'=>'success',
            'message'=>'Job Created successfully'
         ],201);
    }

  public function editjobpage($id){
   $data= Job::findorFail($id);
    return view('pages.jobEdit',compact('data'));
  }

  public function jobupdate(Request $request){
    $jobID = $request->input('jobID');
    $user_id = $request->header('id');
    // dd($user_id);      
      Job::where('id',"=",$jobID)->update([
         'title'=>$request->input('title'),
         'user_id'=> $user_id,
         'category_id'=>$request->input('category_id'),
         'jobtype_id'=>$request->input('jobtype_id'),
         'vacancy'=>$request->input('vacancy'),
         'salary'=>$request->input('salary'),
         'location'=>$request->input('location'),
         'description'=>$request->input('description'),
         'benefits'=>$request->input('benefits'),
         'experience'=>$request->input('experience'),
         'responsibility'=>$request->input('responsibility'),
         'qualifications'=>$request->input('qualifications'),
         'keywords'=>$request->input('keywords'),
         'company_name'=>$request->input('company_name'),
         'company_location'=>$request->input('company_location'),
         'website'=>$request->input('website'),
      ]);
      return response()->json([
         'status'=>'success',
         'message'=>'Job Update successfully'
      ],201);

  }
  public function jobdetails($id){
         $jobs = Job::where([
            'id'=>$id,
            'status'=>1
         ])->with(['jobtype','category'])->first();


   return view('pages.jobdetail',compact('jobs'));
  }
  public function Userjobapply(Request $request) {
   // Get user ID from request headers
   $user_id = $request->header('id');
   // Get job ID from request parameters
   $job_id = $request->id;

   // Check if the user has already applied for the job
   $existingApplication = JobApplication::where('user_id', $user_id)
                                        ->where('job_id', $job_id)
                                        ->exists();

   // If the user has already applied, return an error response
   if ($existingApplication) {
       return response()->json([
           'status' => 'error',
           'message' => 'You have already applied for this job'
       ], 400);
   }

   // If the user has not already applied, create a new job application
   $job = Job::where('id', $job_id)->first();
   JobApplication::create([
       'user_id' => $user_id,
       'job_id' => $job_id,
       'employee_id' => $job->user_id,
       'applied_date' => now(),
   ]);

   // Return a success response
   return response()->json([
       'status' => 'success',
       'message' => 'Job applied successfully'
   ], 201);
}





}
