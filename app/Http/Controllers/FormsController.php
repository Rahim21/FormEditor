<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFormsRequest;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            $formsList = Forms::orderBy('date', 'desc')->take(9)->get();

            $rowForms = DB::table("forms")->where('deleted_at', NULL)->get();
            $countForms = count($rowForms);
            return view('forms.list', ['formsList' => $formsList, 'countForms' => $countForms]);
        }
        /* ----- Récupère x formulaire ordre du plus récent ----- */
        $formsList = Forms::orderBy('date', 'desc')->take(8)->get();

        /* ----- Visualiser les formulaires qui sont soft-delete ----- */
        //$formsList = Forms::withTrashed()->get();

        /* ----- Le nombre max de formulaire ----- */
        $rowForms = DB::table("forms")->where('deleted_at', NULL)->get();
        $countForms = count($rowForms);

        /* ----- Le nombre de formulaire de l'utilisateur connecté ----- */
        $userForms = DB::table("forms")->where('deleted_at', NULL)->where('user_id', Auth::id())->get();
        $countUserForms = count($userForms);
        return view('forms.list', ['formsList' => $formsList, 'countForms' => $countForms, 'countUserForms' => $countUserForms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormsRequest $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validated();
        $forms = Forms::make($request->input());
        $forms->user()->associate(Auth::id());
        $forms->save();

        return redirect()->route('forms.show', ['form' => $forms]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('forms.consult', ['forms' => Forms::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('forms.edit', ['forms' => Forms::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormsRequest $request, Forms $form)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validated();
        $form->update($request->input());
        return redirect()->route('forms.show', ['form' => $form]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $forms = Forms::findOrFail($id);
        $forms->delete();
        return redirect()->route('forms.index');
    }
}