<?php

namespace App\Models;

use App\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'head_name',
        'vice_name',
        'photo',
        'resume',
        'attachment',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'head_name' => 'string',
            'vice_name' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

}
