<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config as configModel;
use Illuminate\Support\Facades\Config;

class GeneralSettingController extends Controller
{
    /**
     *get gerneral setting
     * 
     * @return Illuminate\Http\Request
     */
    public function getGeneralSettings()
    {
        
        return view('backend.setting.general');
    }
    /**
     * store gerneral setting
     * 
     * @return Illuminate\Http\Responce
     * @return Illuminate\Http\Request  $request
     */
    public function saveGeneralSettings(Request $request)
    {   
        
        if(isset($request->services_stripe_key) && isset($request->services_stripe_secret))
        {
            $request->merge(["services.stripe.active"=>1,'services.stripe.key'=>$request->services_stripe_key,'services.stripe.secret'=>$request->services_stripe_secret]);
        }
        if(isset($request->paypal_client_id) && isset($request->paypal_secret))
        {
            $request->merge(["services.apypal.active"=>1,'paypal.client.id'=>$request->paypal_client_id,'paypal.secret'=>$request->paypal_secret]);
        }
        configModel::truncate();
        
        foreach ($request->except('_token','services_stripe_key','services_stripe_secret','paypal_client_id','paypal_secret') as $key => $value) {

            $key = str_replace('_', '.', $key);
            configModel::create(['key'=>$key,'value'=>$value]);
        }
        return redirect()->route('admin.getGeneralSettings')->with('success','updated successfully');

    }
}
