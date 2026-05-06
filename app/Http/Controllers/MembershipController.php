<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.index', compact('memberships'));
    }

    public function create()
    {
        return view('memberships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Membership::create($request->all());

        return redirect('/memberships')->with('success', 'Membership added');
    }

    public function edit($id)
    {
        $membership = Membership::findOrFail($id);
        return view('memberships.edit', compact('membership'));
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::findOrFail($id);

        $membership->update($request->all());

        return redirect('/memberships')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect('/memberships')->with('success', 'Deleted successfully');
    }
}