<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomerImport;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CustomerImport, 'GENERADOS_DD/FORUM_CLIENTES_20201217.csv', 'ftp');
    }
}
