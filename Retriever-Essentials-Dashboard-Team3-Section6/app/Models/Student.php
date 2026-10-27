<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'studentID',
        'ethnicity',
        'race',
        'age',
        'major',
        'transfer_status',
        'first_gen',
        'international',
        'student_class',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'studentID' => 'string',
        'ethnicity' => 'string',
        'race' => 'string',
        'major' => 'string',
        'student_class' => 'string',
        'age' => 'integer',
        'transfer_status' => 'boolean',
        'first_gen' => 'boolean',
        'international' => 'boolean',
    ];

    public function studentOrgs(): BelongsToMany
    {
        return $this->belongsToMany(StudentOrg::class);
    }
}
