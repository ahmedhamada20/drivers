<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->delete();
        DB::table('currencies')->insert([
            ['name' => 'الإمارات العربية المتحدة', 'code' => 'AED', 'price' => 1],
            ['name' => 'جمهورية مصر العربية', 'code' => 'EGP', 'price' => 1],
            ['name' => 'الجمهورية العراقية', 'code' => 'IQD', 'price' => 1],
            ['name' => 'الجمهورية العربية السورية', 'code' => 'SYP', 'price' => 1],
            ['name' => 'الجمهورية اللبنانية', 'code' => 'LBP', 'price' => 1],
            ['name' => 'المملكة الأردنية الهاشمية', 'code' => 'JOD', 'price' => 1],
            ['name' => 'المملكة العربية السعودية', 'code' => 'SAR', 'price' => 1],
            ['name' => 'الجمهورية اليمنية', 'code' => 'YER', 'price' => 1],
            ['name' => 'ليبيا', 'code' => 'LYD', 'price' => 1],
            ['name' => 'الجمهورية السودانية', 'code' => 'SDG', 'price' => 1],
            ['name' => 'المملكة المغربية', 'code' => 'MAD', 'price' => 1],
            ['name' => 'الجمهورية التونسية', 'code' => 'TND', 'price' => 1],
            ['name' => 'دولة الكويت', 'code' => 'KWD', 'price' => 1],
            ['name' => 'الجمهورية الجزائرية الديمقراطية الشعبية', 'code' => 'DZD', 'price' => 1],
            ['name' => 'الجمهورية الإسلامية الموريتانية', 'code' => 'MRO', 'price' => 1],
            ['name' => 'مملكة البحرين', 'code' => 'BHD', 'price' => 1],
            ['name' => 'دولة قطر', 'code' => 'QAR', 'price' => 1],
            ['name' => 'سلطنة عمان', 'code' => 'OMR', 'price' => 1],
            ['name' => 'جمهورية الصومال', 'code' => 'SOS', 'price' => 1],
            ['name' => 'جمهورية جيبوتي', 'code' => 'FDJ', 'price' => 1],
            ['name' => 'جمهورية القمر المتحدة', 'code' => 'KMF', 'price' => 1],
        ]);

    }
}
