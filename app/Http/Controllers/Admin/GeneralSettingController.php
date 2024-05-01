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
        
        
        
        configModel::truncate();
        
        foreach ($request->except('_token','services_stripe_key','services_stripe_secret','paypal_client_id','paypal_secret') as $key => $value) {

            if(isset($value))
            {
                $key = str_replace('__', '.', $key);
                $record = configModel::create(['key'=>$key,'value'=>$value]);
            }
            
            
        }
        
        if($request->app__currency)
        {   
            if(configModel::where('key','app.currency')->first()){
                configModel::where('key','app.currency')->first()->delete();
            }
            configModel::create(['key'=>'app.currency', 'value'=>explode('__', $request->app__currency)[0]]);
            configModel::create(['key'=>'setting.currencycode', 'value'=>explode('__', $request->app__currency)[1]]);
        }
        
        
        return redirect()->route('admin.getGeneralSettings')->with('success','updated successfully');

    }
}
