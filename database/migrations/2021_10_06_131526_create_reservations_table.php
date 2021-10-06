<?php

use App\Models\Reservation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id')->index();
            $table->unsignedBigInteger('customer_id')->index();
            $table->string('code')->uniqid()->index();
            $table->date('date'); ## if customer reserve in next week example
            $table->time('from_time');
            $table->time('to_time');
            $table->integer('status')->default(Reservation::UNAVAILABLE); 
            $table->timestamps();

            $table->foreign('table_id')->references('id')->on('tables')->onu('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
