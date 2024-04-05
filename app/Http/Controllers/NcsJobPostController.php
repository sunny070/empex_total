<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPostNcs;
use App\Models\NcsJobDispatch;
use App\Models\NcsSector;
use App\Models\NcsjobNatureCode;
use Illuminate\Support\Facades\Validator;
use App\Models\UserJobNcs;
use App\Models\User;
use Illuminate\Support\Facades\Hash;





class NcsJobPostController extends Controller
{
    function login(Request $request)
    {
        $user= User::where('name', $request->name)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' =>"Bearer ".$token
            ];
        
             return response($response, 201);
    }



    public function index()
{
    $jobPosts = JobPostNcs::all();
    return response()->json($jobPosts);
}


public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        'category_id'=>'required|numeric',
        'type_id'=> 'required|numeric',
        // 'job_reference_id'=> 'required',

        'sector_id'=> 'required|numeric',
        'title'=> 'required',
       
        'description'=> 'required',
        'no_of_post'=> 'required|numeric',
        'due_date_of_submission'=> 'required|date',
        'organization_name'=> 'required',

        'department_id'=> 'required|numeric',
        'min_expected_salary'=> 'required|numeric',
        'max_expected_salary'=> 'required|numeric',
        'contact_person_name'=> 'required',
        'contact_mobile'=> 'required|max:10',
        'contact_email'=> 'required',
        'job_locations'=> 'required',
        
       
    ]);
    if ($validator->fails()) {
        return response()->json([
            "FaultCode" => "ValidationFailed",
            "FaultReason" => "Request validation failed",
            "IsFault" => true,
            "Results" => [
                "FaultCode" => null,
                "FaultReason" => null,
                "FaultText" => "Please Check Again",
                "FaultTextField" => null,
                "IsSuccess" => false,],
        ], 400);
    }
        $jobPost =new JobPostNcs;
        $jobPost->category_id= $request->category_id;
    // $jobPost->job_reference_id= $request->job_reference_id;

        $jobPost->type_id= $request->type_id;
        $jobPost->sector_id= $request->sector_id;
        $jobPost->title= $request->title;
        $jobPost->slug= $request->title;
        $jobPost->description= $request->description;
        $jobPost->no_of_post= $request->no_of_post;
        $jobPost->due_date_of_submission= $request->due_date_of_submission;
        $jobPost->organization_name= $request->organization_name;
        $jobPost->department_id= $request->department_id;
        $jobPost->created_by="National Career Service" ;//$request->created_by
        $jobPost->published= 1;
        $jobPost->min_expected_salary= $request->min_expected_salary;
        $jobPost->max_expected_salary= $request->max_expected_salary;
        $jobPost->contact_person_name= $request->contact_person_name;
        $jobPost->contact_mobile= $request->contact_mobile;
        $jobPost->contact_email= $request->contact_email;
        $jobPost->job_locations= $request->job_locations;
        $jobPost->url=$request->url??"https://www.ncs.gov.in/#findJobs" ;

        $jobPost->save();
    $response = [
        "FaultCode" => null,
        "FaultReason" => null,
        "IsFault" => false,
        "Results" => [
            [
                "FaultCode" => null,
                "FaultReason" => null,
                "FaultText" => "",
                "FaultTextField" => null,
                "IsSuccess" => true,
                "Job_ID"=>$jobPost->id,
                // "Job_Reference_ID"=>$jobPost->job_reference_id,
                "Job_Category_ID" => $jobPost->category_id,  // Assuming you have an 'id' field in your model
                "Job_Title" => $jobPost->title,
                "Created_by" => $jobPost->created_by,
                "url"=> $jobPost->url,// Set your reference ID here
                "Created_at"=>$jobPost->created_at->format('d-M-Y H:i')//replaced format('d-M-Y H:i:s')
            ],
        ],
    ];

    return response()->json($response, 201);
    // $validation = $request->validate([
    //     'category_id'=>'required|numeric',
    //     'type_id'=> 'required|numeric',

    //     'sector_id'=> 'required|numeric',
    //     'title'=> 'required',
    //     'slug'=> 'nullable',
    //     'description'=> 'required',
    //     'no_of_post'=> 'required|numeric',
    //     'due_date_of_submission'=> 'required|date',
    //     'organization_name'=> 'required',

    //     'department_id'=> 'required|numeric',
    //     'created_by'=> 'required',
        


    // ]);
    
    // $status='';
    // if($validation){
    //     $jobPost = new JobPostNcs;
    //     $jobPost->category_id= $request->category_id;
    //     $jobPost->type_id= $request->type_id;
    //     $jobPost->sector_id= $request->sector_id;
    //     $jobPost->title= $request->title;
    //     $jobPost->slug= $request->slug;
    //     $jobPost->description= $request->description;
    //     $jobPost->no_of_post= $request->no_of_post;
    //     $jobPost->due_date_of_submission= $request->due_date_of_submission;
    //     $jobPost->organization_name= $request->organization_name;
    //     $jobPost->department_id= $request->department_id;
    //     $jobPost->created_by= $request->created_by;
    //     $jobPost->published= 1;
    //     $jobPost->save();
    //     $status="success";
    //     // return response()->json($jobPost);
        
    // }else{
    //     $status="Failed";
    // }
   
    

    /*
    IF VALIDATION TRUE{
        SAVE AND RETURN SUCCESS
        $status='success';
        return response()->json([
        'status'=>$status,
    ],200);
    }ELSE{
        RETURN FAILURE
        $status='fail';
        return response()->json([
        'status'=>$status,
    ],200);
    }

    */
    // return response()->json([
    //     'status'=>$status,
    // ],200);

}


public function show()
{
    $parTime = NcsJobDispatch::where('jobnatures_id', 5)->count();
    $Internship = NcsJobDispatch::where('jobnatures_id', 4)->count();
    $FullTime = NcsJobDispatch::where('jobnatures_id', 3)->count();
    $Deputation = NcsJobDispatch::where('jobnatures_id', 2)->count();
    $Contractual = NcsJobDispatch::where('jobnatures_id', 1)->count();
    // $Contractual = JobPostNcs::where('jobnatures_id', 1)->count();


    $search = request()->q;
    $sort = request()->sort ?? 'n';
    $filter = request()->filter ?? 'all';

    $jobLists = NcsJobDispatch::where('published', 1)
        ->when($search, function ($q) use ($search) {
            return $q->where('JobTitle', 'like', '%' . $search . '%');
        })
        ->when($sort, function ($s) use ($sort) {
            if ($sort == 'n') {
                return $s->orderBy('jobnatures_id', 'DESC');
            } else if ($sort == 'o') {
                return $s->orderBy('jobnatures_id', 'ASC');
            } else {
                return $s->orderBy('JobPostExpiryDate', 'ASC');
            }
        })
        ->when($filter, function ($f) use ($filter) {
            if ($filter == 'contract') {
                return $f->where('jobnatures_id', 1);
            } elseif ($filter == 'Deputation') {
                return $f->where('jobnatures_id', 2);
            } elseif ($filter == 'full') {
                return $f->where('jobnatures_id', 3);
            } elseif ($filter == 'intern'){
                return $f->where('jobnatures_id', 4);
            }elseif ($filter == 'ptime'){
                return $f->where('jobnatures_id', 5);
            }

            else{
                return $f;
            }
        })
        ->orderBy('jobnatures_id', 'DESC')
        ->paginate(5);

    return view('web.jobs.ncsindex', compact('parTime', 'Internship', 'FullTime','Deputation','Contractual', 'jobLists', 'search', 'sort', 'filter'));
    // $show=JobPostNcs::all();
    // // return $show;
    // return view('web.jobs.index',compact('show'));
    // $jobPost = JobPostNcs::all();

    // // dd($jobPost);
    // return view('web.jobs.ncsindex',compact('jobPost'));
    // return response()->json($jobPost);
}

public function detail($JobTitle)
{
    if (!auth()->check()) {
        return redirect(route('web.jobs'))->with('jobMessage', 'Please login to view details!');
    }
    // $sector =NcsSector::get();
    // dd($sector);
    $job = NcsJobDispatch::with('sectors', 'industries', 'jobNature', 'minQualifications')->where('JobTitle', $JobTitle)->firstOrFail();

    // $job = JobPostNcs::with('category', 'type', 'sector', 'admin')->where('slug', $slug)->firstOrFail();
    // $jobDispatches = NcsJobDispatch::with('jobNature')->get();
    
    // dd($job);
    // $userJob = UserJobNcs::firstOrNew([
    //     'user_id' => auth()->id(),
    //     'job_post_ncs_id' => $job->id,
    // ]);
    // $userJob->save();

    return view('web.jobs.Ncsdetail', compact('job',));
}


public function update(Request $request, $id)
{
    $update = JobPostNcs::findOrFail($id); 
    $update->category_id= $request->category_id;
    // $update->job_reference_id= $request->job_reference_id;

    
    $update->type_id= $request->type_id;
    $update->sector_id= $request->sector_id;
    $update->title= $request->title;
    $update->slug= $request->title;
    $update->description= $request->description;
    $update->no_of_post= $request->no_of_post;
    $update->due_date_of_submission= $request->due_date_of_submission;
    $update->organization_name= $request->organization_name;
    $update->department_id= $request->department_id;
    $update->created_by= $request->created_by;
    $update->published= 1;
    $update->min_expected_salary= $request->min_expected_salary;
    $update->max_expected_salary= $request->max_expected_salary;
    $update->contact_person_name= $request->contact_person_name;
    $update->contact_mobile= $request->contact_mobile;
    $update->contact_email= $request->contact_email;
    $update->job_locations= $request->job_locations;
    $update->url=$request->url ?? "https://spstaging.ncs.gov.in/#findJobs" ;
    $result = $update->save();

        if ($result) {
            return ['Result' => 'Data is Updated'];
        } else {
            return ['Result' => 'Data is Not Updated'];
        }

    // $jobPost->update($request->all());
    // return response()->json($jobPost);
}


public function destroy($id)
{
    $jobPost = JobPostNcs::findOrFail($id);
    $result=$jobPost->delete();
    if ($result) {
        return ['Result' => 'Data is Deleted'];
    } else {
        return ['Result' => 'Data is Not Deleted'];
    }


    // $post= Post::find($id);
    //     $result=$post->delete();
    //     if($result){
    //         return ['result'=>"data deleted"];
    //     }
    //     else{
    //         return ['result'=>"data not deleted"];

    //     }
    // return response()->json(null, 204);
}
}
