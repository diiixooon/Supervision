<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //
    protected $fillable = [
        'student_id', 'supervisor_id',
    ];
    protected $table = 'discussions';
    public $primarykey = 'discussion_id';
    public function supermatriksv()
    {
        $this->hasMany('App\Supervisor');
    }
    public function matrikstudent()
    {
        $this->hasMany('App\User');
    }
}
