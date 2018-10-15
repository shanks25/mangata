<?php

namespace App\Http\Controllers\Resource;

use App\TransporterDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        //
        $transporterDocs = TransporterDocument::where('transporter_id', $id)->get();

//        dd($transporterDocs);

        if ($transporterDocs) {
            return view('admin.transporters.documents.index', compact('transporterDocs', 'id'));
        } else {
            return redirect()->back()->withErrors('Transporter does not have any documents');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($transporter_id, $id)
    {
        //
        $transporterDoc = TransporterDocument::where('transporter_id', $transporter_id)
            ->where('document_id')
            ->get();

        //
        return view('edi');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
