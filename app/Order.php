<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'delivery_dt'
    ];


    public $appends = [
        'statuses'
    ];


    /**
     * Scope a query to only include Overdue orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOverdue($query)
    {
        return $query->where('status', '=', 10)->where('delivery_dt','<',Carbon::now())->orderBy('delivery_dt','ASC')->limit(50);
    }

    /**
     * Scope a query to only include Current orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCurrent($query)
    {
        return $query->where('status', '=', 10)->where('delivery_dt','>=',Carbon::now()->addHours(24))->orderBy('delivery_dt','DESC')->limit(50);
    }


    /**
     * Scope a query to only include New orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNew($query)
    {
        return $query->where('status', '=', 0)->where('delivery_dt','>',Carbon::now())->orderBy('delivery_dt','DESC')->limit(50);
    }



    /**
     * Scope a query to only include Success orders.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSuccess($query)
    {
        return $query->where('status', '=', 20)->where('delivery_dt','>=',Carbon::now())->orderBy('delivery_dt','ASC')->limit(50);
    }


    public function partner()
    {
        return $this->hasOne('App\Partner','id','partner_id');
    }

    public function order_products()
    {
        return $this->hasMany('App\OrderProduct','order_id','id');
    }

    public function getStatusAttribute($key)
    {
        switch ($key) {
            case 0:
                return "новый";
                break;
            case 10:
                return "подтвержден";
                break;
            case 20:
                return "завершен";
                break;
            default:
                echo "Неизвестный статус";
        }
        return "Неизвестный статус";
    }

    public function getStatusesAttribute($key)
    {
        $statuses = array(0=>'новый',10=>'подтвержден',20=>'завершен');
        return $statuses;
    }
}
