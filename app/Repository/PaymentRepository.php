<?php

namespace App\Repository;

use App\Models\Patient;
use App\Models\Payment;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\DB;
use App\Interfaces\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface 
{     
    public function index()
    {
        $patients = Patient::all();
        $payments = Payment::all();
        return view('backend.payments.index' , compact('payments' , 'patients'));
    }

    public function show($id)
    {
        $payment = Payment::findorfail($id);
        return view('backend.payments.show' , compact('payment'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try
        {
            $data['date']       = date('Y-m-d');
            $data['patient_id'] = $request->patient_id;
            $data['amount']     = $request->debtor;
            $data['description']= $request->description;
            $payment = Payment::create($data);

            $data1['date']       = date('Y-m-d');
            $data1['patient_id'] = $request->patient_id;
            $data1['payment_id'] = $payment->id;
            $data1['debtor']     = $request->debtor;
            $data1['creditor']   = 0;
            PatientAccount::create($data1);

            $data2['date']       = date('Y-m-d');
            $data2['payment_id'] = $payment->id;
            $data2['debtor']     = 0;
            $data2['creditor']   = $request->debtor;
            FundAccount::create($data2);

            DB::commit();

            session()->flash('add');
            return redirect()->route('Payments.index');
            
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
            $payment = Payment::findorfail($request->id);

            $data['date']       = date('Y-m-d');
            $data['patient_id'] = $request->patient_id;
            $data['amount']     = $request->debtor;
            $data['description']= $request->description;
            $payment->update($data);

            $patient = PatientAccount::where('payment_id',$request->id);
            $data1['date']       = date('Y-m-d');
            $data1['patient_id'] = $request->patient_id;
            $data1['payment_id'] = $payment->id;
            $data1['debtor']     = $request->debtor;
            $data1['creditor']   = 0;
            $patient->update($data1);

            $fund = FundAccount::where('payment_id',$request->id);
            $data2['date']       = date('Y-m-d');
            $data2['payment_id'] = $payment->id;
            $data2['debtor']     = 0;
            $data2['creditor']   = $request->debtor;
            $fund->update($data2);

            DB::commit();

            session()->flash('edit');
            return redirect()->route('Payments.index');
            
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
            Payment::findorfail($request->id)->delete();
            
            session()->flash('delete');
            return redirect()->route('Payments.index');
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}