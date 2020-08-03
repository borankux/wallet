<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBankRequest;
use App\Http\Requests\DeleteBankRequest;
use App\Http\Requests\UpdateBankRequest;

class BankController extends Controller
{

    /**
     * @return \App\Models\Bank[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getBanks()
    {
        return $this->bankService->getBanks();
    }


    /**
     * @param AddBankRequest $request
     * @return \App\Models\Bank|\Illuminate\Database\Eloquent\Model
     */
    public function addBank(AddBankRequest $request)
    {
        return $this->bankService->addBank($request->validated());
    }


    /**
     * @param DeleteBankRequest $request
     * @param $bankId
     * @return bool|null
     */
    public function deleteBank(DeleteBankRequest $request, $bankId)
    {
        return $this->bankService->deleteBank($bankId);
    }


    /**
     * @param UpdateBankRequest $request
     * @param $bankId
     * @return bool
     */
    public function updateBill(UpdateBankRequest $request, $bankId)
    {
        return $this->bankService->updateBank($bankId, $request->validated());
    }
}
