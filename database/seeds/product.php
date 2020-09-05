<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['product_name'=>'Áo Real Madrid sân nhà','link_image'=>'http://aobongda.net/pic/Product/74662bdc5_637291954031840847_HasThumb_Thumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>2],
            ['product_name'=>'Áo Real Madrid sân khách','link_image'=>'http://aobongda.net/pic/Product/3a560b359_637120861336573946_HasThumb_Thumb.png.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>2],
            ['product_name'=>'Áo Barcelona sân nhà','link_image'=>'http://aobongda.net/pic/Product/fed6111b9_636935369097468116_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>2],
            ['product_name'=>'Áo Barcelona sân khách','link_image'=>'http://aobongda.net/pic/Product/1929941e2_637008633540391508_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>2],
            ['product_name'=>'Áo Manchester United sân nhà','link_image'=>'http://aobongda.net/pic/Product/d6dab046c_637291971646483193_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>1],
            ['product_name'=>'Áo Manchester United sân khách','link_image'=>'http://aobongda.net/pic/Product/4d6cd6e43_637291966402434144_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>1],
            ['product_name'=>'Áo Manchester City sân nhà','link_image'=>'http://aobongda.net/pic/Product/afc4b9b3d_637280758810418852_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>1],
            ['product_name'=>'Áo Manchester City sân khách','link_image'=>'http://aobongda.net/pic/Product/f71bd8412_637286968513149646_HasThumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>1,'id_small_category'=>1],
            ['product_name'=>'Áo đội tuyển Anh','link_image'=>'http://aobongda.net/pic/Product/4eef17af7_637280769520639174_HasThumb_Thumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>2,'id_small_category'=>6],
            ['product_name'=>'Áo đội tuyển Brazil','link_image'=>'http://aobongda.net/pic/Product/031dafd32_636935370146928141_HasThumb_Thumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>2,'id_small_category'=>7],
            ['product_name'=>'Áo đội tuyển Nhật Bản','link_image'=>'http://aobongda.net/pic/Product/43cd6c55d_637093481850590768_HasThumb_Thumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>2,'id_small_category'=>8],
            ['product_name'=>'Áo đội tuyển Ai Cập','link_image'=>'http://aobongda.net/pic/Product/Ai-ca_636654354245367322_HasThumb_Thumb.jpg.ashx','price'=>100000,'sale_percent'=>0,'description'=>'Áo bóng đá','id_large_category'=>2,'id_small_category'=>9]
        ]);
    }
}
