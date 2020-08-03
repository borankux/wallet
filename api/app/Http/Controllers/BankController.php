<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBankRequest;
use App\Http\Requests\DeleteBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function getBanks()
    {
        return $this->bankService->getBanks();
    }

    public function addBank(AddBankRequest $request)
    {

    }

    public function deleteBank(DeleteBankRequest $request)
    {

    }

    public function updateBill(UpdateBankRequest $request)
    {

    }
}
