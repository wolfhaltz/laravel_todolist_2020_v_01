<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'tags', 'remember_at',

        // foreign keys:
        'project_id'
    ];

    public function project_id()
    {
      return $this->belongsTo(Project::class);
    }

}
