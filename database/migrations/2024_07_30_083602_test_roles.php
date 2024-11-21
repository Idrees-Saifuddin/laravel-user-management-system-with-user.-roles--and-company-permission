<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Role::create(['name' => 'admin', 'guart_name' => 'web']);
        Role::create(['name' => 'manager', 'guart_name' => 'web']);
        Role::create(['name' => 'user', 'guart_name' => 'web']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
