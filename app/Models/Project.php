<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;

class Project extends Model  {

    /**
     * The database table used by the model.
     * @pro
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'project';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['url','branch_id','from_date','to_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['from_date','to_date'];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id')->withDefault();
    }

    //--------------------- added new -----------------------
    public function images()
    {
        return $this->belongsToMany(Image::class, 'project_images','project_id','image_id')->withTimestamps();
    }
    //------------------ ----------------------- ------------------------ --------------------

    public function iconImg()
    {
        return $this->belongsTo(Image::class, 'icon', 'id')->withDefault();
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id', 'id')->withDefault();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault();
    }


    public function project_ar()
    {
        return $this->hasOne(\App\Models\Arabic\Project::class,'project_id','id')->withDefault();
    }

    public function project_en()
    {
        return $this->hasOne(\App\Models\English\Project::class,'project_id','id')->withDefault();
    }

    public function lang()
    {
        if (currentLang() == 'en')
            return $this->project_en();
        return $this->project_ar();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id')->withDefault();
    }

}
