<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Self_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const NO_ACTIVE = 0;
    public const ACTIVE = 1;
    public const BLOCK = 2;
    public const EXPIRED_TIME = 12;
    public const STR_NO_ACTIVE = 'Chưa xác thực';
    public const STR_ACTIVE = 'Đã xác thực';
    public const STR_BLOCK = 'Vô hiệu hóa';
    public const MALE = 0;
    public const FEMALE = 1;
    public const STR_MALE = 'Nam';
    public const STR_FEMALE = 'Nữ';
    public const USER = 0;
    public const ADMIN = 1;
    public const CTV = 2;
    public const STR_USER = 'Người dùng';
    public const STR_ADMIN = 'Admin';
    public const STR_CTV = 'CTV';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'gender',
        'phone_number',
        'email',
        'birthday',
        'role',
        'status',
        'token',
        'password',
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

    public function formatStatus()
    {
        $status = $this->status;
        switch ($status) {
            case self::NO_ACTIVE:
                return self::STR_NO_ACTIVE;
            case self::ACTIVE;
                return self::STR_ACTIVE;
            case self::BLOCK;
                return self::STR_BLOCK;
            default:
                return '';
        }
    }

    public function formatGender()
    {
        $gender = $this->gender;
        switch ($gender) {
            case self::MALE:
                return self::STR_MALE;
            case self::FEMALE;
                return self::STR_FEMALE;
            default:
                return '';
        }
    }

    public function formatRole()
    {
        $role = $this->role;
        switch ($role) {
            case self::USER:
                return self::STR_USER;
            case self::ADMIN;
                return self::STR_ADMIN;
            case self::CTV;
                return self::STR_CTV;
        }
    }
}
