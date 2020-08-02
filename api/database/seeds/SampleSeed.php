<?php

use Illuminate\Database\Seeder;

class SampleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = \App\Models\Bank::create([
            'name' => '支付宝',
            'logo' => 'zhifubao.logo.png'
        ]);

        $card  = \App\Models\Card::create([
            'name' => '花呗',
            'logo' => 'huabei.logo.png',
            'org_id' => $bank->id,
            'type' => \App\Models\CardType::$STAGED,
            'real_balance'=> '100.01',
            'payday' => 9,
        ]);

        $bill = \App\Models\Bill::create([
            'card_id' => $card->id,
            'is_staged' => true,
            'org_id' => $bank->id,
            'total_stage' => 12,
            'current_stage' => 7,
            'full_fee_per_stage'=>42.86,
            'payday'=> 9
        ]);
    }
}
