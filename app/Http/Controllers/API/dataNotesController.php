<?php

namespace App\Http\Controllers\API;

use App\Helpers\apiformatter;
use App\Http\Controllers\Controller;
use App\dataNote;
use Illuminate\Http\Request;
use Exception;

class dataNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dataNote::all();

        if($data){
            return apiformatter::createApi(200,'Success', $data);
        } else {
            apiformatter::createApi(400, ' Failed');
        }
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
        try {
            $request->validate([
                'email' => 'required',
                'nama'=>'required',
                'judul'=>'required',
                'deskripsi'=>'required',
            ]);

            $user = dataNote::create([
                'email'=>$request->email,
                'nama'=>$request->nama,
                'judul'=>$request->judul,
                'deskripsi'=>$request->deskripsi,
            ]);

            $data = dataNote::where('id','=',$user->id)->get();

            if($data){
                return apiformatter::createApi(200,'Success', $data);
            } else {
                apiformatter::createApi(400, ' Failed');
            }

        } catch (Exception $err) {
            return apiformatter::createApi(400, ' Failed');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'email' => 'required',
                'nama'=>'required',
                'judul'=>'required',
                'deskripsi'=>'required',
            ]);

            $user = dataNote::findorFail($id);

            $user -> update([
                'email'=>$request->email,
                'nama'=>$request->nama,
                'judul'=>$request->judul,
                'deskripsi'=>$request->deskripsi,
            ]);

            $data = dataNote::where('id','=',$user->id)->get();

            if($data){
                return apiformatter::createApi(200,'Success', $data);
            } else {
                apiformatter::createApi(400, ' Failed');
            }

        } catch (Exception $err) {
            return apiformatter::createApi(400, ' Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = dataNote::findorFail($id);
            $data = $user->delete();

            if($data){
                return apiformatter::createApi(200,'Success Delete Data');
            } else {
                apiformatter::createApi(400, ' Failed');
            }
        } catch (Exception $Err) {
            return apiformatter::createApi(400, ' Failed');
        }
    }
}
