<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

#[Table('tasks')]
#[Fillable(['title', 'description', 'status'])]
#[Cast('status', 'boolean')]
class Task extends Model {}
