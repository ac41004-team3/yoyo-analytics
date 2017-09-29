<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Outlet;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    private $outlets;

    private $chart;
    private $type;
    private $from;
    private $to;

    /**
     * ChartController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        // TODO: Implement into constructor
        $ids = explode(',', $request->input('outlets'));

        $this->chart = $request->input('chart');
        $this->type = $request->input('type');
        $this->from = new Carbon($request->input('from'));
        $this->to = new Carbon($request->input('to'));

        $this->outlets = Outlet::whereIn('id', $ids)->with([
            'transactions' => function ($query) {
                $query->whereBetween('date', [$this->from, $this->to]);
            }
        ])->get();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $collection = [
            'data' => [
                'labels' => $this->labels(),
                'datasets' => $this->datasets(),
            ],
            'options' => [
                'responsive' => true,
            ],
        ];

        return $collection;
    }

    /**
     * @param $from Carbon
     * @param $to Carbon
     * @return array
     */
    private function labels()
    {
        $labels = collect([]);
        $from = clone $this->from;

        do {
            $labels->push($from->format('D d M'));
            $from = $from->addDays(1);
        } while ($from < $this->to);

        return $labels->unique()->toArray();
    }

    /**
     * @return array
     */
    private function datasets()
    {
        $datasets = [];
        /** @var Outlet $outlet */
        foreach ($this->outlets as $outlet) {
            // TODO: Fix conversion bug where array is converted to key value if not initialised
            $data = array_fill(0, 50, 0);
            $grouped = $outlet->transactions->groupBy(function ($item) {
                return $this->position(Carbon::parse($item->date));
            });
            foreach ($grouped as $index => $transactions) {
                $data[$index] = $this->calculate($transactions);
            }
            $datasets[] = [
                'label' => $outlet->name,
                'backgroundColor' => '#' . substr(md5($outlet->name), 0, 6),
                'borderColor' => '#' . substr(md5($outlet->name), 0, 6),
                'data' => $data,
            ];
        }
        return $datasets;
    }

    /**
     * @param $date Carbon
     * @param $from Carbon
     * @return mixed Carbon
     */
    private function position($date)
    {
        return $date->diffInDays($this->from);
    }

    /**
     * @param $transactions Collection
     * @return int
     */
    private function calculate($transactions)
    {
        $total = 0;
        switch ($this->type) {
            case 'quantity':
                $total = count($transactions->toArray());
                break;
            case 'takings':
                foreach ($transactions as $transaction) {
                    $total += $transaction->total;
                }
                $total /= 100;
                break;
            case 'average':
                foreach ($transactions as $transaction) {
                    $total += $transaction->total;
                }
                $total /= 100;
                $total /= count($transactions->toArray());
                break;
        }
        return $total;
    }
}
