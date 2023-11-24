<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\AdminList;
use App\Models\Department;
use App\Models\Document;
use App\Models\ProjectInitiationOverview;
use App\Models\Resource\Resource;
use App\Models\Resource\ResourceManagement;
use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes,  HasRoles;

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
        return $this->hasOne(Department::class);
    }
    public function user_details()
    {
        return $this->hasMany(UserDetail::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class);
    }

    public function verified_by_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'verified_by');
    }

    public function unverified_by_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'unverified_by');
    }

    public function activated_by_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'activated_by');
    }
    public function inactivated_by_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'inactivated_by');
    }

    public function assigned_to_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'assigned_to');
    }

    public function assigned_by_project_initiaons()
    {
        return $this->hasMany(ProjectInitiation::class, 'assigned_by');
    }
    public function project_initiation_overviews()
    {
        return $this->hasMany(ProjectInitiationOverview::class);
    }
    public function resource_managements()
    {
        return $this->hasMany(ResourceManagement::class);
    }
    public function added_by_resources()
    {
        return $this->hasMany(Resource::class, 'added_by');
    }
    public function assigned_by_resource_managements()
    {
        return $this->hasMany(ResourceManagement::class, 'assigned_by');
    }
    public function time_durations()
    {
        return $this->hasMany(TimeDuration::class);
    }

    public function key_deliveres()
    {
        return $this->hasMany(KeyDeliverable::class);
    }
    public function assigned_by_tasks()
    {
        return $this->hasMany(Task::class, 'assigned_by');
    }
    public function assigned_to_tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }


    // //role creation
    // const SUPER_ADMIN = 'super_admin';
    // const ADMIN = 'admin';
    // const OFFICE = 'office';
    // const VENDOR = 'vendor';


    // public static function isSuperAdmin()
    // {
    //     if (auth()->user()->admin_list) {
    //         if (auth()->user()->admin_list->user_type == self::SUPER_ADMIN) {
    //             return true;
    //         }
    //     }
    // }

    // public static function isAdmin()
    // {
    //     if (auth()->user()->admin_list) {
    //         if (auth()->user()->admin_list->user_type == self::ADMIN) {
    //             return true;
    //         }
    //     }
    // }

    // public static function isUser()
    // {
    //     if (!auth()->user()->admin_list) {
    //         return true;
    //     }
    // }

    // public static function isOffice()
    // {
    //     $user = User::find(auth()->user()->id);
    //     if ($user->user_type == self::OFFICE) {
    //         return true;
    //     }
    // }

    // public static function isVendor()
    // {
    //     $user = User::find(auth()->user()->id);
    //     if ($user->user_type == self::VENDOR) {
    //         return true;
    //     }
    // }
}
