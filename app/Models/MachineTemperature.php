<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MachineTemperature extends Model
{
    use HasFactory;

    protected $table = 'machine_temperature';

    protected $fillable = [
        'temperature',
        'efficiency',
        'recorded_at',
    ];

    public static function getTemperatures($startDate, $endDate)
    {
        $query = DB::table('machine_temperature')
        ->select('temperature', 'efficiency', 'recorded_at');

        if ($startDate && $endDate && $startDate != 'undefined' && $endDate != 'undefined') {
            $query->whereBetween('recorded_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        return [
            'temperature' => $data->pluck('temperature'),
            'efficiency' => $data->pluck('efficiency'),
            'recorded_at' => $data->pluck('recorded_at'),
        ];
    }

}
