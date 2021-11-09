<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $items = Contact::all();
        return view('index', ['items' => $items]);
    }
    public function show(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $request->flash();
        return view('show');
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Contact::create($form);
        return view('complete');
    }
    public function search(Request $request)
    {
        $fullname = $request->fullname;
        $gender = $request->gender;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $email = $request->email;
        $items = Contact::query();

        if (!empty($fullname || $gender || $email)) {
            $items = Contact::where('fullname', 'LIKE', "%{$fullname}%")->where('gender', 'LIKE', "%{$gender}%")->where('email', 'LIKE', "%{$email}%");
        }
        if (!empty($startDate)) {
            $items = $items->where('created_at', '>=', $startDate);
        }
        if (!empty($endDate)) {
            $items = $items->where('created_at', '<=', $endDate);
        }
        $items = $items->Paginate(5, ['*'], 'page');
        $param = [
            'fullname' => $fullname,
            'gender' => $gender,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'email' => $email,
            'items' => $items,
        ];

        return view('/search', $param);
    }
     public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/search');
    }
}
