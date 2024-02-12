<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $primaryKey = 'uuid';

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

    public function specifications()
    {
        return $this->hasMany(PropertySpecification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
