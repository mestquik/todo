<?php

namespace App\Http\Controllers;

use App\Models\todolar;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use function Symfony\Component\Translation\t;

class todoController extends Controller
{
    public function todoCreate(Request $request)

    {

//        $kullanici = todolar::where('user_id', Auth::id())->get();


        $todo = new todolar();
        $todo->priorty = $request->priorty;
        $todo->mission = $request->mission;
        $todo->user_id = Auth::id();
        $todo->comment = $request->comment;
        $todo->active = false;
        $request->validate([
                'priorty' => 'required',
                'mission' => 'required|max:35',
                'comment' => 'required'

            ]
            , [
                'mission.required' => 'Görevi tanımlamak zorunludur',
                'comment.required' => 'Açıklama Boş Geçilemez',
                'priorty.required' => 'Oncelik tanımlamak zorunludur',


            ]
        );

//
//
        $todo->save();
//

        return redirect()->route('create')->with('success', 'Görev başarıyla kaydedildi!');
    }


    public function Done()
    {


        $todos = Auth::id();
        $kullanici = User::with('todolarr')->where('id', $todos)->get();


        $truncated = Str::of('$kullanici')->limit(10);


        return view('done', compact('kullanici', 'truncated'));
    }

    public function goToCreate()
    {
        $roles = Role::all();


        return view('create',compact('roles'));


    }

    public function delete($id)
    {

        $user_id = Auth::id();
        $kullanici = todolar::where('user_id', $user_id)->get()->first();


        if ($kullanici) {
            $kullanici->where('id', $id)->delete();

        }

        return Redirect::back()->with('success', ' Başarıyla Silindi!');
    }


    public function content($id)
    {

        $kullanici = todolar::whereId($id)->first();
        $userid = User::where('id',Auth::id())->get()->first();

        if ($kullanici) {
            return view('content', compact('kullanici','userid'));

        }

//
    }

    public function okey($id)
    {
        $user_id = Auth::id();

        $kullanici = todolar::where('user_id', $user_id)->get()->first();


        if ($kullanici) {
            $kullanici->where('id', $id)->update([
                'active' => 1,

            ]);
        }
        return redirect()->route('done')->with('success', 'To-do Tamamlandı!');


    }

    public function continue($id)
    {
        $user_id = Auth::id();
        $kullanici = todolar::where('user_id', $user_id)->get()->first();


        if ($kullanici) {
            $kullanici->where('id', $id)->update([
                'active' => 0,
            ]);

        }

        return Redirect::back()->with('success', "Tamamlanmış olan To-do'n devam ediyor!");


    }

    public function UpdatePost(Request $request,$id)
    {

        $todo = todolar::whereId($id)->first();


        $todo->priorty = $request->priorty;
        $todo->mission = $request->mission;
        $todo->user_id = Auth::id();
        $todo->comment = $request->comment;
        $todo->active = false;
        $request->validate([
                'priorty' => 'required',
                'mission' => 'required|max:35',
                'comment' => 'required'

            ]
            , [
                'mission.required' => 'Görevi tanımlamak zorunludur',
                'comment.required' => 'Açıklama Boş Geçilemez',
                'priorty.required' => 'Oncelik tanımlamak zorunludur',


            ]
        );

//
//
        $todo->save();
//

        return redirect()->route('update',$id)->with('success', 'Görev başarıyla güncellendi!');
    }




    public function completed()
    {



        $kullanici = User::with('todolarr')->where('id',Auth::id())->get();


        $truncated = Str::of('$kullanici')->limit(10);


        return view('completed', compact('kullanici', 'truncated'));
    }







}
