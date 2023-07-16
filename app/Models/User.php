<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Cashier;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    public $idempotencyKey;
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'birthdate',
        'active',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return the users full name
     */
    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return the users age
     * 
     * @return int
     */
    function age(): int
    {
        return Carbon::parse($this->birthdate)->diffInYears(Carbon::now());
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function reservations()
    {
        return $this->belongsTo(Reservation::class);
    }
}
