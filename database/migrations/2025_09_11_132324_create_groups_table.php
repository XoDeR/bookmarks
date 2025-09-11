<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('parent_group_id')->nullable();
            $table->json('query_options')->nullable();
            $table->integer('links_count')->default(0);
            $table->unsignedBigInteger('user_id');

            $table->index('user_id', 'groups_user_id_foreign');
            $table->index('parent_group_id', 'groups_parent_group_id_foreign');

            $table->foreign('parent_group_id', 'groups_parent_group_id_foreign')
                  ->references('id')->on('groups')
                  ->onDelete('set null');

            $table->foreign('user_id', 'groups_user_id_foreign')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('groupables', function (Blueprint $table) {
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();

            $table->morphs('groupable');

            $table->unique(['group_id', 'groupable_id', 'groupable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
        Schema::dropIfExists('groups');
    }
};
