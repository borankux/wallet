<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FinancialOrganization
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Bank whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Card[] $cards
 * @property-read int|null $cards_count
 * @property array $meta;
 */
class Bank extends Model
{

    protected $fillable = [
        'name',
        'logo'
    ];

    protected $hidden = ['bills', 'cards'];
    /**
     * @var mixed
     */

    public function bills()
    {
        return $this->hasMany(Bill::class, 'org_id', 'id');
    }

    public  function cards()
    {
        return $this->hasMany(Card::class, 'org_id', 'id');
    }
}
