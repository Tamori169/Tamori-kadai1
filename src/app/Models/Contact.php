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

    const GENDER_LABELS = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
    ];

    public static function genderLabel($value)
    {
        return self::GENDER_LABELS[$value] ?? '不明';
    }

    
}
