<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\CommentableInterface;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model implements CommentableInterface
{
    /**
     * Get the owning commentable model.
     *
     * @return MorphTo
     */
    public function commentable() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get all of the comment's comments.
     *
     * @return MorphMany
     */
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

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
     * Check if instance has comments.
     *
     * @return  bool
     */
    public function hasComments(): bool
    {
        return $this->comments()->exists();
    }
}
