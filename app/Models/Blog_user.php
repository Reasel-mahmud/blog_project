<?php

namespace App\Models;

use App\Models\Blog_user as ModelsBlog_user;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_user extends Model
{
    use HasFactory;

    private static $user;
    public static function saveRegister($request){

        self::$user =new Blog_user();

        self::$user->name = $request->name;
        self::$user->email = $request->email;
        self::$user->phone = $request->phone;
        self::$user->password =bcrypt($request->password);
        self::$user->save();
    }
}
