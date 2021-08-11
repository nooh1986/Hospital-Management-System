<?php

namespace App\Repository;

use App\Models\Doctor;
use App\Models\Section;
use LaravelLocalization;
use App\Interfaces\SectionRepositoryInterface;


class SectionRepository implements SectionRepositoryInterface 
{     
    public function index()
    {
        //$sections = Section::translatedIn(LaravelLocalization::setLocale())->get();
        $sections = Section::all();
        return view('backend.sections.index' , compact('sections'));
    }

    public function store($request)
    {
        try 
        {
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            Section::create($data);
            session()->flash('add');
            return redirect()->route('sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }    
    }

    public function update($request)
    {
        try 
        {
            $section = Section::find($request->id);
            $data['name'] = $request->name;
            $data['description'] = $request->description;
            $status = ($request->status == 1 ? 1 : 0 );
            $data['status'] = $status;
            $section->update($data);
            session()->flash('edit');
            return redirect()->route('sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }     
    }

    public function destroy($request)
    {
        $section = Section::find($request->id);
        $section->delete();
        session()->flash('delete');
        return redirect()->route('sections.index');
    }

    // public function show($id)
    // {
    //     $doctors = Doctor::where('section_id' , $id)->get();
    //     return view('backend.sections.show' , compact('doctors'));
    // }
}