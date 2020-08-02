<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CardType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CardType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CardType extends Model
{
    public static $STAGED = 0x01;
    public static $BASIC = 0x02;
}
