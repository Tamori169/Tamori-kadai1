<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ContactController;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'category_id'
    ];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
