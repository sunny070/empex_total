<?php

namespace App\Http\Controllers;

use App\Models\NcsJobDispatch;

use App\Models\NcsIndustry;
// use App\Models\NcsJobDispatch;
use App\Models\NcsjobNatureCode;
use App\Models\NcsMinQualification;
use App\Models\NcsSector;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\TripleDES;
use Illuminate\Validation\Rule;

class NCSStagingJobPostController extends Controller
{

    public function __construct()
    {
        // dd(auth()->guard('admin')->user()?->role_id);
        // if (auth()->guard('admin')->user()?->role_id != 1) {
        //     abort(401);
        // }

    }
    public function getJobsPostNcs()
    {
        $jobs = DB::table('ncs_job_dispatches')
            ->join('ncs_industries', 'ncs_job_dispatches.industry', 'ncs_industries.id')
            ->select('ncs_job_dispatches.*', 'ncs_industries.name')
            ->latest()->paginate(5);
        // $jobs=NcsJobDispatch::latest()->paginate();
        // $sectors = NcsSector::get();

        return view('admin.jobPostNcs', compact('jobs'));
    }


    public function createJobsPostNcs()
    {
        $sectors = NcsSector::get();
        $indusrties = NcsIndustry::get();
        $qualifications = NcsMinQualification::get();
        $jobnatures = NcsjobNatureCode::get();
        $randoms = NcsJobDispatch::all();

        return view('admin.createJobPostNcs', compact('sectors', 'indusrties', 'qualifications', 'jobnatures', 'randoms'));
    }



    public function handle(Request $request)
    {

        // if (env('APP_ENV') == 'local') {
        //     return;
        // }
            
        $request->validate(
            [
                'JobReferenceID' => 'required',
                'JobTitle' => 'required',
                'JobDescription' => 'required|min:10',
                'sector' => 'required',
                'industry' => 'required',
                'NumberofOpenings' => 'required|numeric',
                'qualifications' => 'required',
                'jobnatures_code' => [
                    'required',
                    Rule::in(['C', 'D', 'F', 'I', 'P']), // Add valid values for jobnatures_code
                ],
                'ContactPersonName' => 'required',
                'ContactMobile' => 'required',
                'skill1' => 'required',
                'skill2' => 'required',
                'JobPostExpiryDate' => 'required|date',
                'ContactEmail' => 'required|email',
                'MinExpectedSalary' => 'required|numeric|max:9999999",',
                'MaxExpectedSalary' => 'required|numeric|max:99999999',
                // 'MaxExpectedSalary'=>"required|numeric|min:{$request->input('MinExpectedSalary')}|max:",
                'PostedForEmployer' => 'required',

            ]
        );
        $job = new NcsJobDispatch();
        $job->JobReferenceID = $request->input('JobReferenceID');
        $job->JobTitle = $request->input('JobTitle');
        $job->JobDescription = $request->input('JobDescription');
        $job->sector = $request->input('sector');
        $job->industry = $request->input('industry');
        $job->NumberofOpenings = $request->input('NumberofOpenings');
        $job->qualifications = $request->input('qualifications');
        $job->jobnatures_code = $request->input('jobnatures_code');

        if ($request->input('jobnatures_code') == "C") {
            $job->jobnatures_id = 1;
        } elseif ($request->input('jobnatures_code') == "D") {
            $job->jobnatures_id = 2;
        } elseif ($request->input('jobnatures_code') == "F") {
            $job->jobnatures_id = 3;
        } elseif ($request->input('jobnatures_code') == "I") {
            $job->jobnatures_id = 4;
        } elseif ($request->input('jobnatures_code') == "P") {
            $job->jobnatures_id = 5;
        }

        $job->ContactPersonName = $request->input('ContactPersonName');
        $job->ContactMobile = $request->input('ContactMobile');

        $job->skill1 = $request->input('skill1');
        $job->skill2 = $request->input('skill2');
        $job->JobPostExpiryDate = $request->input('JobPostExpiryDate');
        $job->PostedForEmployer = $request->input('PostedForEmployer');
        $job->ContactEmail = $request->input('ContactEmail');
        $job->MinExpectedSalary = $request->input('MinExpectedSalary');
        $job->MaxExpectedSalary = $request->input('MaxExpectedSalary');

        $job->save();


        $tripleDes = new TripleDES('ecb');
        $tripleDes->setKey(md5('DGET_8D1087A1D4BF', true));
        $tripleDes->enablePadding();

        $authResponse = Http::post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser', [
            // 'strUserName' => base64_encode($tripleDes->encrypt(env('NCS_USERNAME'))),
            'strUserName' => env('ENCRYPTED_USERNAME'),
            // 'strPassword' => base64_encode($tripleDes->encrypt(env('NCS_PASSWORD'))),
            'strPassword' => env('ENCRYPTED_PASSWORD'),
        ]);

        // return $authResponse;

        $ncsAuthUser = json_decode($authResponse->body(), true);

        // return $ncsAuthUser['AuthenticateUserResult']['Cookie'];

        if ($authResponse->ok()) {


            $ncsAuthUser = json_decode($authResponse->body(), true);



            // $jobData = $job->toArray();
            $response =  Http::withHeaders([
                'Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie']
            ])->post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs', [
                [    //$jobData, // Include the $jobData here
                    // "AdditionalField" => "Value", // Add other API request fields here
                    // "AnotherField" => "AnotherValue",

                    "JobReferenceID" =>  $job->JobReferenceID,
                    "JobTitle" =>  $job->JobTitle,
                    "JobDescription" => $job->JobDescription,
                    "SectorID" => $job->sector,
                    "IndustryID" => $job->industry,
                    "NumberofOpenings" => $job->NumberofOpenings,
                    "MinQualificationID" => $job->qualifications,
                    "JobNatureCode" => $job->jobnatures_code,
                    "ContactPersonName" => $job->ContactPersonName,
                    "ContactMobile" => $job->ContactMobile,
                    "Keyskills" => [["Skill" => $job->skill1,], ["Skill" => $job->skill2,]],
                    "JobPostExpiryDate" => $job->JobPostExpiryDate,
                    "PostedForEmployer" => $job->PostedForEmployer,
                    "ContactEmail" => $job->ContactEmail,
                    "MinExpectedSalary" => $job->MinExpectedSalary,
                    "MaxExpectedSalary" => $job->MaxExpectedSalary,

                    "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",

                ]
            ]);
            // return json_decode($response);


            if ($response->successful()) {
                // The request was successful, and the server returned a 2xx status code.
                return redirect('admin/employee-news-Ncs')->with('success', 'Job posted successfully');
            } else {
                // Handle server errors or other HTTP errors here.
                if ($response->status() >= 500) {
                    // Server error (5xx), handle it accordingly.
                    return back()->with('error', 'Server error. Please try again later.');
                } else {
                    // Other non-successful HTTP status codes (4xx, etc.), handle as needed.
                    return back()->with('error', 'Failed to post job. Please check your data and try again.');
                }
            }


        //     return json_decode($response);
        // if($response){

        //     return redirect('admin/employee-news-Ncs')->with('success','Job posted successfully');
            
        // }
        // else{
        //     return back()->with('error', 'Failed to post job');
        // }
        // return json_decode($response->body());
            
        }
        
    
   
    
    }































//     public function handle(Request $request)
// {
//     try {
//         // Request validation
//         $request->validate([
//             // ... (your validation rules)
//             'JobReferenceID' => 'required',
//                 'JobTitle' => 'required',
//                 'JobDescription' => 'required',
//                 'sector' => 'required',
//                 'industry' => 'required',
//                 'NumberofOpenings' => 'required|numeric',
//                 'qualifications' => 'required',
//                 'jobnatures_code' => [
//                     'required',
//                     Rule::in(['C', 'D', 'F', 'I', 'P']), // Add valid values for jobnatures_code
//                 ],
//                 'ContactPersonName' => 'required',
//                 'ContactMobile' => 'required',
//                 'skill1' => 'required',
//                 'skill2' => 'required',
//                 'JobPostExpiryDate' => 'required|date',
//                 'ContactEmail' => 'required|email',
//                 'MinExpectedSalary' => 'required|numeric',
//                 'MaxExpectedSalary' => 'required|numeric',
//                 'PostedForEmployer' => 'required',
//         ]);

//         // Create a new NcsJobDispatch instance and populate its properties
//         $job = new NcsJobDispatch();
//         // ... (populate $job properties as in your code)
//         $job->JobReferenceID = $request->input('JobReferenceID');
//         $job->JobTitle = $request->input('JobTitle');
//         $job->JobDescription = $request->input('JobDescription');
//         $job->sector = $request->input('sector');
//         $job->industry = $request->input('industry');
//         $job->NumberofOpenings = $request->input('NumberofOpenings');
//         $job->qualifications = $request->input('qualifications');
//         $job->jobnatures_code = $request->input('jobnatures_code');

//         if ($request->input('jobnatures_code') == "C") {
//             $job->jobnatures_id = 1;
//         } elseif ($request->input('jobnatures_code') == "D") {
//             $job->jobnatures_id = 2;
//         } elseif ($request->input('jobnatures_code') == "F") {
//             $job->jobnatures_id = 3;
//         } elseif ($request->input('jobnatures_code') == "I") {
//             $job->jobnatures_id = 4;
//         } elseif ($request->input('jobnatures_code') == "P") {
//             $job->jobnatures_id = 5;
//         }

//         $job->ContactPersonName = $request->input('ContactPersonName');
//         $job->ContactMobile = $request->input('ContactMobile');

//         $job->skill1 = $request->input('skill1');
//         $job->skill2 = $request->input('skill2');
//         $job->JobPostExpiryDate = $request->input('JobPostExpiryDate');
//         $job->PostedForEmployer = $request->input('PostedForEmployer');
//         $job->ContactEmail = $request->input('ContactEmail');
//         $job->MinExpectedSalary = $request->input('MinExpectedSalary');
//         $job->MaxExpectedSalary = $request->input('MaxExpectedSalary');

//         $job->save();

//         // API Authentication
//         $tripleDes = new TripleDES('ecb');
//         $tripleDes->setKey(md5('DGET_8D1087A1D4BF', true));
//         $tripleDes->enablePadding();

//         $authResponse = Http::post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser', [
//             'strUserName' => env('ENCRYPTED_USERNAME'),
//             'strPassword' => env('ENCRYPTED_PASSWORD'),
//         ]);

//         if (!$authResponse->ok()) {
//             // Handle authentication failure, log the error, and return a response or redirect as needed
//             // Example: Log the error and redirect back with an error message
//             \Log::error('Authentication failed: ' . $authResponse->status());
//             return back()->with('error', 'Authentication failed');
//         }

//         $ncsAuthUser = json_decode($authResponse->body(), true);

//         // API Call to post new jobs
//         $response = Http::withHeaders(['Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie']])
//             ->post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs', [
//                 // ... (your data for the API call)
//                 "JobReferenceID" =>  $job->JobReferenceID,
//                     "JobTitle" =>  $job->JobTitle,
//                     "JobDescription" => $job->JobDescription,
//                     "SectorID" => $job->sector,
//                     "IndustryID" => $job->industry,
//                     "NumberofOpenings" => $job->NumberofOpenings,
//                     "MinQualificationID" => $job->qualifications,
//                     "JobNatureCode" => $job->jobnatures_code,
//                     "ContactPersonName" => $job->ContactPersonName,
//                     "ContactMobile" => $job->ContactMobile,
//                     "Keyskills" => [["Skill" => $job->skill1,], ["Skill" => $job->skill2,]],
//                     "JobPostExpiryDate" => $job->JobPostExpiryDate,
//                     "PostedForEmployer" => $job->PostedForEmployer,
//                     "ContactEmail" => $job->ContactEmail,
//                     "MinExpectedSalary" => $job->MinExpectedSalary,
//                     "MaxExpectedSalary" => $job->MaxExpectedSalary,

//                     "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",
//             ]);
//             // dd($response);
//             // return json_decode($response);
//         if ($response->ok()) {
//             // Successful API call, redirect with a success message
//             return redirect('admin/employee-news-Ncs')->with('success', 'Job posted successfully');
//         } else {
//             // Handle API call failure, log the error, and return a response or redirect as needed
//             // Example: Log the error and redirect back with an error message
//             \Log::error('API call failed: ' . $response->status());
//             return back()->with('error', 'Failed to post job');
//         }
//     } catch (\Exception $e) {
//         // Handle general exceptions, log the error, and return a response or redirect as needed
//         // Example: Log the error and redirect back with an error message
//         \Log::error('An error occurred: ' . $e->getMessage());
//         return back()->with('error', 'An error occurred');
//     }
// }




    public function editJobNcs($id)
    {
        if (auth()->guard('admin')->user()->role_id != 1) {
            abort(401);
        }

        $job = NcsJobDispatch::findOrFail($id);
        // $departments = NcsIndustry::get();
        $sectors = NcsSector::get();
        $indusrties = NcsIndustry::get();
        $qualifications = NcsMinQualification::get();
        $jobnatures = NcsjobNatureCode::get();
        return view('admin.editJobPostNcs', compact('job', 'sectors', 'indusrties', 'qualifications', 'jobnatures',));
    }


    public function updateJobNcs(Request $request, $id)
    {
        // dd($id);
        $update = NcsJobDispatch::find($id)->update([
            'JobReferenceID' => $request->JobReferenceID,
            'JobTitle' => $request->JobTitle,
            'JobDescription' => $request->JobDescription,
            'sector' => $request->sector,
            'industry' => $request->industry,
            'NumberofOpenings' => $request->NumberofOpenings,
            'qualifications' => $request->qualifications,
            'jobnatures' => $request->jobnatures,
            'ContactPersonName' => $request->ContactPersonName,
            'ContactMobile' => $request->ContactMobile,
            'skill1' => $request->skill1,
            'skill2' => $request->skill2,
            'JobPostExpiryDate' => $request->JobPostExpiryDate,
            'PostedForEmployer' => $request->PostedForEmployer,
        ]);

        return redirect()->route('jobsPostNcs');
    }
}
