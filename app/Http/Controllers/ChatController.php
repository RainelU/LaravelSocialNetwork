<?php

namespace Laravel\Http\Controllers;

use Laravel\Chat;
use Laravel\User;
use Laravel\Notifications\RepliedNotification;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        return view('chat.index')->withFriends($friends);
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
        if ($request->chat != "") {
            Chat::create([
                'id' => NULL,
                'user_id' => $request->user_id,
                'friend_id' => $request->friend_id,
                'user_name' => $request->user_name,
                'friend_name' => $request->friend_name,
                'chat' => $request->chat,
                'updated_at' => NULL,
                'created_at' => NULL,
            ]);
        }

        $friends = User::find($request->friend_id);
        $friends->notifyNow(new RepliedNotification($request->user_name, $request->user_id));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laravel\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friends =  User::find($id);
        $chats = Chat::where(function($query) use ($id){
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id){
            $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);
        })->get();
        return view('chat.show', compact('chats'))->withFriends($friends);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChat($id){
        $chats = Chat::where(function($query) use ($id){
            $query->where('user_id', '=', Auth::user()->id)->where('friend_id', '=', $id);
        })->orWhere(function ($query) use ($id){
            $query->where('user_id', '=', $id)->where('friend_id', '=', Auth::user()->id);
        })->get();

        return $chats;
    }
}