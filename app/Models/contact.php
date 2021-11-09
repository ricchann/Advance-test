<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
        'created_at',
        'updated_at',
    ];

    public static $rules = array(
        'lastname' => 'required',
        'firstname' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
        'address' => 'required',
        'opinion' => 'required|max: 120',
    );

    public function getFullname()
    {
        $fullname = $this->lastname.' '.$this->firstname;
        return $fullname;
    }
}
