<?php

namespace App\Http\Middleware;

use App\Models\Utilities\Module;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [ 
                'alert' => $request->session()->get('alert'),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }

    public function withPermission ($module)
    {
        
        $data['id']            = $module->id;
        $data['label']         = $module->description;
        $data['icon']          = $module->icon;
        $data['code']          = $module->code;
        $data['parent']        = $module->parentModule->description ?? '-';
        $data['permalink']     = $module->permalink;
        $data['route' ]        = $module->permalink;
        $data['root']          = $module->root;

        return $data;
    }
}
