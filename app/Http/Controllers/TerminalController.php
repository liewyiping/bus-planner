<?php

namespace busplannersystem\Http\Controllers;

use busplannersystem\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $terminals=Terminal::all();
        return view('admin.admin-insert-terminal-info')->with('terminals',$terminals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'terminal_station' => 'required|string|max:255',            
            'terminal_area' => 'required|string|max:255',  
            'terminal_city' => 'required|string|max:255',  
            'terminal_states' => 'required|string|max:255',  
           

        ]);

        //Create a new terminal
            $terminals = new Terminal();
            $terminals->create($request);
            return redirect('admin/insert-new-terminal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \busplannersystem\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function show(Terminal $terminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \busplannersystem\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Terminal $terminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \busplannersystem\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terminal $terminal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \busplannersystem\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminal $terminal)
    {
        //
    }
}
