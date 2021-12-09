<?php

declare(strict_types=1);
namespace App\Domain\News\Models;

use App\Domain\Admin\Models\Admin;
use App\Domain\Model; 
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
 
use App\Domain\Menu\Models\MenuItem;
use App\Support\Traits\MenuItemTrait;
class News extends Model implements HasMedia
{
    use MenuItemTrait;
    use InteractsWithMedia;

    protected $table = 'news';

    const ACTIVE = 1;
    const INACTIVE = 0;
    const STATUS = [
        self::ACTIVE => 'Đã đăng',
        self::INACTIVE => 'Chưa đăng'
    ];

    public static function boot()
    {
        parent::boot();
    }
 
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