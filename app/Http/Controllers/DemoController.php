<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Jobtype;
use App\Models\Category;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function Homepage(){
       $category= Category::all();
        $Featuredjob= Job::where('isFeatured',1)->get();
        $latestjob= Job::where('status',"=",1)->with('jobtype')->orderBy('created_at','DESC')->limit(10)->get();
        return view("pages.hero",compact('category','Featuredjob','latestjob'));
    }
    public function FindJob(Request $request){
        $jobtype = Jobtype::where('status', '=', 1)->get();
        $jobs = Job::where('status', 1);
    
        if (!empty($request->keyword)) {
            $jobs->where(function($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->keyword . '%')
                      ->orWhere('keywords', 'LIKE', '%' . $request->keyword . '%');
            });
        }

        if (!empty($request->location)) {
            $jobs->where('location', $request->location );
        }
        if (!empty($request->category)) {
            $jobs->where('category_id', $request->category);
        }
        if (!empty($request->jobtype)){
           $jobtypearray = explode(',',$request->jobtype);
            $jobs->whereIn('jobtype_id',$jobtypearray);
        }
        if (!empty($request->experience)){
            $jobs->where('experience',$request->experience);
        }
    
        $jobs = $jobs->with('jobtype')->orderBy('created_at','DESC')->paginate(9);
    
        return view("pages.Find-jobs", compact('jobtype', 'jobs'));
    }
    
    public function LogInpage(){
        return view("pages.login");
    }
    public function register(){
        return view("pages.register");
    }
    
    public function jobjost(){
        return view("pages.job-post");
    }

    public function myjobpage(Request $request){
        $user_id=$request->header('id');
       $jobdata= Job::where('user_id',$user_id)->with("jobtype")->paginate(10);
        return view("pages.my-job",compact('jobdata'));
    }
    public function appliedjob(){
        return view("pages.job-applied");
    }
    public function savejobpage(){
        return view("pages.job-applied");
    }
    public function jobdetailspage(){
            
        return view("pages.job-applied");
    }




}
