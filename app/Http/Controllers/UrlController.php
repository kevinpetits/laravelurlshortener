<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{

    public function index()
    {
        $urls = Url::where('user_id', auth()->user()->id)->get();

        return view('urls.index', compact('urls'));
    }

    public function show(Request $request, $code)
    {
        // $url = DB::table('urls')->where('code', $code)->first();
        $url = Url::where('code', $code)->first();
        if ($url && $url->active) {
            if(Carbon::now() > $url->expiration){
                abort(404);
            }else {
                $url->views++;
                $url->save();
                return redirect()->away($url->url);
            }
        } else {
            abort(404);
        }
    }

    public function store(Request $request, Url $url)
    {
        $code = $url->short_url($request->long_url);

        return response()->json([
            'short_url' => url('/').'/'.$code
        ]);
    }

    public function update(Request $request)
    {
        // return $request;
        $url = Url::where('code', $request->code)->first();
        $url->expiration = $request->expiration;
        $url->active = $request->active;
        $url->save();
        return response()->json([
            'msg' => "Url updated successfully"
        ]);
    }
}
