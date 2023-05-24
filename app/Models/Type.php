<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    protected $fillable = ['name', 'description'];

    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($type) {
            $type->slug = Str::slug($type->name, '-');
        });
    }
}
