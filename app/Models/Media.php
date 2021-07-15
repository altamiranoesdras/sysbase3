<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

/**
 * Class Media
 * @package App\Models
 * @version March 26, 2021, 4:50 pm CST
 *
 * @property string $model_type
 * @property integer $model_id
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string $mime_type
 * @property string $disk
 * @property integer $size
 * @property string $manipulations
 * @property string $custom_properties
 * @property string $responsive_images
 * @property integer $order_column
 * @property string $generated_conversions
 * @property string $conversions_disk
 * @property string $uuid
 */
class Media extends BaseMedia
{
}
