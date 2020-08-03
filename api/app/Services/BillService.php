<?php


namespace App\Services;


use App\Models\Bank;
use App\Models\Bill;

class BillService extends BaseService
{
    public function getTotalDebt(Bill $bill)
    {

    }

    public function addBill($params = [])
    {
        return Bank::create($params);
    }

    public function updateBill($billId, $params = [])
    {
        return Bank::findOrFail($billId)->update($params);
    }

    public function deleteBill($billId)
    {
        try {
            return Bank::findOrFail($billId)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
