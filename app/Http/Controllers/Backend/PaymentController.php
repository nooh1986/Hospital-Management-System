<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Interfaces\PaymentRepositoryInterface;

class PaymentController extends Controller
{
    
    private $payment;
  
    public function __construct(PaymentRepositoryInterface $payment)
    {
        $this->payment = $payment;
    }


    public function index()
    {
        return $this->payment->index();
    }


    public function show($id)
    {
        return $this->payment->show($id);
    }
    
    public function store(PaymentRequest $request)
    {
        return $this->payment->store($request);
    }

    
    public function update(PaymentRequest $request)
    {
        return $this->payment->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
