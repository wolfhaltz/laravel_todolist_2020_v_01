<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class SubTask extends Model
{
    protected $fillable = [
        'title', 'description', 'tags', 'remember_at',

        // foreign keys:
        'task_id'
    ];

    public function task_id()
    {
      return $this->belongsTo(Task::class);
    }
}
