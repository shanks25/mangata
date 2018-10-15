<?php

namespace App\Http\Controllers\TransporterResource;

use App\OrderInvoice;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EarningController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $Transporter = $request->user();

            $TransporterShift = $Transporter->shift();

            if (count($TransporterShift) > 0) {
                $id = $TransporterShift[0]->id;

                $Order_total_amount = OrderInvoice::withTrashed()->with('orders')
                    ->whereHas('orders', function ($q) use ($id) {
                        $q->where('orders.shift_id', $id);
                        $q->where('orders.status', 'COMPLETED');
                    })->sum('net');

                $Order_total_tip = OrderInvoice::withTrashed()->with('orders')
                    ->whereHas('orders', function ($q) use ($id) {
                        $q->where('orders.shift_id', $id);
                        $q->where('orders.status', 'COMPLETED');
                    })->orders()->sum('tip');

                $TransporterShift[0]->total_amount = (int)$Order_total_amount;
                $TransporterShift[0]->total_tip = (int)$Order_total_tip;
            }

            return $TransporterShift;

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => trans('form.whoops')], 500);
        } catch (Exception $e) {
            dd($e);
            return response()->json(['error' => trans('form.whoops')], 500);
        }
    }

}
