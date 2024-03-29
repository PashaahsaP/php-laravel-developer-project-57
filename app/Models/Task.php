<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Label;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'created_by_id'
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\TaskStatus');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'created_by_id');
    }

    public function executor()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to_id');
    }

    public function labels()
    {
        return $this->belongsToMany('App\Models\Label');
    }
}
