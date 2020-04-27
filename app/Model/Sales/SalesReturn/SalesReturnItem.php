<?php

namespace App\Model\Sales\SalesReturn;

use Illuminate\Database\Eloquent\Model;

class SalesReturnItem extends Model
{
    protected $connection = 'tenant';

    public static $alias = 'sales_return_item';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'sales_return_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'double',
        'price' => 'double',
        'discount_percent' => 'double',
        'discount_value' => 'double',
        'converter' => 'double',
    ];
}
