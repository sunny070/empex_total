<?php

namespace App\Models;

use Database\Seeders\NcsJobNatureCodeSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcsJobDispatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'JobReferenceID',
        'JobTitle',
        'JobDescription',
        'sector',
        'industry',
        'qualifications',
        'NumberofOpenings',
        'jobnatures_code',
        'jobnatures_id',

        'ContactPersonName',
        'ContactMobile',
        'skill1',
        'skill2',
        'JobPostExpiryDate',
        'PostedForEmployer',
        'ContactEmail',
        'MinExpectedSalary',
        'MaxExpectedSalary'

    ];

    



    public function sectors()
    {
        return $this->belongsTo(NcsSector::class, 'sector','id');
    }

    public function industries()
    {
        return $this->belongsTo(NcsIndustry::class, 'industry','id');
    }

    public function jobNature()
    {
        return $this->belongsTo(NcsjobNatureCode::class, 'jobnatures_id','id');
    }

    public function minQualifications()
    {
        return $this->belongsTo(NcsMinQualification::class, 'qualifications','id');
    }


//     In the belongsTo method, the first argument is the related model class, the second argument is the foreign key in the current model's table (the table referenced by NcsJobDispatch), and the third argument is the local key in the related model's table. Make sure that these match your database schema.

// After making these changes, you should be able to use these relationships as you originally intended in your code.
}
