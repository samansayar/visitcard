<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function shop()
    {
        return $this->hasMany(Shop::class);
    }

    public function member()
    {
        return $this->hasMany(member::class);
    }

    public function city()
    {
        return $this->hasMany(city::class);
    }

    public function form()
    {
        return $this->hasMany(Form::class);
    }

    public function accessbiliy()
    {
        return $this->hasMany(accessbility::class);
    }

    public function semat()
    {
        return $this->hasMany(Semat::class);
    }

    public function ShopTitle()
    {
        return $this->hasMany(ShopTitle::class);
    }

    public function VisitTitles()
    {
        return $this->hasMany(VisitTitle::class);
    }

    public function setting()
    {
        return $this->hasMany(Setting::class);
    }

    public function State()
    {
        return $this->hasMany(State::class);
    }

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
}
