<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Repositories\Harga\InvoiceInterface;
use App\Repositories\Toko\Spk\SpkInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @var SpkInterface
     */
    private $spk;
    /**
     * @var InvoiceInterface
     */
    private $invoice;

    public function __construct(SpkInterface $spk, InvoiceInterface $invoice)
    {
        $this->spk = $spk;
        $this->invoice = $invoice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd($this->invoice->getNoInvoice());
        $spk=$this->spk->getAll();
        $data=compact('harga','spk');
        return view('invoice.index',$data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'persen' => 'required',
            'ppn' => 'required',
        ],[
            'persen.required' => 'persen harus di isi',
            'ppn.required' => 'ppn harus di isi'
        ]);
        $data=$request->all();
        $data['tujuan']=$request->untuk;
        $this->invoice->store($data);

        return redirect()->route('invoice.show',$request['spk_id'])->withMessage('Data  berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        dd($harga);
        $noinvoice=$this->invoice->getNoInvoice();
        $spk=$this->spk->getDetail($id);
        if ($spk->detailHarga != null){
        $harga=array_sum($this->invoice->getNominal($id));
        }
//        $toko=$this->toko->getAll();
        $data=compact('spk','harga','noinvoice');
        return view('invoice.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $invoice=$this->invoice->getDetail($id);
        $data=compact('invoice');
        return view('invoice.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'persen' => 'required',
            'ppn' => 'required',
        ],[
            'persen.required' => 'persen harus di isi',
            'ppn.required' => 'ppn harus di isi'
        ]);
        $data=$request->all();
        $data['tujuan']=$request->untuk;
        $this->invoice->update($id,$data);

        return redirect()->route('invoice.show',$request['spk_id'])->withMessage('Data  berhasil di rubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {

    }
    public function konfirmasi(Request $request,$id )
    {

        $data['tujuan']=$request->untuk;
        $this->invoice->konfirmasi($request->inv_id);

        return redirect()->route('invoice.show',$request['spk_id'])->withMessage('Berhasil Di konfirmasi');
    }
    public function showinv($id)
    {
        $invoice=$this->invoice->getDetail($id);
        $harga=array_sum($this->invoice->getNominal($invoice->spk->id));
//        dd($harga);
//        $noinvoice=$this->invoice->getNoInvoice();
        $spk=$this->spk->getDetail($invoice->spk->id);
//        $toko=$this->toko->getAll();
        $data=compact('spk','harga','invoice');
        return view('invoice.showinv',$data);
    }

}
