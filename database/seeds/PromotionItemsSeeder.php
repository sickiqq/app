<?php

use Illuminate\Database\Seeder;
use App\PromotionItem;

class PromotionItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PromotionItem::create(['product_id' => 9, 'promotion_id' => 1, 'amount' => 1, 'price' => 2500]);
        PromotionItem::create(['product_id' => 1, 'promotion_id' => 1, 'amount' => 1, 'price' => 2500]);

        PromotionItem::create(['product_id' => 10, 'promotion_id' => 2, 'amount' => 1, 'price' => 2000]);
        PromotionItem::create(['product_id' => 10, 'promotion_id' => 2, 'amount' => 1, 'price' => 2500]);
    }
}
