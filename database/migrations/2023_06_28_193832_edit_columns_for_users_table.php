<?php

use App\Models\User;
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
        Schema::create('telegrams', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string("service_uid", 256)->unique()->nullable(false);
            $table->string("service_login")->unique()->nullable();
            $table->json("data");
        });

        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string("service_uid", 256)->unique()->nullable(false);
            $table->string("service_login")->unique()->nullable();
            $table->json("data");
        });

        Schema::table(app(User::class)->getTable(), function (Blueprint $table) {
            $table->foreignId("telegram")->nullable();
            $table->foreignId("email")->nullable();
            $table->dropColumn("complete");
            $table->enum("status", ["registered", "processed", "customer", "finished"])->nullable(false);
            $table->dropColumn("tg_name");
            $table->dropColumn("tg_id");
            $table->dropColumn("user_name");
            $table->dropColumn("user_data");
            $table->dropColumn("test_data");
            $table->dropColumn("test_score");
            $table->dropColumn("reg_hash");
            $table->dropColumn("repeater_count");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(app(User::class)->getTable(), function (Blueprint $table) {
            $table->dropColumn("telegram");
            $table->dropColumn("email");
            $table->tinyInteger("complete")->default(0);
            $table->string('tg_name', 255)->nullable();
            $table->string('tg_id', 30)->unique();
            $table->string('user_name', 255)->nullable();
            $table->json("user_data");
            $table->json("test_data");
            $table->integer("test_score")->nullable();
            $table->string("reg_hash", 255)->unique()->nullable(false);
            $table->integer("repeater_count")->default(0);
        });
        Schema::dropIfExists('emails');
        Schema::dropIfExists('telegrams');
    }
};