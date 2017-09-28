<?php

use App\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outlets = [
            ['id' => 235, 'name' => 'DJCAD Cantina'],
            ['id' => 236, 'name' => 'Air Bar'],
            ['id' => 237, 'name' => 'Floor Five'],
            ['id' => 238, 'name' => 'Library'],
            ['id' => 239, 'name' => 'Dental Café'],
            ['id' => 240, 'name' => 'Food on Four'],
            ['id' => 241, 'name' => 'Liar Bar'],
            ['id' => 242, 'name' => 'Mono'],
            ['id' => 243, 'name' => 'Level 2, Reception'],
            ['id' => 343, 'name' => 'Premier Shop - Yoyo Accept'],
            ['id' => 456, 'name' => 'DUSA The Union - Marketplace'],
            ['id' => 2676, 'name' => 'Premier Shop'],
            ['id' => 2677, 'name' => 'College Shop'],
            ['id' => 2679, 'name' => 'Ninewells Shop'],
        ];

        foreach ($outlets as $outlet) {
            Outlet::updateOrCreate(['id' => $outlet['id']], [
                'name' => $outlet['name'],
            ]);
        }
    }
}
