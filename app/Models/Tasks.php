<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'task',
        'user_id',
        'client_id',
        'project_id'
    ];
    public const STATUS = ['Abierto', 'En Progreso', 'Cancelado', 'Completado'];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault();
    }

    public function project()
    {
        return $this->belongsTo(Project::class)->withDefault();
    }
}
