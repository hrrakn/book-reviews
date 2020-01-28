<?php

use Illuminate\Database\Seeder;

class BookstoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookstores')->insert([
            [
                'name' => 'BOOKS ルーエ',
                'slug' => 'BOOKS ルーエ',
                'place' => '武蔵野市吉祥寺本町1－14－3',
                'time' => '9：00～22：30',
                'url' => 'http://www.books-ruhe.co.jp/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQlDyOT3S4kOJKv2SlR2c9r7CnMqwMHdgcuxSlB_QL0hy3C4xrL',
                'category_id' => 1,
            ],
            [
                'name' => 'にゃんこ堂',
                'slug' => 'にゃんこ堂',
                'place' => '千代田区神田神保町',
                'time' => '10：00～21：00',
                'url' => 'http://nyankodo.jp/',
                'img' => 'https://s3-ap-northeast-1.amazonaws.com/peco-images/images/195855.jpg',
                'category_id' => 1,
            ],
            [
                'name' => '旅の本屋 のまど',
                'slug' => '旅の本屋 のまど',
                'place' => '杉並区西荻来た3－12－10',
                'time' => '12:00～22:00',
                'url' => 'http://www.nomad-books.co.jp/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ6GShZYLbrGFY9kMGPsXRCd1LN07fvjHcLb2E-t6GDkZ-Az6cq',
                'category_id' => 1,
            ],
            [
                'name' => 'Amleteron',
                'slug' => 'Amleteron',
                'place' => '東京都杉並区高円寺北2-18-10',
                'time' => '14:00~20:00',
                'url' => 'http://amleteron.blogspot.com/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR4fkz8q4udP3Gvk2JW6JTydzcUWyvrgYDbdWYy4erg7xfHFcxx',
                'category_id' => 2,
            ],
            [
                'name' => '古書 日月堂',
                'slug' => '古書 日月堂',
                'place' => '港区南青山6－1－6',
                'time' => '12:00～20:00',
                'url' => 'http://www.nichigetu-do.com/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT1P1elmvE-sqAs_rIQue5o9-fPx5DZQva9JYIz-k3_moywxPEo',
                'category_id' => 2,
            ],
            [
                'name' => '古本カフェ・フォスフォレッセンス',
                'slug' => '古本カフェ・フォスフォレッセンス',
                'place' => '三鷹市上連雀8－4－1',
                'time' => '12:00～19:00',
                'url' => 'http://dazaibookcafae.com/',
                'img' => 'https://www.asahicom.jp/and_w/wp-content/uploads/2015/05/g_01_i.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'アール座読書館',
                'slug' => 'アール座読書館',
                'place' => '杉並区高円寺南3－57－6',
                'time' => '13:30~22:30',
                'url' => 'http://r-books.jugem.jp/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRldg-9LFgk69FifTqTCVcFmNf43i3jyBV4Ur_XlqS7A4QSFgK1',
                'category_id' => 3,
            ],
            [
                'name' => 'ほんのみせ コトノハ',
                'slug' => 'ほんのみせ コトノハ',
                'place' => '東京都国立市中1-19-1 2F',
                'time' => '11:00-20:00',
                'url' => 'https://kotonohabookcafe.com/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTgAtxOs63IWrIjkM4nvT0nENA_A8XaptcTxcqvx8JUKIbq2Dl8',
                'category_id' => 3,
            ],
            [
                'name' => '森の図書館',
                'slug' => '森の図書館',
                'place' => '東京都渋谷区円山町5-3 萩原ビル3F',
                'time' => '平日 12:00 – 17:00 / 18:00 – 24:00<br>
                            土日祝 12:00 – 24:00',
                'url' => 'https://morinotosyoshitsu.com/',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQMa7e7zRItUJ8iAq7nVzbbp1LN1GyFHI4yfcuTbBDB5y9EoKMo',
                'category_id' => 3,
            ],
        ]);
    }
}
