<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBillRequest;
use App\Http\Requests\DeleteBillRequest;
use App\Http\Requests\UpdateBillRequest;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function addBill(AddBillRequest $request)
    {
        return $this->billService->addBill($request->validated());
    }

    public function updateBill(UpdateBillRequest $request, $billId)
    {
        return $this->billService->updateBill($billId, $request->validated());
    }

    public function deleteBill(DeleteBillRequest $request, $billId)
    {
        return $this->billService->deleteBill($billId);
    }
}
