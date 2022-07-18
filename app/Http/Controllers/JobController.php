<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use app\Mail\AppliedJobEmail;
use Illuminate\Support\Facades\Mail;


class JobController extends Controller
{
    //

    public function postJobs()
    {

        $all_jobs = Job::latest()->get(); //dd($all_jobs);
        return view('post_jobs', compact('all_jobs'));

    }

    public function createJob(Request $request)
    { 
        
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'company_name'          => 'required',
            'email'                 => 'required | email',
            'phone'                 => 'required | numeric | digits:10',
            'location'              => 'required',
            'job_type'              => 'required',
            'job_title'             => 'required',
            'job_description'       => 'required',  
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $job = new Job;
        $job->company_name = $request->company_name;
        $job->email = $request->email;
        $job->phone = $request->phone;
        $job->location = $request->location;
        $job->job_title = $request->job_title;
        $job->job_description = $request->job_description;
        $job->job_type = $request->job_type;
        $job->save(); 
        return redirect('post-jobs')->withSuccess('Job Created Succesfully');

    }

    public function viewJobs(Request $request)
    {

        $keywords = 'null';
        $job_type = 'null';

        if($request->has('search')) {
            $keywords = $request->keywords;
            $job_type = $request->job_type;
        }

        $all_jobs = Job::where(function($query) use($request) {

                        if(!is_null($request->keywords)) {

                            $query->where('job_title', 'like', '%'.$request->keywords.'%');
                            $query->orwhere('job_description', 'like', '%'.$request->keywords.'%');
                            $query->orwhere('company_name', 'like', '%'.$request->keywords.'%');

                        }

                        if(!is_null($request->job_type)) {
                            $query->where('job_type', '=' , $request->job_type);
                        }


                    })
                    ->latest()
                    ->get(); //dd($all_jobs);

        return view('view_jobs', compact('all_jobs', 'keywords', 'job_type'));
    }

    public function applyJob($job_id)
    {
        $job_detail = Job::where('id', $job_id)->first();
        return view('apply_job', compact('job_detail'));
    } 

    public function applyJobPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required | email',
            'phone'         => 'required | numeric | digits:10',
            'resume'        => 'required | mimes:pdf,doc | max:3024',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $resume = $request->file('resume');

        $job_application = new JobApplication;
        $job_application->job_id = $request->job_id;
        $job_application->name = $request->name;
        $job_application->email = $request->email;
        $job_application->phone = $request->phone; 
        $job_application->resume = $resume->getClientOriginalName();
        $job_application->save(); 

        $resume->move(public_path().'/uploads', $job_application->resume); 

        $candidate_name = array('name'=> $request->name);
        
        $to = env(ADMIN_MAIL_ADDRESS);

        Mail::to($to)->queue(new AppliedJobEmail());

        return redirect()->back()->withSuccess('Applied for job succesfully');
    }  

    public function jobApplication($job_id)
    {
        $job_detail = Job::where('id', $job_id)->first();
        $job_applications = JobApplication::where('job_id', $job_id)->get();

        $total_applications = $job_applications->count();

        $total_applications = !is_null($total_applications) ? $total_applications : 0;

        return view('job_applications', compact('job_detail', 'job_applications', 'total_applications'));
    } 

}
