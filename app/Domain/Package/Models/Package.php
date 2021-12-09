<?php

namespace App\Domain\Package\Models;

use App\Domain\Admin\Models\Admin;
use App\Domain\Menu\Models\MenuItem;
use App\Support\Traits\MenuItemTrait;
use App\Domain\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Model implements HasMedia
{
    use InteractsWithMedia;
    use MenuItemTrait;

    protected $table="package";

    protected $guarded = [];

    /**
     * @inheritDoc 
     */

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile()
            ->useFallbackUrl('/backend/global_assets/images/placeholders/placeholder.jpg');
        $this
            ->addMediaCollection('file')
            ->singleFile()
            ->useFallbackUrl('/backend/global_assets/images/placeholders/placeholder.jpg');
    }

 
}
