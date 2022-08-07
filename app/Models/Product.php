<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const OBJECT_TV = 'TV';
    const OBJECT_SMARTPHONE = 'Smartphone';
    const OBJECT_NOTEBOOK = 'Notebook';

    public static $typeObject = [
        self::OBJECT_TV, self::OBJECT_SMARTPHONE, self::OBJECT_NOTEBOOK,
    ];

    const OBJECT_ASER = 'Aser';
    const OBJECT_SUMSUNG = 'Sumsung';
    const OBJECT_LENOVO = 'Lenovo';

    public static $firmObject = [
        self::OBJECT_ASER, self::OBJECT_SUMSUNG, self::OBJECT_LENOVO,
    ];

    const CURRENCY_UAH = 'UAH';
    const CURRENCY_USD = 'USD';
    const CURRENCY_EUR = 'EUR';

    public static $typeCurrency = [
        self::CURRENCY_UAH, self::CURRENCY_USD, self::CURRENCY_EUR,
    ];

    const REMEMBER_FALSE = 'OFF';
    const REMEMBER_TRUE = 'ON';

    protected $table = 'products';
    protected $fillable = [
        'type_object','firm_object','model_object','file_name','file_size','price','type_currency','condition','name','phone', 'more_information', 'remember', 'store_id', 'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function store(){
        return $this->belongsTo(Store::class);
    }
}
