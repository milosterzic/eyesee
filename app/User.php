<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation to threads table.
     *
     * @return HasMany
     */
    public function threads() : HasMany
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Check if user is owner of thread.
     *
     * @param int $threadId
     * @return bool
     */
    public function isOwner(int $threadId) : bool
    {
        return $this->threads->contains($threadId);
    }

    /**
     * Check if user is owner of thread.
     *
     * @param int $threadId
     * @return bool
     */
    public function canEdit(int $threadId) : bool
    {
        return $this->isOwner($threadId) && Thread::find($threadId)->created_at > Carbon::now()->subHours(6);
    }
}
