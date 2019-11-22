<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


    		DB::table('diadiem')->insert([
             'quocgia' => 'Việt Nam',
            'quanhuyen'=>'Ninh Kiều',
            'thanhpho'=>'Cần thơ',
        ]);
         DB::table('nhanghi')->insert([
            'tennhanghi' => 'Nhà nghỉ 123',
            'diachi'=>'123 XVNT, NK, Cần thơ',
            'sophong'=>4,
            'giomocua'=>'7:00:00',
            'ghichu'=>'abcdef',
            'diadiem_id' => '1',
        ]);
        
        
        DB::table('tiennghi')->insert([
             'tentiennghi'=>'Wifi',
             'tenphong'=>'a',
            'maphong_id' => '1',
        ]);
      
      
      
    }
}
