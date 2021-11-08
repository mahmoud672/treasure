<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'contact';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email','email2', 'phone','phone2', 'phone_alt', 'address_en', 'address_ar', 'location', 'facebook', 'twitter', 'instagram', 'youtube', 'linkedin', 'pintrest', 'behance', 'whatsapp','dribbble'];

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
    protected $dates = [];

    public function address()
    {
        return currentLang() == 'ar' ? $this->address_ar : $this->address_en;
    }

}
