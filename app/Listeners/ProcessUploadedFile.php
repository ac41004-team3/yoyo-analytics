<?php

namespace App\Listeners;

use App\Customer;
use App\Events\FileUploaded;
use App\Import;
use App\Outlet;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
        $status = 'success';
        $import = Import::create([
            'user_id' => Auth::user()->id,
            'status' => $status,
        ]);

        try {
            Excel::filter('chunk')->load(storage_path('app/' . $event->path))->chunk(200,
                function ($results) use ($import) {
                    foreach ($results as $row) {
                        // associative array to indexed
                        $data = [];
                        foreach ($row as $entry) {
                            array_push($data, $entry);
                        }
                        $transaction = $this->process($data, $import);
                        Transaction::updateOrCreate([
                            'date' => $transaction['date'],
                            'customer_id' => $transaction['customer_id'],
                        ], $transaction);
                    }
                });
        } catch (Exception $e) {
            $status = 'error';
        } finally {
            $import->status = $status;
            $import->save();
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
