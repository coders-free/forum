<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\VoucherImport;
use Maatwebsite\Excel\Facades\Excel;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new VoucherImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
    }
}
