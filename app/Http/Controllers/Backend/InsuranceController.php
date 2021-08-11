<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;
use App\Interfaces\InsuranceRepositoryInterface;

class InsuranceController extends Controller
{

    private $Insurance;

    public function __construct(InsuranceRepositoryInterface $Insurance)
    {
        $this->Insurance = $Insurance;
    }


    public function index()
    {
        return $this->Insurance->index();
    }


    public function create()
    {
        return $this->Insurance->create();
    }


    public function store(InsuranceRequest $request)
    {
        return $this->Insurance->store($request);
    }


    public function edit($id)
    {
        return $this->Insurance->edit($id);
    }


    public function update(InsuranceRequest $request)
    {
        return $this->Insurance->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Insurance->destroy($request);
    }
}
