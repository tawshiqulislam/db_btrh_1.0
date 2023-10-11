<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\AdminList;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    protected $guarded = [];

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
        'password' => 'hashed',
    ];

    public function admin_list()
    {
        return $this->hasOne(AdminList::class);
    }

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    //role creation
    const SUPER_ADMIN = 'super_admin';
    const ADMIN = 'admin';


    public static function isSuperAdmin()
    {
        if (auth()->user()->admin_list) {
            if (auth()->user()->admin_list->user_type == self::SUPER_ADMIN) {
                return true;
            }
        }
    }

    public static function isAdmin()
    {
        if (auth()->user()->admin_list) {
            if (auth()->user()->admin_list->user_type == self::ADMIN) {
                return true;
            }
        }
    }

    public static function isUser()
    {
        if (!auth()->user()->admin_list) {
            return true;
        }
    }
}
