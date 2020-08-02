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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FinancialOrganization whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Card[] $cards
 * @property-read int|null $cards_count
 */
class FinancialOrganization extends Model
{

    protected $fillable = [
        'name',
        'logo'
    ];
    public function bills()
    {
        return $this->hasMany(Bill::class, 'org_id', 'id');
    }

    public  function cards()
    {
        return $this->hasMany(Card::class, 'org_id', 'id');
    }
}
