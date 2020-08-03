<?php


namespace App\Services;


use App\DTO\Constants;
use App\Models\Bank;
use App\Models\Bill;
use App\Models\Card;
use Carbon\Carbon;
use Cassandra\Map;

class BankService extends BaseService
{
    /**
     * @param Bank $bank
     * @return int|mixed
     */
    public function getMaxUsableMoney(Bank $bank)
    {
        $cash = $bank->cards()->sum('cash_balance');
        $consume = $bank->cards()->sum('consume_balance');
        $real = $bank->cards()->sum('real_balance');
        return $cash + $consume + $real;
    }


    /**
     * @param Bank $bank
     * @return mixed
     */
    public function getMaxDebt(Bank $bank)
    {
        return $bank->bills->sum(function (Bill $bill) {
            return ($bill->total_stage - $bill->current_stage) * $bill->full_fee_per_stage;
        });
    }

    /**
     * @return Bank[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getBanks()
    {
         return Bank::all()->map(function (Bank $bank) {
             $bank->meta = [
                 'max_usable_money' => $this->getMaxUsableMoney($bank),
                 'next_payday' => $this->getTillNextPayDay($bank),
                 'debt' => [
                     'month_remaining' => $this->getRemainingDebtsThisMonth($bank),
                     'month_total' => $this->getTotalDebtsThisMonth($bank),
                     'total' => $this->getMaxDebt($bank),
                 ]
             ];
             return $bank;
         });
    }


    /**
     * @param Bank $bank
     * @return int
     */
    public function getTillNextPayDay(Bank $bank)
    {
        $payday = $bank->cards()->min('payday');
        if(!$payday) {
            return 0;
        }
        $paydayThisMonth = Carbon::today()->setDay($payday);
        $isOverDue = Carbon::today()->diffInDays($paydayThisMonth, false) < 0;
        return $isOverDue ? Carbon::today()->diffInDays(Carbon::today()->setDay($payday)->addMonth()): Carbon::today()->diffInDays(Carbon::today()->setDay($payday));
    }


    /**
     * @param Bank $bank
     * @return float
     */
    public function getTotalDebtsThisMonth(Bank $bank)
    {
        return  (float)$bank->bills()->sum('full_fee_per_stage');
    }


    /**
     * @param Bank $bank
     * @return float
     */
    public function getRemainingDebtsThisMonth(Bank $bank)
    {
        return (float)$bank->bills()->where('status', Constants::$BILL_STATUS_DEFAULT)->sum('full_fee_per_stage');
    }


    /**
     * @param array $params
     * @return Bank|\Illuminate\Database\Eloquent\Model
     */
    public function addBank($params = [])
    {
        return Bank::create($params);
    }


    /**
     * @param $bankId
     * @return bool|null
     */
    public function deleteBank($bankId)
    {
        try {
            return Bank::findOrFail($bankId)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param $bankId
     * @param array $params
     * @return bool
     */
    public function updateBank($bankId, $params = [])
    {
        return Bank::findOrFail($bankId)->update($params);
    }

}
