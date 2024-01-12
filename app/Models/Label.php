<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public static array $colors = ['ff0000', '3366ff', '00b300', 'ff9900', '9933ff', '00ffcc'];

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }

    public static function getColor(int $lastItemIndex)
    {
        $len = count(self::$colors);

        if ($lastItemIndex >= $len) {
            return self::getColor($lastItemIndex - $len);
        } else if ($lastItemIndex < 0) {
            return self::getColor($lastItemIndex + $len);
        } else {
            return self::$colors[$lastItemIndex];
        }
    }
}
