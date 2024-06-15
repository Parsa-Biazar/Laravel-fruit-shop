<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $appends=[
        'date_diff',
        'html_status',
        'html_status_changable',
        'html_special_changable'
    ];

    public function brands()
    {
        return $this->belongsToMany(Brand::class,'product_Brands');
    }

    public function getDateDiffAttribute()
    {
        return carbon::parse($this->created_at)->diffForHumans();
    }

    public function getHtmlStatusAttribute()
    {
        $html='';
        switch ($this->status) {
            case 'draft':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-warning"><span class="rounded fa fa-ban" ></span>غیرفعال</div>';
                break;
            case 'published':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-primary"><span class="rounded fa fa-check" ></span>فعال</div>';
                break;
        }
        return $html;
    }
    public function getHtmlSpecialAttribute()
    {
        $html='';
        switch ($this->is_special) {
            case 'normal':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-warning"><span class="rounded fa fa-ban" ></span>محصول عادی</div>';
                break;
            case 'special':
                $html = '<div class="d-flex justify-content-center align-items-center rounded text-black-50 bg-primary"><span class="rounded fa fa-check" ></span>محصول ویژه</div>';
                break;
        }
        return $html;
    }
    public function getHtmlStatusChangableAttribute(){
        $html = '';
        switch ($this->status){
            case 'published':
                $html = "<span class='badge p-3 text-white bg-primary change-item-status' data-id='$this->id'>فعال</span>";
                break;
            case 'draft':
                $html = "<span class='badge p-3 text-white bg-warning change-item-status' data-id='$this->id'>غیر فعال</span>";
                break;
        }
        return $html;
    }

    public function getHtmlSpecialChangableAttribute(){
        $html = '';
        switch ($this->is_special){
            case 'special':
                $html = "<span class='badge p-3 text-white bg-primary change-item-speciality' data-id='$this->id'>محصول ویژه</span>";
                break;
            case 'normal':
                $html = "<span class='badge p-3 text-white bg-warning change-item-speciality' data-id='$this->id'>محصول عادی</span>";
                break;
        }
        return $html;
    }

    public function scopeDescPub()
    {
        return $this->where('status','published')->orderBy('id','desc');
    }

    public function scopeDescOnly()
    {
        return $this->orderBy('id','desc');
    }
}
