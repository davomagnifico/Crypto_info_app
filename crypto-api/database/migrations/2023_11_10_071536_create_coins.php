<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('crypto_id')->index();
            $table->string('symbol')->index();
            $table->string('name');
            $table->string('image');
            $table->decimal('current_price', 18, 8)->nullable();
            $table->decimal('market_cap', 18, 2)->nullable();
            $table->integer('market_cap_rank')->nullable();
            $table->decimal('fully_diluted_valuation', 18, 2)->nullable();
            $table->decimal('total_volume', 18, 2)->nullable();
            $table->decimal('high_24h', 18, 2)->nullable();
            $table->decimal('low_24h', 18, 2)->nullable();
            $table->decimal('price_change_24h', 18, 8)->nullable();
            $table->decimal('price_change_percentage_24h', 18, 8)->nullable();
            $table->decimal('market_cap_change_24h', 18, 2)->nullable();
            $table->decimal('market_cap_change_percentage_24h', 18, 8)->nullable();
            $table->decimal('circulating_supply', 18, 2)->nullable();
            $table->decimal('total_supply', 18, 2)->nullable();
            $table->decimal('max_supply', 18, 2)->nullable();
            $table->decimal('ath', 18, 2)->nullable();
            $table->decimal('ath_change_percentage', 18, 8)->nullable();
            $table->dateTime('ath_date')->nullable();
            $table->decimal('atl', 18, 2)->nullable();
            $table->decimal('atl_change_percentage', 18, 8)->nullable();
            $table->dateTime('atl_date')->nullable();
            $table->json('roi')->nullable();
            $table->dateTime('last_updated')->nullable();

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
        Schema::dropIfExists('coins');
    }
}
