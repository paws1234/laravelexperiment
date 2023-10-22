<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'video']; 
    public function user()
{
    return $this->belongsTo(User::class);
}
public function uploadImage($image)
    {
        if ($image) {
            $imagePath = $image->store('uploads/images', 'public');
            return $imagePath;
        }

        return null;
    }
    public function uploadVideo($video)
    {
        if ($video) {
            $videoPath = $video->store('uploads/videos', 'public');
            return $videoPath;
        }

        return null;
    }
    public function deleteImage()
    {
        if ($this->image) {
            Storage::disk('public')->delete($this->image);
        }
    }
    public function deleteVideo()
    {
        if ($this->video) {
            Storage::disk('public')->delete($this->video);
        }
    }
}
