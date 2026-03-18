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
        'category_id',
        'img_path'
    ];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
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

    public function scopeSearch($query, $request)
    {
        $keyword = $request->keyword;
        $gender = $request->gender;
        $category_id = $request->category_id;
        $date = $request->date;

        if ($keyword) {
        $query->where(function ($q) use ($keyword) {
            $q->where('first_name', 'like', "%{$keyword}%")
            ->orWhere('last_name', 'like', "%{$keyword}%")
            ->orWhere('email', 'like', "%{$keyword}%");
        });
        }

        if ($gender) {
        $query->where('gender', $gender);
        }

        if ($category_id) {
        $query->where('category_id', $category_id);
        }

        if ($date) {
        $query->whereDate('created_at', $date);
        }

        return $query;
    }

}
