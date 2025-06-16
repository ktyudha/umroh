<?php

namespace App\Http\Middleware\Web;


use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use App\Models\SocialMedia;

class ShareVariable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $year = Carbon::now()->year;
        $user   = @User::all();
        $setting            = @Setting::whereIn('key', ['name', 'email', 'message', 'whatsapp', 'address', 'gmaps', 'logo', 'logo_preloader', 'icon', 'ogimage', 'pixel', 'analytics', 'file'])->get();
        $socialMedia        = @SocialMedia::orderBy('id', 'desc')->get();
        $about              = @Setting::key(Setting::ABOUT)->locale('id')->first()->json_value;

        view()->share(compact('user'));
        view()->share(compact('setting'));
        view()->share(compact('socialMedia'));
        view()->share(compact('about'));
        view()->share(compact('year'));

        return $next($request);
    }
}
