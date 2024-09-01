<?php

namespace App\Http\Controllers;

use App\Models\summernote;
use Illuminate\Http\Request;

class SummernoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function summernote()
    {
        return view('Admin.summernote');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(summernote $summernote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(summernote $summernote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, summernote $summernote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(summernote $summernote)
    {
        //
    }
}
