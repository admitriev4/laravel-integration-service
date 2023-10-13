<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    protected static $tableName = "cources";

    public static function addOrUpdate(string $currencyCode, string $service, string $value) {
        $currency = self::findCurrency($currencyCode);
        $time = Carbon::now();
        $course = self::exists($currency, $service, $time);
        if($course == false && $currency != false) {
            $req = DB::table(self::$tableName)->insert([
                'currency' => $currency,
                'service' => $service,
                'value' => $value,
                'created_at' =>  $time->toDateTimeString(),
                'updated_at' =>  $time->toDateTimeString(),
            ]);
            return $req;
        } else {
            $req = DB::table(self::$tableName)
                ->where('id', "=", $course)
                ->update(['value' => $value, 'updated_at' => $time->toDateTimeString()]);
        }

    }

    public static function exists(string $currencyID, string $service, $time) {
        $date = explode(' ', $time->toDateTimeString());
        $req = DB::table(self::$tableName)
            ->where('currency', "=" , $currencyID)
            ->where('service', "=", $service)
            ->where('updated_at', ">", $date)
            ->get();
        $course = $req->first();
        if(!empty($course)) { return $course->id; } else { return false; }
    }

    public static function findCurrency(string $code) {
        $req = DB::table('currency')->where('code', "=" , $code)->get();
        $currency = $req->first();

        if(!empty($currency)) { return $currency->id; } else {
            var_dump($code);
            var_dump($currency);
            return false; }

    }
}
