<?php

namespace Cashela\Modules\Providers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProviderProfile extends Model
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
    protected $table = 'provider_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provider_id',
    ];

    /**
     * Get the provider that owns this profile.
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
