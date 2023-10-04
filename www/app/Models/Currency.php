<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Currency extends Model
{
    use HasFactory;

    protected static $tableName = "currency";

    public static function add(string $code, string $name) {
        if(!self::exists($code)) {
        $time = Carbon::now();
        $req = DB::table(self::$tableName)->insert([
            'code' => $code,
            'name' => $name,
            'created_at' =>  $time->toDateTimeString(),
            'updated_at' =>  $time->toDateTimeString(),
        ]);
            return $req;
        } else {
            return false;
        }
    }

    public static function exists(string $code) {
       $req = DB::table(self::$tableName)->where('code', "=" , $code)->get();

       if(!empty($req->all())) { return true; } else { return false; }
    }
}
