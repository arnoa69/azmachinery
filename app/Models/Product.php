<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'operation',
        'product_image',
        'product_name',
        'product_price',
        'prduct_code',
        'type',
        'usage',
        'weight_capacity',
        'slug',
        'slug_se',
        'slug_pt',
        'slug_no',
        'slug_ne',
        'slug_lu',
        'slug_it',
        'slug_fr',
        'slug_fi',
        'slug_es',
        'slug_ee',
        'slug_dk',
        'slug_de',
        'total_length',
        'total_width',
        'width_used',
        'length_inclined_plane',
        'length_plateform_horizontal',
        'length_lip_penetrating',
        'entrance_tray_length',
        'exit_lip_length',
        'slope_min',
        'slope_max',
        'unloaded_weight',
        'min_height',
        'max_height',
        'hydraulic_leveler',
        'amount_feet',
        'electric_leveler',
        'side_railings_height',
        'application',
    ];

    protected $casts = [
        'application' => 'json',
    ];

}
