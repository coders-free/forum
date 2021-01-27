<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CategoryImport, 'GENERADOS_DD/FORUM_CATEGORIAS.csv', 'ftp');
    }
}
