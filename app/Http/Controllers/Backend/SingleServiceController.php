<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingleServiceRequest;
use App\Interfaces\SingleServiceRepositoryInterface;

class SingleServiceController extends Controller
{
    
    private $SingleService;
  
    public function __construct(SingleServiceRepositoryInterface $SingleService)
    {
        $this->SingleService = $SingleService;
    }

    public function index()
    {
        return $this->SingleService->index();
    }

    
    public function store(SingleServiceRequest $request)
    {
        return $this->SingleService->store($request);
    }

    
    public function update(SingleServiceRequest $request)
    {
        return $this->SingleService->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->SingleService->destroy($request);
    }
}
