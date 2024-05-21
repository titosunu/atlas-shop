<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

class ExportOrder implements FromView, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function setPageMargins($sheet)
    {
        $sheet->setPageMargin(array(
            0.25, 0.30, 0.25, 0.30
        ));
    }

    public function styles($sheet)
    {
        return [
            // Tentukan pengaturan gaya teks untuk header (misalnya, tebal)
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view():View
    {
        $orders = $this->data;
        
        return view('admin.order.table', ['orders' => $orders]);
    }
}