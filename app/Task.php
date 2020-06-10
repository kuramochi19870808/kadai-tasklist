<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content','status'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * ユーザーのフルネーム取得
     *
     * @return string
     */
    public function getStatusClassAttribute()
    {
      if ($this->status  == "完了") {
         return "comp";
      }
      if ($this->status == "作業中") {
         return "work";
      }
      if ($this->status == "未着手") {
         return "stay";
      }
      return ""; // 上記以外の場合
    }
}
