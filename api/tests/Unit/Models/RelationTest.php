<?php


namespace Tests\Unit\Models;


use App\Models\Bill;
use App\Models\Card;
use App\Models\Bank;
use Tests\TestCase;

class RelationTest extends TestCase
{
    /**
     * @var Bank
     */
    protected $bank;

    /**
     * @var Bill
     */
    protected $bill;

    /**
     * @var Card
     */
    protected $card;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createModels();
    }

    protected function createModels()
    {
        $this->bank = \App\Models\Bank::create([
            'name' => '支付宝',
            'logo' => 'zhifubao.logo.png'
        ]);

        $this->card  = \App\Models\Card::create([
            'name' => '花呗',
            'logo' => 'huabei.logo.png',
            'org_id' => $this->bank->id,
            'type' => \App\Models\CardType::$STAGED,
            'real_balance'=> '100.01',
            'payday' => 9,
        ]);

        $this->bill = \App\Models\Bill::create([
            'card_id' => $this->card->id,
            'org_id' => $this->bank->id,
            'is_staged' => true,
            'total_stage' => 12,
            'current_stage' => 7,
            'full_fee_per_stage'=>42.86,
            'payday'=> 9
        ]);
    }

    public function testModelRelations()
    {
        $this->assertEquals($this->bank->name, $this->card->bank->name);
        $this->assertEquals($this->bank->name, $this->bill->bank->name);
        $this->assertEquals($this->card->name, $this->bill->card->name);
        $this->assertEquals($this->bill->total_stage, $this->card->bills()->where('id', $this->bill->id)->get()->first()->total_stage);
    }
}
