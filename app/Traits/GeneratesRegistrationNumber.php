<?php

namespace App\Traits;


trait GeneratesRegistrationNumber
{
    public static function generateRegistrationNumber()
    {
        // Format: KST-YYYY-NNNNN
        // KST: Kenya Safety Tech
        // YYYY: Current Year
        // NNNNN: Unique sequential number
        $year = now()->year;
        $lastStudent = self::where('registration_number', 'like', "KST-{$year}-%")
            ->orderBy('id', 'desc')
            ->first();


        if (!$lastStudent) {
            $sequence = '00001';
        } else {
            $lastNumber = intval(substr($lastStudent->registration_number, -5));
            $sequence = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
        }


        return "KST-{$year}-{$sequence}";
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->registration_number = self::generateRegistrationNumber();
        });
    }
}
