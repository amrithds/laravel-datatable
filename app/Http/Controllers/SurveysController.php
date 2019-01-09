<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Survey;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surveys.index');
    }

    /**
     *
     * @return Datatables
     */
    public function data() {

        $surveys = Survey::select(['id', 'name']);

        return Datatables::of($surveys)
            ->addColumn('action', function ($survey) {
                return '
                <form action="'.route('surveys.destroy',$survey->id).'" class="delete-survey-form"  method="POST">
                    <a href="'.route('surveys.edit',$survey->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xs btn-info btn-show-users" data-id="'.$survey->id.'"><i class="glyphicon glyphicon-edit"></i> Show Users</a>
                    '.csrf_field().'
                    <input type="hidden" name="_method" value="delete">
                    <button type="button" class="btn btn-danger delete-survey-button">Delete</button>
                </form>
                ';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }


    public function show()
    {

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('surveys.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {
        $data = $request->except('_token');
        $survey = new Survey();
        $survey->name = $data['name'];
        $survey->save();
        $survey->users()->attach($data['users']);

        return redirect(route('surveys.index'))->with('status', 'Row Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request)
    {
        $survey = Survey::findOrFail((int)$request->get('id'));
        return response()->json($survey->users()->get()->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        $users = User::all();
        return view('surveys.edit')
            ->with([
                'users'=>$users,
                'survey' => $survey
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyRequest $request, Survey $survey)
    {
        $data = $request->except('_token');
        $survey->name = $data['name'];
        $survey->save();
        $survey->users()->sync($data['users']);

        return redirect(route('surveys.index'))->with('status', 'Row Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect(route('surveys.index'))->with('status', 'Row Deleted Successfully!');
    }
}
