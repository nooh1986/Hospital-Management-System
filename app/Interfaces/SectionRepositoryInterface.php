<?php

namespace App\Interfaces;


interface SectionRepositoryInterface
{
   public function index();

   // public function show($id);

   public function store($request);

   public function update($request);

   public function destroy($request);
   
}