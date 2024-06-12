<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    //
    public function index()
    {
        $data_room = DB::table('rooms')
            ->orderBy('id_room') // Order by id_prodi from smallest to largest
            ->get();


        return view('backend.room', compact('data_room'));
    }

    public function create()
    {
        return view('backend.room.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_room' => 'required',
            'no_room' => 'required',
        ]);

        Room::create($request->all());

        return redirect()->route('backend.room')
                         ->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
       // $prodi = Prodi::find($id);

        $room= Room::where('id_room',$id)->first();
        return view('backend.form.formEditRoom', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'no_room' => 'required',

        ]);
        $data=[
            'no_room'=> $request->no_room,
            
        ];

        //$prodi = Prodi::find($id);
       // $prodi->update($request->all());

        DB::table('rooms')->where('id_room',$id)->update($data);
        return redirect()->route('backend.room')
                         ->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        DB::table ('rooms')->where('id_room',$id)->delete();
        //Prodi::destroy($id);
        return redirect()->route('backend.room')
                         ->with('success', 'Room deleted successfully.');
    }
}
