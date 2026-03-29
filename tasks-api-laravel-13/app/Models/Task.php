<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Cast;

#[Table('tasks')]
#[Fillable(['title', 'description', 'status'])]
#[Cast('status', 'boolean')]
class Task extends Model {}
