<?php

use App\Models\CardType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('card_num')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedInteger('org_id')->nullable();
            $table->smallInteger('type')->default(CardType::$BASIC);
            $table->smallInteger('status')->default(\App\Models\Card::$NORMAL);
            $table->decimal('cash_balance',10, 2)->default(0);
            $table->decimal('consume_balance', 10, 2)->default(0);
            $table->decimal('real_balance', 10, 2)->default(0);
            $table->smallInteger('payday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
