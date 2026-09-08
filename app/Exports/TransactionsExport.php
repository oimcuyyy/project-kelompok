<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithTitle
{
    public function collection(): \Illuminate\Support\Enumerable
    {
        return Order::with('items.menu')->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'ID Pesanan',
            'Tanggal & Waktu',
            'Pelanggan',
            'Tipe Pesanan',
            'Meja',
            'Metode Pembayaran',
            'Status',
            'Rincian Menu',
            'Total Harga (Rp)',
            'Uang Diterima (Rp)',
            'Kembalian (Rp)'
        ];
    }

    public function map(mixed $order): array
    {
        $items = $order->items->map(function ($item) {
            $menuName = $item->menu ? $item->menu->title : 'Menu Terhapus';
            return "{$item->quantity}x {$menuName} (Rp " . number_format($item->price, 0, ',', '.') . ")";
        })->implode("\n");

        return [
            '#' . str_pad($order->id, 5, '0', STR_PAD_LEFT),
            $order->created_at->format('d M Y - H:i:s'),
            $order->customer_name ?: 'Guest',
            $order->order_type ?: 'Dine In',
            $order->table_number ?: '-',
            $order->payment_method ?: 'Cash',
            ucfirst($order->status),
            $items,
            $order->total_price,
            $order->cash_received,
            $order->change
        ];
    }

    public function styles(Worksheet $sheet): ?array
    {
        $sheet->getStyle('H:H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:K1')->getFont()->setBold(true);
        $sheet->getStyle('A1:K1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE2E8F0');

        $sheet->getStyle('A:K')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);

        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function title(): string
    {
        return 'Laporan Transaksi ' . date('d-m-Y');
    }
}
