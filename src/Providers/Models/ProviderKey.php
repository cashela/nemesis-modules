<?php

namespace Nemesis\Modules\Providers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProviderKey extends Model
{
    /**
     * Use HasUuids trait to provide UUIDs as primary keys.
     */
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provider_keys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provider_id',
        'key_name',
        'key_value',
    ];

    /**
     * Get the provider that this key belongs to.
     *
     * Defines an inverse one-to-many relationship with the Provider model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
