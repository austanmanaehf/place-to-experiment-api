<?php

namespace Karolina\Database\Table;

use Illuminate\Database\Eloquent\Model;

Class Skill extends Model {

    protected $table = 'kf_skills';
    protected $primaryKey = 'skill_id';
    protected $guarded = [];
    public $timestamps = false;


}