<?php

namespace App\Repository;

use App\Models\Image;
use App\Models\Doctor;
use App\Models\Section;
use LaravelLocalization;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface 
{     
    use UploadTrait;
    
    public function index()
    {
        $doctors = Doctor::all();
        return view('backend.doctors.index' , compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('backend.doctors.add' , compact('sections'));
    }
          
    public function store($request)
    {
        DB::beginTransaction();

        try 
        {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['phone'] = $request->phone;
            $data['section_id'] = $request->section_id;
            $data['appointments'] = implode("," , $request->appointments);
            $doctor = Doctor::create($data);

            $this->verifyAndStoreImage($request, 'photo' , 'Doctors' , 'public' , $doctor->id , 'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrfail($id);
        $sections = Section::all();
        return view('backend.doctors.edit' , compact('doctor' , 'sections'));
    }

    public function update($request)
    {
        
        DB::beginTransaction();

        $doctor = Doctor::findOrfail($request->id);

        try 
        {
            
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['phone'] = $request->phone;
            $data['section_id'] = $request->section_id;
            $data['appointments'] = implode("," , $request->appointments);
            $doctor->update($data);

            // update photo
            if ($request->has('photo'))
            {
                // Delete old photo
                if ($doctor->image)
                {
                    // $old_img = $doctor->image->filename;
                    $this->Delete_attachment('upload_image' , 'Doctors/'. $doctor->image->filename , $request->id);
                    // $this->Delete_attachment('doctors/'.$old_img,);
                }
                //Upload img
                $this->verifyAndStoreImage($request,'photo','doctors','upload_image',$request->id,'App\Models\Doctor');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('doctors.index');
        }

        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        if($request->filename)
        {
            $this->Delete_attachment('upload_image','Doctors/'.$request->filename,$request->id);
        }
        
        Doctor::findOrfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('doctors.index');
    }

    public function update_password($request)
    {
        $doctor = Doctor::findOrfail($request->id);
        $data['password'] = $request->password;
        $doctor->update($data);
        session()->flash('edit');
        return redirect()->route('doctors.index');
    }

    public function update_status($request)
    {
        $doctor = Doctor::findOrfail($request->id);
        $status = ($request->status == 1 ? 1 : 0 );
        $data['status'] = $status;
        $doctor->update($data);
        session()->flash('edit');
        return redirect()->route('doctors.index');
    }
}