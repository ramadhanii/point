<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('form_number')->index();
            $table->string('form_number_reference')->index();
            $table->unsignedInteger('chart_of_account_id')->index();
            $table->decimal('debit', 65, 30)->default(0);
            $table->decimal('credit', 65, 30)->default(0);
            $table->integer('journalable_id');
            $table->string('journalable_type');
            $table->timestamps();

            $table->foreign('chart_of_account_id')
                ->references('id')
                ->on('chart_of_accounts')
                ->onDelete('cascade');

            $table->foreign('form_number_reference')
                ->references('number')
                ->on('forms')
                ->onDelete('cascade');

            $table->foreign('form_number')
                ->references('number')
                ->on('forms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}
