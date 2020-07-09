<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 以下2行追加
use Validator;
use App\Tweet;
use Auth;


class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('tweets');
          $tweets = Tweet::orderBy('created_at', 'desc')->get();
        //   ddd($tweets);
          return view('tweets', [
            'tweets' => $tweets
  ]);
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
      // バリデーション
      $validator = Validator::make($request->all(), [
        'tweet' => 'required|max:255',
      ]);
      // バリデーション:エラー
      if ($validator->fails()) {
        return redirect()
          ->route('tweets.index')
          ->withInput()
          ->withErrors($validator);
      }
      // Eloquentモデル
      $tweet = new Tweet;
      $tweet->real_user = Auth::user()->name;
      $tweet->fake_user = $request->fake_user;
      $tweet->tweet = $request->tweet;
      // $file_name = $file->$request->id;
      
      if($request->hasfile('file')){
      $tweet->image = $request->file('file')->store('');
      $request->file('file')->storeAs('public/tweets',$tweet->image);//保存場所はstorage>app>public>'tweets'ディレクトリの生成
    }
    else{
    $tweet->image ="";
    }
      $tweet->save();
      // ルーティング「tests.index」にリクエスト送信（一覧ページに移動）
      return redirect()->route('tweets.index');
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
      $tweet = Tweet::find($id);
      $tweet->delete();
      return redirect()->route('tweets.index');    }
}