<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Site extends Model
{
    use HasFactory;

    protected $table = 'sites';

    protected $fillable = [
        'name',
        'address',
        'identifier',
    ];

    public function getAddress(): string
    {
        return $this->getAttribute('address');
    }

    public function getIdentifier(): string
    {
        return $this->getAttribute('identifier');
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function getUser(): User
    {
        return $this->getAttribute('user');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
