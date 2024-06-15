<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $appends=[
        'date_diff',
        'html_special_changable',
    ];

    public function getDateDiffAttribute()
    {
        return carbon::parse($this->created_at)->diffForHumans();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_Brands');
    }

    public function getHtmlSpecialAttribute()
    {
        $html='';
        switch ($this->is_special) {
            case 'normal':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-warning"><span class="rounded fa fa-ban" ></span>شرکت عادی</div>';
                break;
            case 'special':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-primary"><span class="rounded fa fa-check" ></span>شرکت ویژه</div>';
                break;
        }
        return $html;
    }
    public function getHtmlSpecialChangableAttribute(){
        $html = '';
        switch ($this->is_special){
            case 'special':
                $html = "<span class='badge p-3 text-white bg-primary change-item-speciality' data-id='$this->id'>شرکت ویژه</span>";
                break;
            case 'normal':
                $html = "<span class='badge p-3 text-white bg-warning change-item-speciality' data-id='$this->id'>شرکت عادی</span>";
                break;
        }
        return $html;
    }

    public function scopeDescOnly()
    {
        return $this->orderBy('id','desc');
    }
}
