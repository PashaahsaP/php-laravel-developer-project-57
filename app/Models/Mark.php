<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Task;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
