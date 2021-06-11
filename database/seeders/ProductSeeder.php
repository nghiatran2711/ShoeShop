<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $brands=Brand::pluck('id')->toArray();
        $categories=Category::where('parent_id','<>',0)->pluck('id')->toArray();
        
        $listProductNames = [
            'Giày Grand Court',
            'Giày Fluidstreet',
            'Giày Cổ thấp Forum',
            'Breaknet',
            'Giày Adidas Alpha bounce',
            'White Snake Ace Sneakers',
            'Off-White Screener Sneakers',
            'Giày adidas 4D Future craft',
            'Black Web Horsebit Loafers',
            'Off-White Rhyton Sneakers',
            'Black GG Marmont Loafers',
            'balenciaga-speed-trainer',
            'balenciaga triple s red blue',
            'gucci bee sneaker',
            'gucci flashtrek sneaker',
            'Giày Nike air force',
            'Giày Nike Air Max',
            'nike-air',
        ];
        $listProductDescriptions = [
            'Inspired by the early 2000s, the Air Max Genome adds a fresh face to the Air Max line. Its technical, easy-to-style upper features a mixture of materials including sleek no-sew skins, airy mesh and durable TPU around the heel.',
            'The low-profile, full-length Air unit keeps the comfort while adding the perfect edge to your new, go-to Air Max. Made from at least 20% recycled materials by weight, the design lets you do good by looking good.',
            'It puts a natural twist on the classic with a catechu plant motif made from real plant-dyed colour, an embroidered botanical design and scientific infographic on the heel.',
            'Breathable mesh in the upper combines the comfort and durability you want with a wider fit at the toes.',
            'Get after those long runs with the Nike ZoomX Invincible Run Flyknit. A lightweight and responsive foam delivers a super-soft feel and helps deliver energy with every step. ',
            'The result is a shoe built like a racer, but made for your everyday training routine.',
            'The Nike Air Zoom Tempo NEXT% mixes durability with a design that helps push you towards your personal best. ',
            'Made from durable canvas and featuring heritage stitching and retro Swoosh design, it lets you blend sport and fashion.',
            'Honouring a history rooted in tennis culture, the NikeCourt Legacy Mule reinvents a classic with an easy-on design and comfy foam insole.',
            'Evolve your look and feel the comfort of everything Max. Made from at least 20% recycled materials by weight.',
            'From stitched overlays, to classic accents, to unbelievable comfort and overt 90s styling, it splices the must-haves of your favourite Air Max shoes onto 1 new design',
            'A new foam is lighter, softer and more responsive than previous versions, so you can keep moving in comfort. This product contains at least 20% recycled content.',
            'The sock-like fit and lightweight feel of the Nike Free Run 5.0 were made to transition from running to play. It combines the flexibility you love with a contained design that will help keep you close to the ground.'         
        ];
        $listThumbnails = [
            'products/thumbnails/_ntt6970__2__c1e06129158543989e911278a9314d98_medium.jpg',
            'products/thumbnails/17_7b6f64df28d24ed09005abf908443490_medium.jpg',
            'products/thumbnails/8022_7b28cb40d4fe40b6864ad2fc4a31a8a5_medium.png',
            'products/thumbnails/11339461_6345988_1000.jpg',
            'products/thumbnails/balenciaga-speed-trainer.jpg',
            'products/thumbnails/balenciaga-triple-s-red-blue-6-1.jpg',
            'products/thumbnails/Balenciga-triple -s.jpg',
            'products/thumbnails/burberry-rope-detail-patent-leather-pumps-brand-size-35-4075723.jpg',
            'products/thumbnails/burberry-flanagan-black-patent-leather-dring-stiletto-pumps-brand-size-35-8006955.jpg',
            'products/thumbnails/burberry-ladies-flanagan-pointed-toe-pump-brand-size-38-us-size-8-8008642.jpg',
            'products/thumbnails/burberry-rope-detail-patent-leather-pumps-brand-size-35-4075723.jpg',
            'products/thumbnails/dolce-&-gabbana-giày-nữ_d&gsho-cd1606ax38580999-medium-1.jpg',
            'products/thumbnails/Giày Thể Thao Adidas Alpha bounce.jpg',
            'products/thumbnails/Giày Thể Thao Adidas Alpha.jpg',
            'products/thumbnails/Giày Thể Thao Nike air force.jpg',
            'products/thumbnails/Giày Thể Thao Nike Air Max.jpg',
            'products/thumbnails/Giày Thể Thao XSPORT Adidas EQT.jpg',
            'products/thumbnails/Giay_Co_Thap_Forum_trang_FX6714_01_standard.jpg',
            'products/thumbnails/Giay_Grand_Court_trang_F36483_01_standard.jpg',
            'products/thumbnails/Giay_QT_Racer_2.0_Hong_FY8311_01_standard.jpg',
            'products/thumbnails/gucci-bee-sneaker.jpg',
            'products/thumbnails/gucci-flashtrek-sneaker-with-removable-crystals_-brand-size-34-_-us-size-4-_-541445_ggz50_9081.jpg',
            'products/thumbnails/J04BNB03TBCC0735-00.jpg',
            'products/thumbnails/J04CVA00022C9006-00.jpg',
            'products/thumbnails/J046NA0AU14C0661-100.jpg',
            'products/thumbnails/J154MC0ASAJC1007-00.jpg',
            'products/thumbnails/nike-air.jpg',
            'products/thumbnails/ntt_0397__1__a31401561b3547aeadf9e91219b85108_medium.jpg',
        ];
        $listImages = [
            'product_images/_ntt6970__2__c1e06129158543989e911278a9314d98_medium.jpg',
            'product_images/17_7b6f64df28d24ed09005abf908443490_medium.jpg',
            'product_images/8022_7b28cb40d4fe40b6864ad2fc4a31a8a5_medium.png',
            'product_images/11339461_6345988_1000.jpg',
            'product_images/balenciaga-speed-trainer.jpg',
            'product_images/balenciaga-triple-s-red-blue-6-1.jpg',
            'product_images/Balenciga-triple -s.jpg',
            'product_images/burberry-rope-detail-patent-leather-pumps-brand-size-35-4075723.jpg',
            'product_images/burberry-flanagan-black-patent-leather-dring-stiletto-pumps-brand-size-35-8006955.jpg',
            'product_images/burberry-ladies-flanagan-pointed-toe-pump-brand-size-38-us-size-8-8008642.jpg',
            'product_images/burberry-rope-detail-patent-leather-pumps-brand-size-35-4075723.jpg',
            'product_images/dolce-&-gabbana-giày-nữ_d&gsho-cd1606ax38580999-medium-1.jpg',
            'product_images/Giày Thể Thao Adidas Alpha bounce.jpg',
            'product_images/Giày Thể Thao Adidas Alpha.jpg',
            'product_images/Giày Thể Thao Nike air force.jpg',
            'product_images/Giày Thể Thao Nike Air Max.jpg',
            'product_images/Giày Thể Thao XSPORT Adidas EQT.jpg',
            'product_images/Giay_Co_Thap_Forum_trang_FX6714_01_standard.jpg',
            'product_images/Giay_Grand_Court_trang_F36483_01_standard.jpg',
            'product_images/Giay_QT_Racer_2.0_Hong_FY8311_01_standard.jpg',
            'product_images/Giay_QT_Racer_2.0_Hong_FY8311_01_standard.jpg',
            'product_images/gucci-bee-sneaker.jpg',
            'product_images/J04CVA00022C9006-00.jpg',
            'product_images/J154MC0ASAJC1007-00.jpg',
        ];
        $is_feature=[0,1];
        for ($i = 0; $i < 40; $i++) {
            $product = [
                'name' => $listProductNames[array_rand($listProductNames)],
                'description' => $listProductDescriptions[array_rand($listProductDescriptions)],
                'thumbnail' => $listThumbnails[array_rand($listThumbnails)],
                'category_id' => $categories[array_rand($categories)],
                'brand_id'=>$brands[array_rand($brands)],
                'is_feature' => $is_feature[array_rand($is_feature)],
                'status' => 1,
            ];
            $saveProduct = Product::create($product);

            // save product_details
            $productDetail = [
                'content' => $listProductDescriptions[array_rand($listProductDescriptions)],
                'product_id' => $saveProduct->id, // get ID inserted at step above
            ];
            ProductDetail::create($productDetail);

            // save product_images
            for ($j = 0; $j < 6; $j++) {
                $productImage = [
                    'url' => $listImages[array_rand($listImages)],
                    'product_id' => $saveProduct->id,
                ];
                ProductImage::create($productImage);
            }
        }

    }
}
