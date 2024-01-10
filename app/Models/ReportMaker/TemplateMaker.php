<?php

namespace App\Models\ReportMaker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateMaker extends Model
{
    use HasFactory;
    protected $table = "templatemaker";
    protected $fillable=['EndDate','IsActive'];
}
