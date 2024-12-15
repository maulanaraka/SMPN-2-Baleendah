<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        Ekstrakurikuler::create($request->all());
        return redirect()->route('ekstrakurikuler.index');
    }

    public function edit($ekstrakurikulerID)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($ekstrakurikulerID);
        return view('ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, $ekstrakurikulerID)
    {
        $ekstrakurikuler = Ekstrakurikuler::find($ekstrakurikulerID);
        $ekstrakurikuler->update($request->all());
        return redirect()->route('ekstrakurikuler.index');
    }

    public function destroy($ekstrakurikulerID)
    {
        Ekstrakurikuler::destroy($ekstrakurikulerID);
        return redirect()->route('ekstrakurikuler.index');
    }
}

