<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('contract_date')->nullable();
            $table->string('subject')->nullable();
            $table->longText('full_text')->nullable();
            $table->boolean('is_signed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
