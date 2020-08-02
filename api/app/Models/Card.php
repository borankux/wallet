<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $name
 * @property string|null $card_num
 * @property string|null $logo
 * @property int|null $org_id
 * @property \App\Models\CardType $type
 * @property int $status
 * @property float $cash_balance
 * @property float $consume_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property float $real_balance
 * @property int|null $payday
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCardNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCashBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereConsumeBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereTotalBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card wherePayday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereRealBalance($value)
 * @mixin \Eloquent
 */
class Card extends Model
{
    public static $NORMAL = 0x01;
    public static $FROZEN = 0x02;

    protected $fillable = [
        'name',
        'logo',
        'card_num',
        'org_id',
        'type',
        'status',
        'cash_balance',
        'consume_balance',
        'real_balance',
        'payday'
    ];

    public function type () {
        return $this->belongsTo(CardType::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'org_id', 'id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'card_id', 'id');
    }
}
