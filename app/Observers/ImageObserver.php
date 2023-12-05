<?php

namespace App\Observers;

use Illuminate\Support\Facades\File;

use App\Models\Image;

class ImageObserver
{
    /**
     * Handle the Image "retrieved" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function retrieved(Image $image)
    {
        //
    }

    /**
     * Handle the Image "creating" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function creating(Image $image)
    {
        //
    }

    /**
     * Handle the Image "created" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function created(Image $image)
    {
        //
    }

    /**
     * Handle the Image "updating" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function updating(Image $image)
    {
        //
    }

    /**
     * Handle the Image "updated" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function updated(Image $image)
    {
        //
    }

    /**
     * Handle the Image "saving" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function saving(Image $image)
    {
        //
    }

    /**
     * Handle the Image "saved" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function saved(Image $image)
    {
        //
    }


    /**
     * Handle the Image "deleting" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function deleting(Image $image)
    {
        //
        switch ( $image->imageable_type ) {
            case Brand::class :
                $imagePath     = storage_path().'/app/public/images/brands/'.$image->name;
                $thumbnailPath = storage_path().'/app/public/images/brands/thumbnails/'.$image->name;
                break;
            case Category::class :
                $imagePath     = storage_path().'/app/public/images/categories/'.$image->name;
                $thumbnailPath = storage_path().'/app/public/images/categories/thumbnails/'.$image->name;
                break;

            default:
                $imagePath     = storage_path().'/app/public/images/'.$image->name;
                $thumbnailPath = storage_path().'/app/public/images/thumbnails/'.$image->name;
                break;
        }


        $imageFiles = [
            $imagePath ,
            $thumbnailPath ,
        ];

        File::delete($imageFiles);
    }

    /**
     * Handle the Image "deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function deleted(Image $image)
    {
        //
    }

    /**
     * Handle the Image "restored" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function restored(Image $image)
    {
        //
    }

    /**
     * Handle the Image "force deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function forceDeleted(Image $image)
    {
        //
    }
}
