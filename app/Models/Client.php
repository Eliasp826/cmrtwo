<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $timestamps = true;

    protected $table = 'clients';

    protected $fillable = [
      'contact_name',
      'contact_email',
        'contact_phone_number',
        'company_name',
        'company_address',
        'company_phone_number',
    ];
    public function project()
    {
        return $this->hasMany('App\Models\Project', 'client_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'client_id', 'id');
    }
}
