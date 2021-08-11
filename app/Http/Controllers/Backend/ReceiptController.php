<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceiptRequest;
use App\Interfaces\ReceiptRepositoryInterface;

class ReceiptController extends Controller
{
    
    private $receipt;
  
    public function __construct(ReceiptRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }

    public function index()
    {
        return $this->receipt->index();
    }


    public function show($id)
    {
        return $this->receipt->show($id);
    }

        
    public function store(ReceiptRequest $request)
    {
        return $this->receipt->store($request);
    }

    
    public function update(ReceiptRequest $request)
    {
        return $this->receipt->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->receipt->destroy($request);
    }
}
