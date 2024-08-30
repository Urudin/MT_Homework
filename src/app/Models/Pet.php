<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer id
 * @property string name
 * @property integer age
 * @property string species
 * @property string breed
 * @property string description
 * @property string status
 * @property integer user_id
 * @property User user
 */
class Pet extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['name', 'age', 'species', 'breed', 'description', 'status', 'user_id'];
    protected $guarded = ['id'];

    const STATUSES = ['adopted', 'available'];
    const SPECIES = ['dog', 'cat', 'bird', 'other'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
