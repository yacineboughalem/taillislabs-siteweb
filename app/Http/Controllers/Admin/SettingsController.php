<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    //
    private $dir_images     ;

    public function __construct() {
        $this->dir_images     = '/app/public/images/';

        // check if directory exixt or make it
        if( !is_dir( storage_path().$this->dir_images ) ){
            @mkdir( storage_path().$this->dir_images , 0777 );
        }
    }

    public function index (Request $request)
    {
        //return $request->all();
        $table = DB::table('settings');
        session()->forget('message');
        if( $request->isMethod('POST') ){
            //dd( $request->all() );
            $validated = $request->validate([
                'logo'              => 'sometimes|image',
                'name'              => 'sometimes',
                'whatsapp'          => 'sometimes',
                'phone_first'       => 'sometimes',
                'phone_second'      => 'sometimes',
                'fax_first'         => 'sometimes',
                'fax_second'        => 'sometimes',
                'emails'             => 'sometimes',
                'address'           => 'sometimes',
                'facebook'          => 'sometimes',
                'instagram'         => 'sometimes',
                'twitter'           => 'sometimes',
                'linkedin'          => 'sometimes',
                'youtube'           => 'sometimes',
                'head_script'       => 'sometimes',
                'body_script'       => 'sometimes',
                'footer'            => 'sometimes',
            ]);


            if( $request->hasFile('logo') ){

                $logo     = $request->file('logo');
                $logoName = '_img_logo_'.$logo->getClientOriginalName();
                $logo->move( storage_path().$this->dir_images , $logoName );

                $validated['logo'] = $logoName ;
            }

            if( $table->first() ){
                $table->update( $validated );
            }else{
                $table->insert( $validated );
            }
            session()->flash('message', __('The action ran successfully!') );
        }
        $data = $table->first();
        if( @ $data->logo ){
            $fileLogo = 'images/'.$data->logo;
            $data->logo = url(Storage::url($fileLogo));
        }

        return view('admin.pages.settings',compact( 'data' ));
    }
}
