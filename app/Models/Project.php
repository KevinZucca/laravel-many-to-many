<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'github_link', 'languages', 'slug', 'type_id'];
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($project) {
            $project->slug = Str::slug($project->name, '-');
        });
    }
}
