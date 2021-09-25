<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    /**
     * Relation to users table.
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the thread's comments.
     *
     * @return MorphMany
     */
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
