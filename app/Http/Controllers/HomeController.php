<?php

namespace App\Http\Controllers;

use App\Http\Ussd\States\Welcome;
use Illuminate\Http\Request;
use Sparors\Ussd\Facades\Ussd;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ussd = Ussd::machine()
            ->setSessionId($request->sessionID)
            ->setFromRequest([
                'phone_number' => $request->phone_number,
                'input' => $request -> input,
                'network',
            ])
            ->setInitialState(Welcome::class)
            ->setResponse(function (string $message, string $action) {
                return [
                    'USSDResp' => [
                        'action' => $action,
                        'menus' => '',
                        'title' => $message,
                    ]
                ];
            });

        return response()->json($ussd->run());

    }
}
