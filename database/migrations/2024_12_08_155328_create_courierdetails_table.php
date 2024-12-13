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
        Schema::create('courierdetails', function (Blueprint $table) {
            $table->id();
            $table->enum('sender_type',['Individual','Company']);
            $table->string('company_name',50);
            $table->string('sender_name',50);
            $table->string('sender_email',50);
            $table->string('sender_phone',15);
            $table->string('sender_address',50);
            $table->string('receiver_name',50);
            $table->string('receiver_email',50);
            $table->string('receiver_phone',50);
            $table->string('receiver_address',50);
            $table->integer('sender_branch_id');
            $table->integer('receiver_branch_id');
            $table->integer('sender_agent_id');
            $table->integer('manager_id');
            $table->enum('status',['Processing','On the way','Out of Delivery','Delivered'])->default('Processing');
            $table->string('item_description',250);
            $table->string('tracking_id');
            $table->string('unit_name');
            $table->string('cost');
            $table->integer('quantity');
            $table->integer('total_cost');
            $table->string('comment',50);
            $table->integer('grand_total');
            $table->enum('payment_type',['Sender Payment','Receiver Payment'])->default('Sender Payment');
            $table->string('payment_status',20);
            $table->integer('payment_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courierdetails');
    }
};
