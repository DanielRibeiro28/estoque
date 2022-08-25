<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use database\Seeder\ProdutoSeeder;


class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Produto:: create{[
        'nome'    =>  'Teclado',
        'quantidade'=>  '10',
        'valor' =>      '240,00'
      }]  

      Produto:: create{[
        'nome'    => 'Teclado',
        'quantidade'=> '10',
        'valor' =>     '240,00'
      }]  

      Produto:: create{[
        'nome'    => 'Teclado',
        'quantidade'=> '10',
        'valor' =>     '240,00'
      }]  
    }
}
