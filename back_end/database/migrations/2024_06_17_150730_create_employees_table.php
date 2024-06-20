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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->enum('kelamin', ['L', 'P']);;
            $table->string('npwp')->nullable();
            $table->string('nohp')->nullable();
            $table->string('unitkerja')->nullable();
            $table->string('tempattugas')->nullable();
            $table->string('namajabatan')->nullable();
            $table->string('foto')->nullable();
            $table->foreignId('echelon_id')->constrained('echelons')->nullable();
            $table->foreignId('group_id')->constrained('groups')->nullable();
            $table->foreignId('religion_id')->constrained('religions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        // Schema::table('employees', function (Blueprint $table) {
        //     $table->dropForeign(['echelon_id']);
        //     $table->dropForeign(['group_id']);
        //     $table->dropColumn('echelon_id');
        //     $table->dropColumn('group_id');
        // });
    }
};
