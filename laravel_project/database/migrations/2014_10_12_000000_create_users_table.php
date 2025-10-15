
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
         $table->string('phone'); // remove ->unique()
            $table->string('password');
       

            $table->enum('type', ['admin', 'user']);
            $table->enum('status', ['active', 'inactive'])->default('active');

           
          
            $table->boolean('is_online')->default(false);
    
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};