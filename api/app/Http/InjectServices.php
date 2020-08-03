<?php


namespace App\Http\ControllerHelpers;


use App\Services\BankService;

trait InjectServices
{
    /**
     * @var BankService $bankService
     */
    protected $bankService;

    /**
     * InjectServices constructor.
     * @param BankService $bankService
     */
    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
    }
}
