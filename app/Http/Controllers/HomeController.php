<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['redirect', 'callback']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function redirect()
    {
        $params = [
            'client_id' => '4',
            'redirect_uri' => url('/home/callback'),
            'response_type' => 'code',
            'scope' => 'conference',
        ];

        $authUrl = url('/oauth/authorize?' . http_build_query($params));
        return redirect($authUrl);
    }

    public function callback(Request $request)
    {
        $httpClient = new Client();
        $response1 = $httpClient->post(url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '4',
                'client_secret' => 'wcP04L3okCWVsq7cnjs8fQ681dEOyAG2w9PwvjtU',
                'redirect_uri' => url('/home/callback'),
                'code' => $request->get('code'),
            ],
        ]);

        $result1 = json_decode($response1->getBody()->getContents(), true);

        $response2 = $httpClient->request('GET', url('/oapi/user/info'), [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $result1['access_token'],
            ]
        ]);

        $result2 = json_decode($response2->getBody()->getContents(), true);
        $data = [$result1, $result2];
        return $data;
    }
}
