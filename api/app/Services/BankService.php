<?php


namespace App\Services;


use App\Models\Bank;
use App\Models\Bill;
use Carbon\Carbon;

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
                 'max_debt' => $this->getMaxDebt($bank),
                 'next_payday' => $this->getTillNextPayDay($bank),
             ];
             return $bank;
         });
    }

    public function getTillNextPayDay(Bank $bank)
    {
        $payday = $bank->cards->first()->payday;
        $paydayThisMonth = Carbon::today()->setDay($payday);
        $isOverDue = Carbon::today()->diffInDays($paydayThisMonth, false) < 0;
        return $isOverDue ? Carbon::today()->diffInDays(Carbon::today()->setDay($payday)->addMonth()): Carbon::today()->diffInDays(Carbon::today()->setDay($payday));
    }
}
