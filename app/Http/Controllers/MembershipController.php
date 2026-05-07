<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Membership;
use App\Models\UserMembership;

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

    /* ✅ JOIN MEMBERSHIP */
    public function join($id)
    {
        UserMembership::firstOrCreate([
            'user_id' => Auth::id(),
            'membership_id' => $id
    ], [
        'status' => 'active'
    ]);

        return back()->with('success', 'Membership activated!');
    }
}