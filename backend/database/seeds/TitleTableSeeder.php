<?php

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
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
                DB::table('titles')->truncate(); // 全レコードを削除、自動増分のIDを0にリセット
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                DB::table('titles')->insert([  // テーブルにデータをInsert
                    [
                        'user_id' => '1',
                        'title' => 'Sample Title1',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                      ],
                      [
                        'user_id' => '1',
                        'title' => 'Sample Title2',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                      ],
                      [
                        'user_id' => '2',
                        'title' => 'Sample Title2',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                      ],
                      [
                        'user_id' => '3',
                        'title' => 'Sample Title3',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                      ],
                    ]);
        
                // (2)基本文。毎回Mysqlにてレコードの削除が必要。（mysql>truncate table テーブル名;)
                // $param = [
                    // 'title_id' => '1',
                    // 'title' => 'Sample Title',
                    // 'heading' => 'サンプル日本語heading',
                    // 'due_date' => "2020-12-31",
                    // 'status' => '1',
                    // 'created_at' => date('Y-m-d H:i:s'),
                    // 'updated_at' => date('Y-m-d H:i:s'),
                
                // ];
                // DB::table('tasks')->insert($param);//
    }
}
