<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreGroupesRequest;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $formsList = Forms::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        return view('groupes.list', ['formsList' => $formsList]);
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
        return view('groupes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*StoreGroupesRequest*/Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validated();
        $forms = Forms::findOrFail($request->input('form_id'));
        $groupes = Groupe::create($request->input());
        $groupes->form()->associate($forms);
        $groupes->save();
        $groupes->users()->associate(Auth::id());
        $groupes->save();

        // return redirect()->route('forms.show', ['form' => $forms]);
        return redirect()->route('groupes.index')->with('message', 'Votre groupe a été créé avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('groupes.consult', ['groupe' => Groupe::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // if (!Gate::allows('groupe-access', $groupe = Groupe::findOrFail($id))) {
        //     abort('403');
        // }
        return view('groupes.edit', ['groupes' => Groupe::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupesRequest $request, Groupe $groupe)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validated();
        $groupe->update($request->input());
        // return redirect()->route('groupes.show', ['groupe' => $groupe]);
        return redirect()->route('groupes.index')->with('message', 'Votre groupe à été correctement mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupe = Groupe::findOrFail($id);
        $groupe->delete();
        return redirect()->route('groupes.index');
    }
}
