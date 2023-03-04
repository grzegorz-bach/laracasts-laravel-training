<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'body',
        'user_id',
        'category_id',
        'featured_image'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setTitleAttribute(string $title)
    {
        $this->attributes['title'] = $title;

        $i = 0;

        do {
            $suffix = "";
            if ($i > 0) {
                $suffix = " {$i}";
            }
            $this->attributes['slug'] = Str::slug($title . $suffix);
            $i++;
        } while (Post::where('slug', $this->attributes['slug'])->exists());
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(
                fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            // $query
            //     ->whereExists(
            //         fn ($query) =>
            //         $query->from('categories')
            //             ->whereColumn('categories.id', 'posts.category_id')
            //             ->where('categories.slug', $category)
            //     );

            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->where('user_id', $author);
        });
    }
}
