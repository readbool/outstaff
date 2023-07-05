<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLE = 'billings';

    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->id();
            $table->string('customer_account_number');
            $table->string('invoice_number');
            $table->string('site_identifier');
            $table->dateTime('billing_start_date');
            $table->dateTime('billing_end_date');
            $table->string('total_amount');
            $table->string('electricity_usage');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
};
