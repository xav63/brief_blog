<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'content',
        'picture',
        'user_id',

    ];
    protected $dispatchesEvents = [

        'created' => PostCreated::class,

    ];

    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }
    public function comments(): HasMany

    {

        return $this->hasMany(Comment::class);

    }
}
