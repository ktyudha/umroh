<?php

namespace App\Http\Controllers\Admin\SocialMedia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:socials read');
        $this->middleware('permission:socials create')->only('create', 'store');
        $this->middleware('permission:socials update')->only('edit', 'update');
        $this->middleware('permission:socials delete')->only('destroy');

        view()->share('menuActive', 'settings');
        view()->share('subMenuActive', 'social-media');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = SocialMedia::orderBy('id', 'desc')->paginate(10);
        return view('admin.social.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:250',
            'type'  => 'required|unique:social_media,type',
            'url'   => 'required'
        ]);

        $social = new SocialMedia($request->all());
        $social->save();

        return redirect()
            ->route('admin.social.index')
            ->with(['status' => 'success', 'message' => 'Save Successfully']);
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
     * @param  SocialMedia  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social)
    {
        $data['model'] = $social;
        return view('admin.social.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SocialMedia  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $social)
    {
        $request->validate([
            'title' => 'required|max:250',
            'type'  => 'required|unique:social_media,type,' . $social->id,
            'url'   => 'required'
        ]);

        $social->update($request->all());

        return redirect()->route('admin.social.index')->with(['status' => 'success', 'message' => 'Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SocialMedia $social
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(SocialMedia $social)
    {

        if ($social->delete()) {
            return redirect()->route('admin.social.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }

        return redirect()->route('admin.social.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
}
