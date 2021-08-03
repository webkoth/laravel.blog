<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }


    public function setSlugAttribute($value) {

        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }

    /**
     * Increment number to slug for unique value
     * @param $slug
     * @return mixed
     */
    public function incrementSlug($slug): mixed
    {
        $original = $slug;
        $count = 1;

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$original}-" . $count++;
        }
        return $slug;
    }
}
