<?php

namespace App\Listeners;

use App\Customer;
use App\Events\FileUploaded;
use App\Outlet;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ProcessUploadedFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FileUploaded $event
     * @return void
     */
    public function handle(FileUploaded $event)
    {
        Log::debug('Starting import..');

        Excel::filter('chunk')->load(storage_path('app/' . $event->path))->chunk(200, function($results)
        {
            foreach($results as $row)
            {
                $data = [];
                foreach($row as $entry) {
                    array_push($data, $entry);
                }
                $transaction = $this->process($data);
                Transaction::create($transaction);
            }
        });

        Log::debug('Import finished!');
    }

    private function process($data)
    {
        $customer = Customer::updateOrCreate(['id' => $data[5]]);
        $outlet = Outlet::updateOrCreate(['id' => $data[2]], [
            'name' => $data[4]
        ]);

        return [
            'customer_id' => $customer->id,
            'outlet_id' => $outlet->id,
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
