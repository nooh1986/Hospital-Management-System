<?php

namespace App\Repository;

use App\Models\Patient;
use App\Models\Receipt;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ReceiptRepositoryInterface;

class ReceiptRepository implements ReceiptRepositoryInterface 
{     
    public function index()
    {
        $patients = Patient::all();
        $receipts = Receipt::all();
        return view('backend.reseipts.index' , compact('receipts' , 'patients'));
    }

    public function show($id)
    {
        $receipt = Receipt::findorfail($id);
        return view('backend.reseipts.show' , compact('receipt'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try
        {
            $data['date']       = date('Y-m-d');
            $data['patient_id'] = $request->patient_id;
            $data['debtor']     = $request->debtor;
            $data['description']= $request->description;
            $receipt = Receipt::create($data);

            $data1['date']       = date('Y-m-d');
            $data1['patient_id'] = $request->patient_id;
            $data1['receipt_id'] = $receipt->id;
            $data1['debtor']     = 0;
            $data1['creditor']   = $request->debtor;
            PatientAccount::create($data1);

            $data2['date']       = date('Y-m-d');
            $data2['receipt_id'] = $receipt->id;
            $data2['debtor']     = $request->debtor;
            $data2['creditor']   = 0;
            FundAccount::create($data2);

            DB::commit();

            session()->flash('add');
            return redirect()->route('Receipts.index');
            
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try
        {
            $receipt = Receipt::findorfail($request->id);

            $data['date']       = date('Y-m-d');
            $data['patient_id'] = $request->patient_id;
            $data['debtor']     = $request->debtor;
            $data['description']= $request->description;
            $receipt->update($data);

            $patient = PatientAccount::where('receipt_id',$request->id);
            $data1['date']       = date('Y-m-d');
            $data1['patient_id'] = $request->patient_id;
            $data1['receipt_id'] = $receipt->id;
            $data1['debtor']     = 0;
            $data1['creditor']   = $request->debtor;
            $patient->update($data1);

            $fund = FundAccount::where('receipt_id',$request->id);
            $data2['date']       = date('Y-m-d');
            $data2['receipt_id'] = $receipt->id;
            $data2['debtor']     = $request->debtor;
            $data2['creditor']   = 0;
            $fund->update($data2);

            DB::commit();

            session()->flash('edit');
            return redirect()->route('Receipts.index');
            
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try
        {
            Receipt::findorfail($request->id)->delete();
            
            session()->flash('delete');
            return redirect()->route('Receipts.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}