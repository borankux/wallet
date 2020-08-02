<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bill
 *
 * @property int $id
 * @property int|null $card_id
 * @property int|null $is_staged
 * @property int|null $total_stage
 * @property int|null $current_stage
 * @property float|null $full_fee_per_stage
 * @property float|null $minimal_fee_per_stage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $payday
 * @property Card $card
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereCurrentStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereFullFeePerStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereIsStaged($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereMinimalFeePerStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereTotalStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill wherePayday($value)
 * @property int|null $org_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bill whereOrgId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\FinancialOrganization|null $bank
 */
class Bill extends Model
{
    protected $fillable = [
        'card_id',
        'is_staged',
        'total_stage',
        'current_stage',
        'full_fee_per_stage',
        'minimal_fee_per_stage',
        'created_at',
        'updated_at',
        'payday',
        'org_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(FinancialOrganization::class, 'org_id', 'id');
    }
}
