<?php

namespace App\Helper;

use Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Common
{

	public $request;

	public function  __construct(Request $request)
	{
		$this->request = $request;
	}
    
    public function createToken()
    {

    	$key = Config::get('app.key');

        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }

		return hash_hmac('sha256', Str::random(40), $key);
    }

    
    public function fileUpload($fileName, $path = '')
    {
    	//$original_path = $request->file($file)->getRealPath();
	    $file = $this->request->file($fileName); 
	    $fileExtension = $file->getClientOriginalExtension();
	    $originalFilename = $file->getClientOriginalName();

	    $cfile = time().'-'.str_random(6).'-'. $originalFilename;
	   	
	    $file->move(base_path() . '/public/uploads/' . $path, $cfile);
	    
	    return  $cfile;
    }  

}



