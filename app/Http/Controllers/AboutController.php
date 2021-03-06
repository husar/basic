<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout(){
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request){

        HomeAbout::insert([
            'title'     => $request->title,
            'short_des' => $request->short_des,
            'long_des'  => $request->long_des,
            'created_at'=> Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About inserted successfully');
    }

    public function EditAbout($id){
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit',compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id){
        $update = HomeAbout::find($id)->update([
            'title'     => $request->title,
            'short_des' => $request->short_des,
            'long_des'  => $request->long_des
        ]);

        return Redirect()->route('home.about')->with('success', 'About updated successfully');
    }

    public function DeleteAbout($id){
        $delete = HomeAbout::find($id)->Delete();
        return Redirect()->route('home.about')->with('danger', 'About deleted successfully');
    }

    public function Portfolio(){
        $images = Multipic::all();

        return view('pages.portfolio', compact('images'));
    }

}
