<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\section_content;

class section extends Model
{
    protected $table = 'section';
    public $timestamps = false;

    protected $fillable = ['name','type'];

    public function section_content()
    {
        return $this->hasMany('App\section_content', 'id_section', 'id');
    }
    
}
