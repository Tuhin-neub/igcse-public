<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
class ImageController extends Controller
{
    public function image($to_store_name, $file, $to_store_folder_path, $type, $old_file_path)
    {

        if ($type == 'update') {
            if($old_file_path != null){
                if(File::exists('storage/'.$old_file_path)) {
                    // return $request->old_img;
                    // unlink('storage/'.$request->old_img);
                    \Storage::delete($old_file_path);
                }
                $img_explode = explode(".",$old_file_path);
                if (file_exists('storage/'.$img_explode[0].'.jpg')) {
                    unlink('storage/'.$img_explode[0].'.jpg');
                }
                if (file_exists('storage/'.$old_file_path)) {
                    unlink('storage/'.$old_file_path);
                }
            }
        }

        // Get filename with the extension
        $filenameWithExt = $file->getClientOriginalName();
        $filenameWithExt = str_replace(' ', '', $filenameWithExt);

        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();

        // Filename to store
        $to_store_name_without_ext = $to_store_folder_path.'/'.$to_store_name;
        $to_store_name_with_ext_jpg = $to_store_name_without_ext.'.jpg';
        $to_store_name_with_ext_webp = $to_store_name_without_ext.'.webp';

        // Upload Image
        $path = $file->storeAs('public', $to_store_name_with_ext_jpg);

        //The file path of your image.
        $imagePath = 'storage/'.$to_store_name_with_ext_jpg;
                    
        //Create an image object.
        // $im = imagecreatefromjpeg($imagePath);
        if ($extension == 'jpeg' || $extension == 'JPEG' || $extension == 'Jpeg') {
            $im = imagecreatefromjpeg($file);
        }elseif ($extension == 'png' || $extension == 'PNG' || $extension == 'Png') {
            // $im = imagecreatefrompng($file);

            // get png in question
            $pngimg = imagecreatefrompng($file);

            // get dimens of image
            $w = imagesx($pngimg);
            $h = imagesy($pngimg);;

            // create a canvas
            $im = imagecreatetruecolor ($w, $h);
            imageAlphaBlending($im, false);
            imageSaveAlpha($im, true);

            // By default, the canvas is black, so make it transparent
            $trans = imagecolorallocatealpha($im, 0, 0, 0, 127);
            imagefilledrectangle($im, 0, 0, $w - 1, $h - 1, $trans);

            // copy png to canvas
            imagecopy($im, $pngimg, 0, 0, 0, 0, $w, $h);

            // lastly, save canvas as a webp
            // imagewebp($im, str_replace('png', 'webp', $file));

            // done
            // imagedestroy($im); 


        }elseif ($extension == 'jpg' || $extension == 'JPG' || $extension == 'Jpg') {
            // $im = imagecreatefromjpg($file);
            $jpg=imagecreatefromjpeg($file);
            $w=imagesx($jpg);
            $h=imagesy($jpg);
            $im=imagecreatetruecolor($w,$h);
            imagecopy($im,$jpg,0,0,0,0,$w,$h);
        }elseif ($extension == 'webp' || $extension == 'WEBP' || $extension == 'Webp') {
            $im = imagecreatefromwebp($file);
        }
        
        
        
        //The path that we want to save our webp file to.
        $newImagePath = str_replace("jpg", "webp", $imagePath);
        
        //Quality of the new webp image. 1-100.
        //Reduce this to decrease the file size.
        $quality = 60;
        
        //Create the webp image.
        imagewebp($im, $newImagePath, $quality);

        if (file_exists('storage/'.$to_store_name_with_ext_jpg)) {
            unlink('storage/'.$to_store_name_with_ext_jpg);
        }

        return $to_store_name_with_ext_webp;
    }
}
