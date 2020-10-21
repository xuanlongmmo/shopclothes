<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\order;

class ExportOrderController extends Controller
{
    use Exportable;
    public function collection()
    {
        $orders = \App\order::all();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->fullname,
                '2' => $row->email,
                '3' => $row->phone,
                '3' => $row->total_pay,
            );
        }
        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'Id',
            'Họ tên',
            'Email',
            'Số điện thoại',
            'Tổng tiền thanh toán',
        ];
    }
    public function export(){
        return Excel::download(new ExportOrderController(), 'order.xlsx');
   }
}
