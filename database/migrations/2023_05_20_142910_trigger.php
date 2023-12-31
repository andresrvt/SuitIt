<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER add_wardrobe AFTER INSERT ON `USERS` FOR EACH ROW
        BEGIN
           INSERT INTO `wardrobes` SET user_id = NEW.id, created_at = NEW.created_at, updated_at = NEW.updated_at;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_wardrobe`');
    }
};
