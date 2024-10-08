<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Str;
use App\Mail\ContactMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Helpers\CustomHelper;
use GuzzleHttp\Client;

class WhatsAppController extends Controller
{

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        try {

            $data = array(  'title'  => " WhatsApp | ". CustomHelper::Get_website_name() );
            return view('WhatsApp.Index', $data);

        } catch (\Throwable $th) {

            return view('layouts.404-Page');

        }
       
    }

    public function sendMessageText(Request $request)
    {

        try {

            $request->validate([
                'number' => 'required',
                'message' => 'required',
                'instance_id' => 'required',
            ]);
    
            $accessToken = env('POETS_API_ACCESS_TOKEN');

            $response = $this->client->post('https://app.poetsmediagroup.com/api/send', [
                'form_params' => [
                    'number' => $request->number,       
                    'type' => 'text',          
                    'message' => $request->message,     
                    'instance_id' => $request->instance_id, 
                    'access_token' => $accessToken,  
                ],
            ]);

            return back()->with('success', 'Your message has been sent successfully!');

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                // return json_decode($e->getResponse()->getBody()->getContents(), true);
                return back()->with('success', json_decode($e->getResponse()->getBody()->getContents(), true));
            }
            
            return back()->with('success', 'Request failed');
        }
    }   
}