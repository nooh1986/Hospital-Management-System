<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Interfaces\SectionRepositoryInterface;

class SectionController extends Controller
{
    
    private $section;
  
    public function __construct(SectionRepositoryInterface $section)
    {
        $this->section = $section;
    }
        
    
    public function index()
    {
        return $this->section->index();
    }

    // public function show($id)
    // {
    //     return $this->section->show($id);
    // }

    public function store(SectionRequest $request)
    {
        return $this->section->store($request);
    }

    
    public function update(SectionRequest $request)
    {
        return $this->section->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->section->destroy($request);
    }
    
}
