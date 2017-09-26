<?php

use App\Customer;
use App\Import;
use App\Outlet;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ImportFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = 'success';

        $import = Import::create([
            'user_id' => 1,
            'status' => $status,
        ]);

        $csv = array_map('str_getcsv', file(base_path('import.csv')));
        $max = sizeof($csv);
        foreach ($csv as $key => $value) {
            echo "Importing $key of $max \t [" . number_format(($key/$max)*100, 2, '.', '') . "%]\n";
            if ($key == 0) {
                print_r($value);
                continue;
            }
            $transaction = $this->process($value, $import);
            Transaction::updateOrCreate([
                'date' => $transaction['date'],
                'customer_id' => $transaction['customer_id'],
            ], $transaction);
        }
    }

    private function process($data, $import)
    {
        $customer = Customer::updateOrCreate(['id' => $data[5]]);
        $outlet = Outlet::updateOrCreate(['id' => $data[2]], [
            'name' => $data[4]
        ]);

        return [
            'customer_id' => $customer->id,
            'outlet_id' => $outlet->id,
            'import_id' => $import->id,
            'date' => new Carbon(str_replace('/', '-', $data[0])),
            'type' => $data[6],
            'spent' => $this->parseCurrency($data[7]),
            'discount' => $this->parseCurrency($data[8]),
            'total' => $this->parseCurrency($data[7]) + $this->parseCurrency($data[8]),
        ];
    }

    private function parseCurrency($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}
