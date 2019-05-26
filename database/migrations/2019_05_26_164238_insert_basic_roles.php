<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class InsertBasicRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            ['id' => 1, 'role_code' => 'admin', 'role_name' => 'System Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'role_code' => 'supervisor', 'role_name' => 'Supervisor/Moderator', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'role_code' => 'client', 'role_name' => 'Normal user', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Role::destroy([1,2,3]);
    }
}
