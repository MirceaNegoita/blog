<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as ImageProcessor;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = ['path'];

    public static $rulesCreate = array(
        'path' => 'required',
    );

    public function saveMedia($file, $folder, $video = null)
    {
        $originalName = $file->getClientOriginalName();
        $imagesExtensionsArray = array('jpg','png','jpeg','gif', 'svg');

        if ($file->getClientOriginalExtension() == 'png'  ||
            $file->getClientOriginalExtension() == 'jpg'  ||
            $file->getClientOriginalExtension() == 'jpeg' ||
            $file->getClientOriginalExtension() == 'gif'  ||
            $file->getClientOriginalExtension() == 'svg') 
        {
            $this->path = $this->saveInput($file, 'images/'.$folder.'/', getFileNameWithoutExtension($originalName));
        } elseif($file->getClientOriginalExtension() == 'mp4')
        {
            $this->path = $this->saveInput($file, 'videos/'.$folder.'/', getFileNameWithoutExtension($originalName));
            $this->video = 1;
        } elseif($file->getClientOriginalExtension() == 'pdf')
        {
            $this->path = $this->saveInput($file, 'documents/'.$folder.'/', getFileNameWithoutExtension($originalName));
            $this->document = 1;
        }

        if(isset($video)){
            $this->video_id = $video;
        }
        
        return $this->save();
    }

    protected function saveInput($inputFile, $path, $fileName, $width = null, $height = null)
    {

        if(isset($inputFile))
        {
            $filename = $fileName . '.' . $inputFile->getClientOriginalExtension();
            $serverPath = public_path($path);

            if(!is_dir($serverPath))
            {
                mkdir($serverPath, 0777, true);
            }

            $videoPath = $serverPath;
            $documentPath = $serverPath;
            $serverPath = $serverPath . $filename;
            $path = $path . $filename;

            //dd(asset($path));
            if ($inputFile->getClientOriginalExtension() == 'png'  ||
                $inputFile->getClientOriginalExtension() == 'jpg'  ||
                $inputFile->getClientOriginalExtension() == 'jpeg' ||
                $inputFile->getClientOriginalExtension() == 'gif'  ||
                $inputFile->getClientOriginalExtension() == 'svg') 
                {
                    if($width != null && $height != null)
                    {
                        ImageProcessor::make($inputFile->getRealPath())->resize($width, $height)->save($serverPath);
                    }
                    else
                    {
                        ImageProcessor::make($inputFile->getRealPath())->save($serverPath);
                    }

                    
                }
                elseif($inputFile->getClientOriginalExtension() == 'mp4')
                {
                    $inputFile->move($videoPath, $fileName .  '.' . $inputFile->getClientOriginalExtension());
                }
                elseif ($inputFile->getClientOriginalExtension() == 'pdf') {
                    
                    $inputFile->move($documentPath, $filename);
                }
                return $path;
        }

        return null;
    }

    public function poster()
    {
        return $this->belongsTo(Media::class, 'id', 'video_id');
    }

    public function scopeClinic($q)
    {
        return $q->where('clinic', 1);
    }
}
