<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('tasks', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('tasks', 'due_date')) {
                $table->date('due_date')->nullable();
            }
            if (!Schema::hasColumn('tasks', 'status')) {
                $table->string('status')->default('pending');
            }
            if (!Schema::hasColumn('tasks', 'is_archived')) {
                $table->boolean('is_archived')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $columns = ['title', 'description', 'due_date', 'status', 'is_archived'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('tasks', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};