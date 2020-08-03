<?php


namespace App\Http\ControllerHelpers;


use App\Services\BankService;
use App\Services\BillService;
use App\Services\CardService;

trait InjectServices
{
    /**
     * @var BankService $bankService
     */
    protected $bankService;


    /**
     * @var CardService $cardService
     */
    protected $cardService;


    /**
     * @var BillService $billService
     */
    protected $billService;

    /**
     * InjectServices constructor.
     * @param BankService $bankService
     * @param CardService $cardService
     * @param BillService $billService
     */
    public function __construct(BankService $bankService, CardService $cardService, BillService $billService)
    {
        $this->bankService = $bankService;
        $this->cardService = $cardService;
        $this->billService = $billService;
    }
}
