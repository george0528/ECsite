<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Photoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 配列
        $photos = [
            ['Ha39ec817a891422b91e2bb9bdf892d71d.jpg','H5b308dae56b64bca871ac8b8a924d4693.jpg','H828626aa3e1b427e9fc9d26be8cc5e92h.jpg','Hedc4dc89f12547dc8365e2c19cdd2a2fq.jpg','H0c594bf091614f1eb83e99ece45509eb8.jpg','H48af7cf034fa41148de1a2b4d759d243E.jpg','H11e17e2d062e47daa4460e5960f67a43A.jpg','Hdaf8515d17c84ba79d636683fc8a63d7A.jpg'],
            ['Hf3e7fa6058be442ab1ca6e5a867fdeb0k.jpg','Hc0f3bdb7b03442258361e8fd03183d7ai.jpg','Hc276ce6426ec4d0fa66253aff55232c9i.jpg','He5e691c14be64b919192ecc4d0c780a3h.jpg','H3a9ea8635ecc4067bdd4487d8fdc1afew.jpg','H686fd22b93ec41c3802871a7569332f0g.jpg'],
            ['Hcd4538d043ba46f9bd23afc75fa99816F.jpg','H835d0a3c07de4c149b1c6fdd2d72e81dr.jpg','H120f722dbe864c9882c2eba18412c132v.jpg',],
            ['Hd1230305a560403e8612f7c6c3382e613.jpg','H5a651b12124c45d6a910a3466cccecf8P.jpg','H9a7e7b5a06524ac9baf56e95b281288bd.jpg','H0aaa066ff59448cfb4f048dcc75e2595E.jpg','H6d28eae74a04424dae30ba14e759867aG.jpg','H5211132c27ee4a02880eaf7f7957aaf4d.jpg'],
            ['H965fcfcf3d9749e390fd3131d5b69e19q.jpg','Ha4f0afac70e045b9bfe5296615fecd6dI.jpg','Hda59d11ca5c84016b5b2334931518321M.jpg','H5470c47116954411aae5d07803d72459z.jpg','H614305605fb04b27b955126137b4895fA.jpg'],
            ['H86115980c2594e0bb0e1bb0e8d89daeeQ.jpg','H73df7fd5fa754803a5f633af494c3cd1E.jpg','H4ff689004a234edf887a0fb1fd279da6G.jpg','Hf1c3d8ff253b4036b3288d0d8818748fZ.jpg'],
            ['H677042078a8f4bcf82a66abbed98265bl.jpg','H58660f31fc3e47c0bb333ce83b8f7678q.jpg','Had73d8342f25413f91fba2a5033aedffm.jpg','Hb6e52c105e9b493f8a07fed717f5939dz.jpg','Hd430a9a33cdc4034b81073d68bb1aab0v.jpg','Hb79240c0c475441cb7f999e4e842d928i.jpg'],
            ['H7c6651ede3a04f9599bcecee8a44f6fan.jpg','Hfa71568605c242fbb5ed9260d0575038Z.jpg','H035e4afaf41e4e8ca077a06962e1f73b0.jpg','H8ce6f0b663c8465c918b44d27d6bdd63u.jpg','H181f787ca0a04fd78f45c60c440cd676x.jpg'],
            ['Hb2f76ef06fdd4bd680726b3c26ee27ebp.jpg','Hbc5abd59b9514e64ae889c67e4aa55abs.jpg','H4242b684a6394e4c8289ea7426bfab1cy.jpg'],
            ['Ha9a65512256242d2a633cbd5541aa9a9a.jpg','He996b96ac9fe4b0ba8416282e933bfe6I.jpg','H271aaeac835443efa31bafe8ec47c4ec2.jpg','Hd28a2da8402a4e079352af6263334b8dy.jpg','Hc1ab81255ab94d0f87d52e85a057b904l.jpg','H72b8b96372724559b73e6baecd8bc57bv.jpg','H9543033a2dd94d449d4df102c7e25bddF.jpg','H3faeeef8c23f449c9d353a4dc861d904O.jpg','Hb0986d6eba834f34ae7fdb8ebd90c4eek.jpg'],
            // ['','','','','','','','',''],
        ];
        DB::table('photos')->truncate(); //2回目実行の際にシーダー情報をクリア
        // 配列を回す
        for($i = 0; $i < count($photos); $i++) { 
            $array = $photos[$i];
            $id = $i + 1;
            foreach($array as $a) {
                DB::table('photos')->insert([
                    'stock_id' => $id,
                    'imgpath' => $a,
                ]);
            }
        }
        // DB::table('photos')->insert([
        //     'stock_id' => 1,
        //     'imgpath' => 'filmcamera.jpg',
        // ]);
        // DB::table('photos')->insert([
        //     'stock_id' => 2,
        //     'imgpath' => 'iyahon.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 3,
        //     'imgpath' => 'clock.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 4,
        //     'imgpath' => 'earth.jpg',
        // ]);


        // DB::table('photos')->insert([
        //     'stock_id' => 5,
        //     'imgpath' => 'watch.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 6,
        //     'imgpath' => 'lens.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 7,
        //     'imgpath' => 'shanpan.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 8,
        //     'imgpath' => 'beer.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 9,
        //     'imgpath' => 'yakan.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 10,
        //     'imgpath' => 'kome.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 11,
        //     'imgpath' => 'pc.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 12,
        //     'imgpath' => 'aguiter.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 13,
        //     'imgpath' => 'eguiter.jpg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 14,
        //     'imgpath' => 'steamer.jpeg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 15,
        //     'imgpath' => 'mouse.jpeg',
        // ]);

        // DB::table('photos')->insert([
        //     'stock_id' => 16,
        //     'imgpath' => 'mobile.jpg',
        // ]);
    }
}
