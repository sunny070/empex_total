<?php

namespace App\Http\Controllers;

use App\Models\NcsIndustry;
use App\Models\NcsJobDispatch;
use App\Models\NcsjobNatureCode;
use App\Models\NcsMinQualification;
use App\Models\NcsSector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\TripleDES;

class NcsJobDispatchController extends Controller
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
        $jobs=NcsJobDispatch::get()->paginate();

        return view('admin.jobPostNcs',compact('jobs'));
    }

    public function createJobsPostNcs()
    {
        $sectors = NcsSector::get();
        $indusrties = NcsIndustry::get();
        $qualifications = NcsMinQualification::get();
        $jobnatures = NcsjobNatureCode::get();
        $randoms=NcsJobDispatch::all();

        return view('admin.createJobPostNcs',compact('sectors','indusrties','qualifications','jobnatures','randoms' ));
    }
    public function submitForm(Request $request)
    {

        // $data = ;
        // if (env('APP_ENV') == 'local') {
        //     return;
        // }

        $tripleDes = new TripleDES('ecb');
        $tripleDes->setKey(md5('DGET_8D1087A1D4BF', true));
        $tripleDes->enablePadding();

        $authResponse = Http::post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser', [
           
            'strUserName' => env('ENCRYPTED_USERNAME'),
            'strPassword' => env('ENCRYPTED_PASSWORD'),
        ]);
        $ncsAuthUser = json_decode($authResponse->body(), true);
        if ($authResponse->ok()) {
            $ncsAuthUser = json_decode($authResponse->body(), true);


            $response =  Http::withHeaders([
                'Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie']
            ])->post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs', [
                'JobReferenceID' => $request->input('JobReferenceID'),
                'JobTitle' => $request->input('JobTitle'),
                "JobDescription" => "We are looking for Senior developers onWordpress",
                "SectorID" => "13",
                "IndustryID" => "16",
                "JobNatureCode" => "C",
                "NumberofOpenings" => 150,
                "MinQualificationID" => 9,
                "ContactPersonName" => "Amit Kumar",
                "ContactMobile" => 8130132255,
                "Keyskills" => [["Skill" => "Sales"], ["Skill" => "Go to Market"]],
                "JobPostExpiryDate" => "2023-09-30",
                "PostedForEmployer" => "VXRF Technologies",
                "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",

            ]);

            return json_decode($response->body());
        }
    }
}
