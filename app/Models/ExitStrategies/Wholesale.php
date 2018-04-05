<?php

namespace App\Models\ExitStrategies;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Wholesale extends Model
{
    use SoftDeletes;
    use PresentableTrait;

    protected $table = "wholesale_exits";

    protected $fillable = [
        'user_id',
        'property_id',
        'arv',
        'estimated_repairs',
        'assignment_fee',
        'deal_type',
        'buyers',
        'notes',
    ];

    /**
     * Property constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * Foreign key for user.
     *
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }

    /**
     * Foreign key for property.
     *
     * @return HasOne
     */
    public function property()
    {
        return $this->hasOne('App\Models\Property');
    }
}
