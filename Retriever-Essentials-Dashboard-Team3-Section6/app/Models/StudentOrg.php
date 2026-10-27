<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentOrg extends Model
{
    protected $fillable = [
        'name',
        'email',
        'OrgID',
        'attendance',
        'department'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'OrgID' => 'string',
        'attendance' => 'integer',
        'department' => 'string'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
