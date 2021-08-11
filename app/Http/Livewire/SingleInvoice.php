<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Section;
use App\Models\Service;
use Livewire\Component;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use App\Models\Single_Invoice;
use Illuminate\Support\Facades\DB;


class SingleInvoice extends Component
{
    
    public $show_table = true;
    public $InvoiceSaved = false;
    public $InvoiceUpdated = false;
    public $EditMode = false;
    public $patient_id , $doctor_id , $section_id , $type , $service_id , $price , $single_invoice_id;
    public $discount_value = 0;
    public $tax_rate = 17;

    public function render()
    {
        return view('livewire.SingleInvoice.single-invoice' , [
            'single_invoices'=> Single_Invoice::all(),
            'patients'       => Patient::all(),
            'doctors'        => Doctor::all(),
            'services'       => Service::all(),
            'sections'       => Section::all(),
            'total'          => $total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value'      => $total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0)) / 100,
        ]);
    }

    public function show_form()
    {
        $this->show_table = false;
    }

    // public function get_section()
    // {
    //     $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
    //     $this->section_id = $doctor_id->section->name;
    // }

    public function get_price()
    {
        $this->price = Service::where('id' , $this->service_id)->first()->price;
    }

    public function edit($id)
    {
        $this->show_table        = false;
        $this->EditMode          = true;
        $this->InvoiceSaved      = false;
        $this->InvoiceUpdated    = false;
        $single_invoice          = Single_Invoice::findorfail($id);
        $this->patient_id        = $single_invoice->patient_id;
        $this->doctor_id         = $single_invoice->doctor_id;
        $this->section_id        = $single_invoice->section_id;
        $this->type              = $single_invoice->type;
        $this->service_id        = $single_invoice->service_id;
        $this->single_invoice_id = $single_invoice->id;
        $this->price             = $single_invoice->price;
        $this->discount_value    = $single_invoice->discount; 
    }


    public function store()
    {
        if($this->type == 1)
        {
        
            DB::beginTransaction();
            try
            {
                
                if($this->EditMode)
                {
                    $single_invoice       = Single_Invoice::findorfail($this->single_invoice_id);
                    $data['patient_id']   = $this->patient_id;
                    $data['invoice_date'] = date('Y-m-d');
                    $data['doctor_id']    = $this->doctor_id;
                    $data['section_id']   = $this->section_id;
                    $data['service_id']   = $this->service_id;
                    $data['price']        = $this->price;
                    $data['discount']     = $this->discount_value;
                    $data['tax_rate']     = $this->tax_rate;
                    $tax_value            = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);   
                    $data['tax_value']    = $tax_value;
                    $data['Total']        = $this->price - $this->discount_value + $tax_value;
                    $data['type']         = $this->type;
                    $single_invoice->update($data);

                    $FundAccount = FundAccount::where('single_invoice_id' , $this->single_invoice_id);
                    $data1['date']               = $single_invoice->invoice_date;
                    $data1['single_invoice_id']  = $single_invoice->id;
                    $data1['debtor']             = $single_invoice->Total;
                    $data1['creditor']           = 0;
                    $FundAccount->update($data1);
                    
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                }

                else
                {
                    $data['patient_id']   = $this->patient_id;
                    $data['invoice_date'] = date('Y-m-d');
                    $data['doctor_id']    = $this->doctor_id;
                    $data['section_id']   = $this->section_id;
                    $data['service_id']   = $this->service_id;
                    $data['price']        = $this->price;
                    $data['discount']     = $this->discount_value;
                    $data['tax_rate']     = $this->tax_rate;
                    $tax_value            = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);   
                    $data['tax_value']    = $tax_value;
                    $data['Total']        = $this->price - $this->discount_value + $tax_value;
                    $data['type']         = $this->type;
                    $single_invoice       = Single_Invoice::create($data);

                    $data1['date']               = $single_invoice->invoice_date;
                    $data1['single_invoice_id']  = $single_invoice->id;
                    $data1['debtor']             = $single_invoice->Total;
                    $data1['creditor']           = 0;
                    FundAccount::create($data1);
                    
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }
            DB::commit();
            }

            catch (\Exception $e)
            {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }   
        
        else
        {
            DB::beginTransaction();
            try
            {
                if($this->EditMode)
                {
                    $single_invoice       = Single_Invoice::findorfail($this->single_invoice_id);
                    $data['patient_id']   = $this->patient_id;
                    $data['invoice_date'] = date('Y-m-d');
                    $data['doctor_id']    = $this->doctor_id;
                    $data['section_id']   = $this->section_id;
                    $data['service_id']   = $this->service_id;
                    $data['price']        = $this->price;
                    $data['discount']     = $this->discount_value;
                    $data['tax_rate']     = $this->tax_rate;
                    $tax_value            = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);   
                    $data['tax_value']    = $tax_value;
                    $data['Total']        = $this->price - $this->discount_value + $tax_value;
                    $data['type']         = $this->type;
                    $single_invoice->update($data);

                    $PatientAccount = PatientAccount::where('single_invoice_id' , $this->single_invoice_id);
                    $data1['date']               = $single_invoice->invoice_date;
                    $data1['single_invoice_id']  = $single_invoice->id;
                    $data1['debtor']             = 0;
                    $data1['creditor']           = $single_invoice->Total;
                    $PatientAccount->update($data1);
                    
                    $this->InvoiceUpdated = true;
                    $this->show_table = true;
                }

                else
                {
                    $data['patient_id']   = $this->patient_id;
                    $data['invoice_date'] = date('Y-m-d');
                    $data['doctor_id']    = $this->doctor_id;
                    $data['section_id']   = $this->section_id;
                    $data['service_id']   = $this->service_id;
                    $data['price']        = $this->price;
                    $data['discount']     = $this->discount_value;
                    $data['tax_rate']     = $this->tax_rate;
                    $tax_value            = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);   
                    $data['tax_value']    = $tax_value;
                    $data['Total']        = $this->price - $this->discount_value + $tax_value;
                    $data['type']         = $this->type;
                    $single_invoice       = Single_Invoice::create($data);

                    $data1['date']               = $single_invoice->invoice_date;
                    $data1['single_invoice_id']  = $single_invoice->id;
                    $data1['patient_id']         = $single_invoice->patient_id;
                    $data1['debtor']             = 0;
                    $data1['creditor']           = $single_invoice->Total;
                    PatientAccount::create($data1);

                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }

            DB::commit();
            }

            catch (\Exception $e)
            {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
        
    }

    public function delete($id)
    {
        $this->single_invoice_id = $id; 
    }

    public function destroy()
    {
        Single_Invoice::findorfail($this->single_invoice_id)->delete();

        $this->show_table = true;
    }
}
