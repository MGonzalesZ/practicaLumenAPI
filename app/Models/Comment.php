<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'text', 'creation_date', 'publishing_date', 'published', 'content_id', 'user_id'
    ];

    /**
     * Appends
     * @var array
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
