<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'author_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User','author_id');
    }

    public function executor()
    {
        return $this->belongsTo('App\Models\User','executor_id');
    }
}
