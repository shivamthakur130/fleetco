<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','label'
    ];

    /* Many to many relation with user and use pivot table user_roles */

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'user_roles')->withTimeStamps();
    }
}
