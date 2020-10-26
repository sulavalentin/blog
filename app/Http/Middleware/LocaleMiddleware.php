<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

/**
 * Class LocaleMiddleware.
 */
class LocaleMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (session()->has('locale') && in_array(session()->get('locale'), array_keys(config('locale.languages')))) {

            /*
             * Set the Laravel locale
             */
            app()->setLocale(session()->get('locale'));

            /*
             * setLocale for php. Enables ->formatLocalized() with localized values for dates
             */
            setlocale(LC_TIME, config('locale.languages')[session()->get('locale')][1]);

            /*
             * setLocale to use Carbon source locales. Enables diffForHumans() localized
             */
            Carbon::setLocale(config('locale.languages')[session()->get('locale')][0]);
        }

        return $next($request);
    }
}
