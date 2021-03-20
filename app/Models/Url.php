<?php

namespace App\Models;

use App\Classes\CodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prophecy\Doubler\Generator\ClassCodeGenerator;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'user_id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function short_url($long_url)
    {
        $url = self::create([
            'url' => $long_url,
            'user_id' => auth()->user()->id
        ]);

        $code = (new CodeGenerator())->get_code($url->id);

        $url->code = $code;
        $url->save();

        return $url->code;
    }
}
