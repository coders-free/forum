<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\CodeImport;
use Maatwebsite\Excel\Facades\Excel;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CodeImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
    }
}
