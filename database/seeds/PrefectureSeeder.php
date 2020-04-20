<?php

use App\Domain\Shared\Models\Prefecture;
use Illuminate\Database\Seeder;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->prefectures() as $display_name) {
            Prefecture::create(['display_name' => $display_name]);
        }
    }

    private function prefectures()
    {
        return [
            "高知県",
            "福井県",
            "東京都",
            "徳島県",
            "長崎県",
            "石川県",
            "神奈川県",
            "岩手県",
            "北海道",
            "滋賀県",
            "栃木県",
            "福岡県",
            "大分県",
            "青森県",
            "鹿児島県",
            "山梨県",
            "島根県",
            "奈良県",
            "佐賀県",
            "福島県",
            "新潟県",
            "宮城県",
            "沖縄県",
            "愛知県",
            "愛媛県",
            "三重県",
            "長野県",
            "香川県",
            "大阪府",
            "埼玉県",
            "鳥取県",
            "岡山県",
            "山形県",
            "茨城県",
            "広島県",
            "岐阜県",
            "群馬県",
            "宮崎県",
            "熊本県",
            "京都府",
            "静岡県",
            "山口県",
            "秋田県",
            "和歌山県",
            "富山県",
        ];
    }
}
