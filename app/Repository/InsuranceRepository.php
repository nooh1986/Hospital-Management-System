<?php

namespace App\Repository;

use App\Interfaces\InsuranceRepositoryInterface;
use App\Models\Insurance;


class InsuranceRepository implements InsuranceRepositoryInterface
{

    public function index()
    {
        //$sections = Section::translatedIn(LaravelLocalization::setLocale())->get();
        $insurances = Insurance::all();
        return view('backend.Insurances.index' , compact('insurances'));
    }

    public function create()
    {
        return view('backend.Insurances.add');
    }

    public function store($request)
    {
        try
        {
            $data['name']                = $request->name;
            $data['insurance_code']      = $request->insurance_code;
            $data['discount_percentage'] = $request->discount_percentage;
            $data['company_rate']        = $request->company_rate;
            $data['notes']               = $request->notes;

            Insurance::create($data);

            session()->flash('add');
            return redirect()->route('Insurances.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $insurance = Insurance::findorfail($id);
        return view('backend.Insurances.edit' , compact('insurance'));
    }

    public function update($request)
    {
        try
        {
            $Insurance = Insurance::findorfail($request->id);

            $data['name']                = $request->name;
            $data['insurance_code']      = $request->insurance_code;
            $data['discount_percentage'] = $request->discount_percentage;
            $data['company_rate']        = $request->company_rate;
            $data['notes']               = $request->notes;
            
            $status                      = ($request->status == 1 ? 1 : 0 );
            $data['status']              = $status;

            $Insurance->update($data);

            session()->flash('edit');
            return redirect()->route('Insurances.index');
        }

        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Insurance::findorfail($request->id)->delete();

        session()->flash('delete');
        return redirect()->route('Insurances.index');
    }


}
