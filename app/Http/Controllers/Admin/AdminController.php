<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // if ($request->ajax()) {
        //     $admins = Admin::select(['id', 'name', 'email'])->get();
        //     return datatables()->of($admins)->toJson();
        // }
    
        $admins = Admin::all()->except('password');
        return view('AdminPanel.home', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPanel/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $admin = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048',
        ]);

        // Handle image upload

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('admins', 'public'); // Store the image in the public storage
        } else {
            $imagePath = null; // No image provided
        }

        // $admin['image'] = null ;
        // if ($request->has('image')) {
        //     $admin['image'] = Storage::putFile('admins', $admin['image']);
        // }

        // Create a new admin
        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'image' => $imagePath,
        ]);

        return response()->json(['msg' => 'Admin created successfully.']);

        // return redirect()->route('admins.index')
        //     ->with('success', 'Admin created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        return view('AdminPanel/show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('AdminPanel/edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        // Validate and update the admin
        $data = $request->validate([
            'name' => 'string|nullable',
            'email' => 'nullable|string|email',
            'password' => 'nullable|string|min:6',
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
        ]);
        // update the image


        if ($request->hasFile('image')) {
            if ($admin->image != null) {
                Storage::delete($admin->image);
            }
            $imagePath = $request->file('image')->store('admins', 'public'); // Store the image in the public storage
        } else {
            $imagePath = null; // No image provided
        }
        //  update admin
        $admin->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'image' => $imagePath,
        ]);

        return response()->json(['msg' => 'Admin Updated successfully.']);

        // return redirect()->back()
        //     ->with('success', 'Admin Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->image != null) {
            Storage::delete($admin->image);
        }

        $admin->delete();
        return response()->json(['msg' => 'Admin deleted successfully']);

        // return redirect()->route('admins.index')
        //     ->with('success', 'Admin deleted successfully.');
    }
}



