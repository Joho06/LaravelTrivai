<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // Debe verificar el email. 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sala'


    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        ''
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

    public function paquetes(): HasMany
    {
        return $this->hasMany(Paquete::class);
    }
    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function contratos(): HasMany
    {
        return $this->hasMany(Contrato::class);
    }
    public function vendedores(): hasMany
    {
        return $this->hasMany(Vendedor::class);
    }
}
