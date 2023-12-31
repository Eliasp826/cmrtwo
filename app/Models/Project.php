<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'status',
        'user_id',
        'client_id'
    ];

    public const STATUS = ['Abierto', 'En Progreso', 'Cancelado', 'Completado'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'id', 'client_id', 'contact_name');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'project_id', 'id');
    }
}
