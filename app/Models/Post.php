<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'thumbnail',
        'isPublished',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'isPublished' => 'boolean', // Ensure isPublished is casted as boolean
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the published status of the post.
     *
     * @return string
     */
    public function getPublishStatusAttribute()
    {
        // dd($this->isPublished ? 'Published' : 'Not Published');

        return $this->isPublished ? 'Published' : 'Not Published';
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : asset('images/default-thumbnail.png');
    }

}
