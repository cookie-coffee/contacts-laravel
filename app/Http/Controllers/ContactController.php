<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ContactController extends Controller
{   
    // view of create contact
    public function create() 
    {
        return view('contacts.create');
    }
    //  view of edit contact
    public function edit(User $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    // get all contact list
    public function index()
    {
        $data = User::all();
        return view('contacts.index', compact('data'));
    }
    // save new contact
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'mobile' => [
                'required',
                'regex:/(^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$)/',
                'max:50'
            ],
            'email' => 'nullable|email|max:100',
            'postcode' => [
                'nullable',
                'regex:/(^[0-9]{4}$)/'
            ]
        ]);
        
        $contact = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'postcode' => $request->postcode,
        ]);

        session()->flash('success', 'Add Contact Success.');
        return redirect()->route('contacts.index', [$contact]);
    }
    // update contact
    public function update(User $contact, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'mobile' => [
                'required',
                'regex:/(^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$)/',
                'max:50'
            ],
            'email' => 'nullable|email|max:100',
            'postcode' => [
                'nullable',
                'regex:/(^[0-9]{4}$)/'
            ]
        ]);

        $contact->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'postcode' => $request->postcode,
        ]);

        session()->flash('success', 'Edit Contact Success');
        $contacts = User::paginate(10);
        return redirect()->route('contacts.index', $contacts);
    }
    // delete contact by id
    public function destroy($id)
    {   $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'Delete User Success');
        return back();
    }
    // search, filter and sorting contacts
    function fetch_data(User $contact, Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');

            $data = $contact
                ->where('first_name', 'like', '%'.$query.'%')
                ->orWhere('last_name', 'like', '%'.$query.'%')
                ->orWhere('mobile', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('postcode', 'like', '%'.$query.'%')
                ->orderBy($sort_by, $sort_type)
                ->get();
            
            $total_row = $data->count();
            if($total_row > 0)
            {
                return view('contacts.contacts_data', compact('data'))->render();
            } else {
                return view('contacts.contacts_data', compact([]));
            }
        }
    }

}
