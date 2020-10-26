<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // (1)レコードデータをいちいち消さなくていい文
        DB::table('users')->truncate(); // 全レコードを削除、自動増分のIDを0にリセット
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('users')->insert([  // テーブルにデータをInsert
            [
                'name' => '管理者',
                'email' => 'test@yahoo.co.jp',
                'password' => bcrypt('testtest'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
              ],
              [
                'name' => 'test2',
                'email' => 'test2@yahoo.co.jp',
                'password' => bcrypt('testtest'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
              ],
              [
                'name' => 'test3',
                'email' => 'test3@yahoo.co.jp',
                'password' => bcrypt('testtest'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
              ],
              [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => bcrypt('testtest'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
              ],
            ]);
    }
}
