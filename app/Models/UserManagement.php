<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserManagement extends Authenticatable
{
    protected $table = 'user_management';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name',
        'role',
        'status',
        'scope',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getAuthPassword(): string
    {
        return $this->password;
    }

    public function isActive(): bool
    {
        return strtolower(
            trim($this->status ?? '')
        ) === 'active';
    }

    public function hasRole(string|array $roles): bool
    {
        $currentRole = strtolower(
            trim($this->role ?? '')
        );

        $allowedRoles = array_map(
            static fn ($role) => strtolower(
                trim((string) $role)
            ),
            (array) $roles
        );

        return in_array(
            $currentRole,
            $allowedRoles,
            true
        );
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function isAgent(): bool
    {
        return $this->hasRole('Agent');
    }

    public function reports()
    {
        return $this->hasMany(
            ReportAnalytics::class,
            'user_id',
            'user_id'
        );
    }
}