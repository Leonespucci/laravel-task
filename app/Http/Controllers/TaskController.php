<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $tasklist = [
        'first' => 'literasi',
        'second' => 'school',
        'thrid' => 'Learn Programming',
    ];
    public function index(Request $request)
    {
        if ($request->search) {
        $task = DB::table('tasks')->where('task', 'LIKE', "%$request->search%")->get();
            return $task;
    } else {
        $task = DB::table('tasks')->get();
            return $task;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user,
        ]);
        return "berhasil memasukan ke database";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        dd( $task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->tasklist[$id];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = DB::table('tasks')->where('id', $id)->update([
            'task' => 'leones',
            'user' => 'Eat'
        ]);
        ddd($task);
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = DB::table('tasks')->where('id', $id)->delete();
        return 'success';
    }
}
