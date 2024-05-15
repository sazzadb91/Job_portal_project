<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category_id', 'user_id', 'jobtype_id', 'vacancy', 'status', 'isFeatured',
        'salary', 'location', 'description', 'benefits', 'responsibility', 'qualifications',
        'keywords', 'experience', 'company_name', 'company_location', 'website'
    ];

    public function jobtype(){
        return $this->belongsTo(Jobtype::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
