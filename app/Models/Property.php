<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function address()
    {
        return $this->belongsTo(PropertyAddress::class);
    }


    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id')->where('role', 'agent');
    }


    public function category()
    {
        return $this->belongsTo(Category::class,  'category_id', 'id');
    }
}
