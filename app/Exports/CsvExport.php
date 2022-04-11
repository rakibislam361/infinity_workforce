<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class CsvExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    // varible form and to 
    public function __construct(String $from = null, String $to = null)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    //function select data from database 
    public function collection()
    {
        return User::select()
        ->where('created_at', '>=', $this->from)
        ->where('created_at', '<=', $this->to)
        ->where('role_id', 2)
        ->get();
    }
    /**
     * @return array
     */
    public function map($candidate): array
    {
        return [

            @$candidate->info->first_name,
            @$candidate->info->mid_name,
            @$candidate->info->last_name,
            
            @$candidate->info->call_code->calling_code . '-' . @$candidate->info->phone,
            $candidate->email,
            @$candidate->info->visa,
            @$candidate->info->visa_exp,
            @$candidate->info->address,
        ];
    }
    public function headings(): array
    {
        // First_Name	Mid_Name	Last_Name	Phone	Email	Visa	Visa Expire Date
        return [
            'First_Name',
            'Mid_Name',
            'Last_Name',
            'Phone',
            'Email',
            'Visa',
            'Visa Expire Date',
            'Address',
        ];
    }
}
