<?php

namespace App\Http\Controllers\Admin\Inbox;

use App\Models\Inbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class InboxController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:inboxes read');
        $this->middleware('permission:inboxes create')->only('create', 'store');
        $this->middleware('permission:inboxes update')->only('edit', 'update');
        $this->middleware('permission:inboxes delete')->only('destroy');

        view()->share('menuActive', 'inboxes');
        view()->share('subMenuActive', 'inboxes');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['models'] = Inbox::orderBy('is_viewed', 'asc')->paginate(10);
        return view('admin.inboxes.index', $data);
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
        //
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
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        $inbox->is_viewed = 1;
        $inbox->save();

        return view('admin.inboxes.edit', ['model' => $inbox]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inbox $inbox)
    {
        $request->validate([
            'respond' => 'required'
        ]);

        $inbox->respond = $request->respond;
        $inbox->save();
        // if ($inbox->save()) {
        //     Mail::send(
        //         [],
        //         [],
        //         function ($message) use ($request, $inbox) {
        //             $message->to($request->email);
        //             $message->from(env('MAIL_USERNAME'));
        //             $message->subject('Re: ' . $inbox->subject);

        //             // Masukkan konten HTML di sini
        //             $message->html($request->respond);

        //             // Tambah header untuk prioritas tinggi
        //             $message->getHeaders()->addTextHeader('X-Priority', '1');
        //             $message->getHeaders()->addTextHeader('Importance', 'High');
        //         }
        //     );
        // }
        return redirect()->route('admin.inboxes.index')->with(['status' => 'success', 'message' => 'Reply Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Inbox $inbox
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Inbox $inbox)
    {
        if ($inbox->delete()) {
            return redirect()->route('admin.inboxes.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
        return redirect()->route('admin.inboxes.index')->with(['status' => 'danger', 'message' => 'Delete Failed, Contact Developer']);
    }
    public function get_data()
    {
        $result = '';
        $data_inbox = Inbox::where('is_viewed', 0)->orderBy('is_viewed', 'asc')->get();
        if ($data_inbox) {
            foreach ($data_inbox as $inbox) {
                $result .= '<a href="/admin-panel/inboxes/' . $inbox->id . '/edit" class="dropdown-item dropdown-item-unread">';
                $result .= '<div class="dropdown-item-icon bg-primary text-white"> <i class="fas fa-inbox"></i></div>';
                $result .= '<div class="dropdown-item-desc">Form :' . $inbox->name . '<div class="time text-primary">' . Carbon::parse($inbox->created_at)->diffForHumans() . '</div></div></a>';
            }
        }
        return response()->json(['text' => $result, 'type' => 'success']);
    }

    public function mark_read()
    {
        $inbox_non_read = Inbox::where('is_viewed', 0)->get();
        foreach ($inbox_non_read as $key => $inbox) {
            $inbox->is_viewed = 1;
            $inbox->save();
        }
        return redirect()->back();
    }
}
