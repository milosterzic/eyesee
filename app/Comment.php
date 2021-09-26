<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Interfaces\CommentableInterface;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Check if instance has approved comments.
     *
     * @return  bool
     */
    public function hasApprovedComments(): bool
    {
        return $this->comments()->approved()->exists();
    }

    /**
     * Check if comment is approved by thread owner.
     *
     * @return  bool
     */
    public function isApproved(): bool
    {
        return $this->is_approved;
    }

    /**
     * Check if comment is approved by thread owner.
     *
     * @param Builder $query
     * @return  Builder
     */
    public function scopeApproved(Builder $query) : Builder
    {
        return $query->where('is_approved', 1);
    }

    /**
     * Set is_approved field to 1.
     *
     * @return  self
     */
    public function approve() : self
    {
        $this->is_approved = 1;

        return $this;
    }
}
