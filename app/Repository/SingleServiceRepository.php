<?php

namespace App\Repository;

use App\Models\Service;
use LaravelLocalization;
use App\Interfaces\SingleServiceRepositoryInterface;



class SingleServiceRepository implements SingleServiceRepositoryInterface 
{     
    public function index()
    {
        //$services = Service::translatedIn(LaravelLocalization::setLocale())->get();
        $services = Service::all();
        return view('backend.services.SingleService.index' , compact('services'));
    }

    public function store($request)
    {
        try
        {    
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $data['price'] = $request->price;
            Service::create($data);
            session()->flash('add');
            return redirect()->route('services.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try
        {    
            $service = Service::findOrfail($request->id);
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $data['price'] = $request->price;
            $status = ($request->status == 1 ? 1 : 0 );
            $data['status'] = $status;
            $service->update($data);
            session()->flash('edit');
            return redirect()->route('services.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $service = Service::findOrfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('services.index');
    }

}