<?php

namespace App\Listeners;

use App\Customer;
use App\Events\FileUploaded;
use App\Outlet;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        foreach (file(storage_path('app/' . $event->path)) as $data) {
            $transaction = $this->process($data);
            Transaction::create($transaction);
        }
        Log::debug('Import finished!');
    }

    private function process($data)
    {
        $data = explode(';', $data);

        $customer = Customer::updateOrCreate(['id' => $data[5]]);
        $outlet = Outlet::updateOrCreate(['id' => $data[2]], [
            'name' => $data[4]
        ]);

        Log::debug($this->parseCurrency($data[7]));
        return [
            'customer_id' => $customer->id,
            'outlet_id' => $outlet->id,
            'date' => new Carbon(str_replace('/', '-', $data[0])),
            'type' => $data[6],
            'spent' => $this->parseCurrency($data[7]),
            'discount' => $this->parseCurrency($data[8]),
            'total' => $this->parseCurrency($data[9]),
        ];
    }

    private function parseCurrency($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

}
