<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CommentableInterface
{
    /**
     * Relation to comments table.
     *
     * @return MorphMany
     */
    public function comments() : MorphMany;

    /**
     * Check if instance has comments.
     *
     * @return  bool
     */
    public function hasComments() : bool;
}
