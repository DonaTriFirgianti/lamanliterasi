<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $items = Item::all();

        // Buat transaksi dummy lebih realistis
        $transactionsToCreate = 10;

        for ($i = 0; $i < $transactionsToCreate; $i++) {
            $item = $items->random();
            $type = fake()->randomElement(['in', 'out']);
            $maxQuantity = $type === 'out' ? $item->quantity : 50;

            Transaction::create([
                'item_id' => $item->id,
                'quantity' => $maxQuantity > 0 ? fake()->numberBetween(1, $maxQuantity) : 1,
                'type' => $type,
                'notes' => $this->generateNote($type),
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ]);
        }

        // Update quantity item dengan lebih efisien
        Item::chunk(10, function ($items) {
            foreach ($items as $item) {
                $item->quantity = (int) $item->transactions()
                    ->select(DB::raw('SUM(CASE WHEN type = "in" THEN quantity ELSE -quantity END) as total'))
                    ->value('total') ?? 0;

                $item->save();
            }
        });
    }

    private function generateNote($type): string
    {
        $notes = [
            'in' => [
                'Pembelian stok baru',
                'Penambahan stok dari pemasok',
                'Retur barang dari konsumen',
                'Stok opname',
                'Hadiah dari supplier',
                'Penyesuaian stok sistem'
            ],
            'out' => [
                'Penjualan ke pelanggan',
                'Penggunaan internal',
                'Barang rusak',
                'Pengiriman ke cabang',
                'Hadiah untuk klien',
                'Penyesuaian stok fisik'
            ]
        ];

        return fake()->randomElement($notes[$type]);
    }
}