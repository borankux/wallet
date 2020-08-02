<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->unsignedBigInteger('org_id')->nullable();
            $table->boolean('is_staged')->default(false)->nullable();
            $table->smallInteger('total_stage')->nullable();
            $table->smallInteger('current_stage')->nullable();
            $table->decimal('full_fee_per_stage', 10, 2)->nullable();
            $table->decimal('minimal_fee_per_stage', 10, 2)->nullable();
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
        Schema::dropIfExists('bills');
    }
}
