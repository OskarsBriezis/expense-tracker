<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->decimal('amount', 6, 2)->change();

            // Check if the 'date' column exists before renaming
            if (Schema::hasColumn('expenses', 'date')) {
                $table->renameColumn('date', 'spent_at');
            }
        });

        // Add 'spent_at' column only if it doesn't already exist
        if (!Schema::hasColumn('expenses', 'spent_at')) {
            Schema::table('expenses', function (Blueprint $table) {
                $table->dateTime('spent_at')->default(now()->setTime(18, 30));
            });
        }
    }

    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->change();

            // Check if the 'spent_at' column exists before renaming back
            if (Schema::hasColumn('expenses', 'spent_at')) {
                $table->renameColumn('spent_at', 'date');
            }

            // Drop 'spent_at' column only if it exists
            if (Schema::hasColumn('expenses', 'spent_at')) {
                $table->dropColumn('spent_at');
            }
        });
    }
};