<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $hashedPassword = Hash::make('zvadmin@132');
        DB::table('users')->insert([
            'name' => 'zvadmin',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => $hashedPassword,
            'created_at' => now(),
            'updated_at' => now(),
        ]); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
