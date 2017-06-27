<?php

namespace App\Http\Controllers;

use App\Audios;
use Illuminate\Http\Request;
use Mockery\Exception;

class AudioController extends Controller
{

    public function index()
    {
        return view('upload');
    }

    /**
     * @api {get} /audios Request All Audios
     * @apiName GetAudios
     * @apiGroup Audios
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     [
     *      {
     *           "id":6,
     *           "path":"\/Users\/leonardo\/Documents\/www\/test\/public\/audio\/tests.txt",
     *           "title":"12",
     *           "description":"123",
     *           "created_at":"2017-06-26 08:42:16",
     *           "updated_at":"2017-06-26 08:42:16"
     *      }
     *     ]
     *
     *
     */
    public function all() {
       return Audios::all();
    }

    public function allToWeb(){
        $data = Audios::all()->toArray();

        return view('audios')->with('data', $data);
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
     * @api {post} /audios/upload Upload Audio
     * @apiName PostAudio
     * @apiGroup Audios
     *
     * @apiParam {File} file File mp3.
     * @apiParam {String} title Title of audio.
     * @apiParam {String} description Description of audio.
     *
     * @apiSuccess {Boolean} success true
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'audio' => 'required|mimes:txt'
        ]);

        if($request->hasFile('audio')) {
            // The file
            $music_file = $request->file('audio');

            $file_extension = $music_file->getClientOriginalExtension();

            $file_name = $music_file->getClientOriginalName();

            $location = public_path('audio');

            $file_to_slug = explode($file_extension, $file_name);

            $music_file->move($location,date('d_m_Y') . "_" . str_slug($file_to_slug[0], '_') . '.' . $file_extension);

            $audio = new Audios();

            $audio->file = date('d_m_Y') . "_" . str_slug($file_to_slug[0], '_') . '.' . $file_extension;

            $audio->title = $request['title'];

            $audio->description = $request['description'];
            try {
                $saved = $audio->save();
                return view('success');
            } catch (\Exception $e) {
                return $e->getMessage();
            }

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
        $audio = new Audios();

        try{
            return $audio->findOrFail($id);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
