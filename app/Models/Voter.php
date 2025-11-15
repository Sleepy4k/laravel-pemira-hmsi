<?php

namespace App\Models;

use App\Casts\AsEncrypt;
use App\Casts\AsHash;
use App\Concerns\HasUuid;
use App\Concerns\MakeCacheable;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasUuid, MakeCacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'vote_token',
        'has_voted',
        'voted_at',
        'batch_id',
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
            'name' => AsHash::class,
            'email' => AsHash::class,
            'vote_token' => AsEncrypt::class,
            'has_voted' => 'boolean',
            'voted_at' => 'datetime',
            'batch_id' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Set the cache prefix.
     *
     * @return string
     */
    public function setCachePrefix(): string {
        return 'voter.cache';
    }

    /**
     * Get the batch that owns the voter.
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    /**
     * Get the voting session associated with the voter through batch.
     */
    public function votingSession()
    {
        return $this->hasOneThrough(
            VotingSession::class,
            Batch::class,
            'id', // Foreign key on the batches table...
            'id', // Foreign key on the voting_sessions table...
            'batch_id', // Local key on the voters table...
            'id' // Local key on the batches table...
        );
    }
}
