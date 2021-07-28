<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 配列
        $stocks = [
            [
                'name' => '50個プログラマインターネットjavaステッカーオタクphpドッカーhtml bitcoinプログラミング言語携帯電話ラップデカールステッカー',
                'detail' => 'スーツ女の子子供キッズ教師学校のギフトdiyの手紙日記スクラップブッキング文房具pegatinas携帯電話ラップデカールステッカー特徴: pvc防水ステッカーステッカーサイズ3〜8センチメートル/1.18〜3.15インチパッキング: 50個',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/4000063077415.html?spm=a2g0o.home.15002.1.572c5c72guMTTf&gps-id=pcJustForYou&scm=1007.13562.225783.0&scm_id=1007.13562.225783.0&scm-url=1007.13562.225783.0&pvid=9b67c5b5-dea7-4786-a5fa-36966ae4fd4b&_t=gps-id:pcJustForYou,scm-url:1007.13562.225783.0,pvid:9b67c5b5-dea7-4786-a5fa-36966ae4fd4b,tpp_buckets:668%230%23208986%2316_668%230%23208986%2316_668%23888%233325%231_668%23888%233325%231_668%232846%238116%232002_668%235811%2327172%237_668%232717%237563%23579__668%233374%2315176%23381_668%232846%238116%232002_668%235811%2327172%237_668%232717%237563%23579_668%233164%239976%23160_668%233374%2315176%23381',
            ],
            [
                'name' => '50個bitcoin & dogecoinステッカーパック仮想通貨落書きデカールラップトップノートギター文房具pegatina',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005002595398324.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.1',
            ],
            [
                'name' => '50個bitcoin & dogecoinステッカーパック仮想通貨落書きデカールラップトップノートギター文房具pegatina',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005002595398324.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.1',
            ],
            [
                'name' => '50個bitcoin & dogecoinステッカーパック仮想通貨落書きデカールラップトップノートギター文房具pegatina',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005002595398324.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.1',
            ],
            [
                'name' => '50個bitcoin & dogecoinステッカーパック仮想通貨落書きデカールラップトップノートギター文房具pegatina',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005002595398324.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.1',
            ],
            [
                'name' => '50 個パック米国特殊部隊ステッカーオートバイスケートボードハイドロ fask ノートパソコンのスーツケースのためのクールな防水ステッカー',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/4000208208248.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.2',
            ],
            [
                'name' => '50個映画ザ · フューチャーステッカーパックのためにラップトップ冷蔵庫電話スケートボード旅行スーツケースステッカー',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/4000063020541.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.4',
            ],
            [
                'name' => '50個面白いビールステッカーパックパロディー表現雑草420落書きデカールステッカーdiyラップトップオートバイヘルメットギター',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005002657035118.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.5',
            ],
            [
                'name' => '50個マウンテンバイクのステッカー防水屋外mtb自転車ステッカークールdiyのラップトップpcの電話スケートボード荷物pegatinas',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005001683910408.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.6',
            ],
            [
                'name' => '50個クールなネオンライトステッカー子供のギフトのためのおもちゃアニメかわいいデカールステッカーにラップトップ電話スーツケース車ギター文房具',
                'detail' => ' ',
                'fee' => 500,
                'url' => 'https://ja.aliexpress.com/item/1005001377799053.html?gps-id=pcStoreJustForYou&scm=1007.23125.137358.0&scm_id=1007.23125.137358.0&scm-url=1007.23125.137358.0&pvid=b4c3ebb5-15ef-441e-a58f-74377ea35d33&spm=a2g0o.store_pc_home.smartJustForYou_162516112.7',
            ],
            // [
            //     'name' => '',
            //     'detail' => '',
            //     'fee' => 500,
            //     'url' => '',
            // ],
            // [
            //     'name' => '',
            //     'detail' => '',
            //     'fee' => 500,
            //     'url' => '',
            // ],
        ];
        DB::table('stocks')->truncate(); //2回目実行の際にシーダー情報をクリア
        // 配列のデータを回す
        foreach($stocks as $s) {
            DB::table('stocks')->insert($s);
        }
        // DB::table('stocks')->insert([
        //     'name' => 'フィルムカメラ',
        //     'detail' => '1960年式のカメラです',
        //     'fee' => 200000,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'イヤホン',
        //     'detail' => 'ノイズキャンセリングがついてます',
        //     'fee' => 20000,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => '時計',
        //     'detail' => '1980年式の掛け時計です',
        //     'fee' => 120000,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => '地球儀',
        //     'detail' => '珍しい商品です',
        //     'fee' => 120000,
        // ]);


        // DB::table('stocks')->insert([
        //     'name' => '腕時計',
        //     'detail' => 'プレゼントにどうぞ',
        //     'fee' => 9800,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'カメラレンズ35mm',
        //     'detail' => '最新式です',
        //     'fee' => 79800,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'シャンパン',
        //     'detail' => 'パーティにどうぞ',
        //     'fee' => 800,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'ビール',
        //     'detail' => '大量生産されたビールです',
        //     'fee' => 200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'やかん',
        //     'detail' => 'かなり珍しいやかんです',
        //     'fee' => 1200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => '精米',
        //     'detail' => '米30Kgです',
        //     'fee' => 11200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'パソコン',
        //     'detail' => 'ジャンク品です',
        //     'fee' => 11200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'アコースティックギター',
        //     'detail' => 'ヤマハ製のエントリーモデルです',
        //     'fee' => 25600,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'エレキギター',
        //     'detail' => '初心者向けのエントリーモデルです',
        //     'fee' => 15600,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => '加湿器',
        //     'detail' => '乾燥する季節の必需品',
        //     'fee' => 3200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'マウス',
        //     'detail' => 'ゲーミングマウスです',
        //     'fee' => 4200,
        // ]);

        // DB::table('stocks')->insert([
        //     'name' => 'Android Garxy10',
        //     'detail' => '中古美品です',
        //     'fee' => 84200,
        // ]);
    }
}
