<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentlist extends Model
{
    
    protected $table = 'studentlists';
    
    public $primaryKey = 'id';

    protected $fillable =['matrices_number','name','project_title'];
}
