<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'done', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //scopeSearch im Model -> search()
    public function scopeSearch($query, $term)
    {
        $term = '%' . $term . '%';

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', $term)
            ->orWhere('description', 'like', $term);
        });
    }
}

