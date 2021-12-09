<?php

declare(strict_types=1);
namespace App\Domain\News\Models;


use App\Domain\Admin\Models\Admin;
use App\Domain\Model; 
use App\Domain\Package\Models\Package;
class PackageNew extends Model 
{
    protected $table = 'package_news';
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
