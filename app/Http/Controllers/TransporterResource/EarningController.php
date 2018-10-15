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

                $Order_total_amount_cash = OrderInvoice::withTrashed()
                    ->where('payment_mode', 'cash')
                    ->with('orders')
                    ->whereHas('orders', function ($q) use ($id) {
                        $q->where('orders.shift_id', $id);
                        $q->where('orders.status', 'COMPLETED');
                    })->sum('payable');

                $TransporterShift[0]->total_amount = (int)$Order_total_amount;
                $TransporterShift[0]->total_amount_pay = (int)$Order_total_amount_cash;
            }

            return $TransporterShift;

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => trans('form.whoops')], 500);
        } catch (Exception $e) {
            return response()->json(['error' => trans('form.whoops')], 500);
        }
    }

}
