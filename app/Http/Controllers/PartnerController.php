<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Requests\PartnersRequest;


class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners', compact('partners'));
    }
    public function store(PartnersRequest $request)
    {
      
        $data= $request->all();
        $data['image'] = $request->file('image')->store('images','public');
        $newpartner = Partner::create($data);
        return redirect(route('showPartners'));
    }
}
