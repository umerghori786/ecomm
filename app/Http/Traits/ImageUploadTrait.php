<?php

namespace App\Http\Traits;

trait ImageUploadTrait{

	public function imageUpload($request, $model,$id)
	{
		if (!file_exists(public_path('product'))) {
            mkdir(public_path('product'), 0777);
        }

        if ($request->has('image_url')) {
        	
        	foreach ($request->image_url as $image) {
        		
        		
        		$imageName = time().'.'.$image->getClientOriginalName();
        		$image->move(public_path('product'), $imageName);
        		$image_url = url('product/'.$imageName);
        		$model = $model->findOrFail($id);
        		$model->images()->create(['url'=>$image_url]);

        	}
        }
	}
}