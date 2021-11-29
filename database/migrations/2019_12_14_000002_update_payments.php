<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePayments extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dateTime('updated_at')
                ->after('created_at')
                ->nullable();

            $table->integer('user_id', false, false)
                ->after('id')
                ->nullable()->index();

            $table->unsignedTinyInteger('bill_status')
                ->after('bill_id')
                ->default(0)
                ->nullable();

            $table->unsignedBigInteger('bill_id')->nullable()->change();
        });
    }

    public function down()
    {

    }
}
