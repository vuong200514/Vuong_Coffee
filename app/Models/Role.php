<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public const ADMIN_ID = 1;
    public const CUSTOMER_ID = 2;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected $guarded = ['id'];
}
