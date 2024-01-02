<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('phone')->nullable();
            $table->text('email')->nullable();
            $table->tinyInteger('email_verified')->default(0);
            $table->text('photo')->nullable();
            $table->text('wallet_address')->nullable();
            $table->text('password')->nullable();
            $table->float('ref_balance')->default(0);
            $table->float('balance')->default(0);
            $table->string('deposit_balance', 20)->default('0.00');
            $table->string('plan')->nullable();
            $table->timestamp('plan_updated')->useCurrent();
            $table->text('ip_address')->nullable();
            $table->text('location')->nullable();
            $table->string('referral_code', 10)->nullable();
            $table->string('referrer1', 10)->nullable()->comment('1st upline');
            $table->string('referrer2', 11)->nullable()->comment('2nd upline');
            $table->string('referrer3', 11)->nullable()->comment('3rd upline');
            $table->string('status')->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
