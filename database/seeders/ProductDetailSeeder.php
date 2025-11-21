<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailSeeder extends Seeder
{
    public function run(): void
    {
        $details = [
            'Topi Rajut Pria' => [
                'description' => "Topi rajut pria ini terbuat dari benang pilihan dengan tekstur lembut dan lentur, memberikan kenyamanan maksimal saat digunakan dalam berbagai cuaca. Warna dan pola rajutan yang modern membuatnya cocok dipadukan dengan berbagai gaya pakaian, baik kasual maupun semi-formal.\n\nSelain itu, topi ini dirancang dengan sirkulasi udara yang baik sehingga tidak membuat kepala terasa panas. Dengan bahan yang tahan lama, topi rajut ini menjadi pilihan ideal bagi pria yang ingin tampil trendi namun tetap fungsional.",
                'discount_price' => 139999,
            ],
            'Topi Rajut Wanita' => [
                'description' => "Topi rajut wanita hadir dengan desain elegan dan feminin yang mampu menambah keanggunan pemakainya. Terbuat dari benang premium dengan kualitas tinggi, topi ini memberikan rasa hangat di musim dingin dan tetap nyaman di cuaca sejuk.\n\nWarna yang lembut serta pola rajut yang halus menjadikan topi ini cocok untuk digunakan dalam kegiatan santai maupun acara luar ruangan. Kombinasi desain dan kenyamanan membuatnya menjadi salah satu aksesori favorit bagi wanita modern.",
                'discount_price' => 179999,
            ],
            'Kursi Santai Jati Mix Rotan' => [
                'description' => "Kursi santai ini dibuat dari kombinasi kayu jati solid dan anyaman rotan alami yang memberikan kesan estetik serta eksklusif pada ruangan Anda. Setiap detail dikerjakan secara teliti oleh pengrajin berpengalaman, memastikan kekuatan dan kenyamanan maksimal.\n\nSelain tampil menawan, kursi ini juga tahan lama dan cocok digunakan di ruang tamu, teras, maupun taman. Desainnya yang ergonomis membuat pengguna dapat bersantai dengan posisi duduk yang nyaman sepanjang hari.",
                'discount_price' => 720000,
            ],
            'Lampu Hias Anyaman' => [
                'description' => "Lampu hias anyaman ini memberikan nuansa alami dan hangat dengan cahaya lembut yang memanjakan mata. Dibuat dari bahan serat alami yang ramah lingkungan, lampu ini cocok digunakan sebagai penerangan ruang tamu, kamar tidur, atau kafe berkonsep rustic.\n\nProses pembuatannya dilakukan dengan teknik anyaman tradisional, menghasilkan bentuk unik dengan sentuhan artistik. Tidak hanya sebagai sumber cahaya, lampu ini juga berfungsi sebagai elemen dekoratif yang mempercantik ruangan.",
                'discount_price' => 1300000,
            ],
            'keranjang Belanja' => [
                'description' => "Keranjang belanja ini terbuat dari bahan rotan alami berkualitas tinggi, memberikan kesan klasik sekaligus ramah lingkungan. Dibuat dengan teknik anyaman tangan yang kuat, keranjang ini mampu menampung barang belanjaan dengan aman tanpa mudah rusak.\n\nSelain digunakan untuk berbelanja, keranjang ini juga dapat dimanfaatkan sebagai tempat penyimpanan serbaguna di rumah. Desainnya yang sederhana namun elegan membuatnya cocok menjadi elemen dekorasi interior bernuansa alami.",
                'discount_price' => 90000,
            ],
            'Tottebag Denim' => [
                'description' => "Totebag denim ini memiliki desain kasual dan minimalis yang mudah dipadukan dengan berbagai gaya berpakaian. Terbuat dari bahan denim tebal berkualitas tinggi, tas ini awet digunakan untuk aktivitas sehari-hari seperti kuliah, bekerja, atau berbelanja.\n\nKapasitasnya cukup luas untuk menampung berbagai kebutuhan, dilengkapi dengan jahitan kuat di setiap sisi. Dengan tampilan modern dan warna netral, totebag ini cocok bagi siapa pun yang mengutamakan gaya dan fungsi.",
                'discount_price' => 199000,
            ],
            'Lampu Botol' => [
                'description' => "Lampu botol ini merupakan hasil kreativitas daur ulang botol kaca bekas yang diubah menjadi produk dekoratif unik. Cahaya yang dihasilkan lembut dan menenangkan, sangat cocok untuk menciptakan suasana relaks di ruangan Anda.\n\nDesainnya yang artistik menjadikan lampu ini cocok untuk dekorasi rumah bergaya minimalis, kafe, atau ruang kerja. Selain estetika, penggunaannya juga mendukung gerakan ramah lingkungan dengan mengurangi limbah kaca.",
                'discount_price' => 700000,
            ],
            'Hiasan kepala Binatang' => [
                'description' => "Hiasan kepala berbentuk binatang ini dibuat dari bahan alami yang ringan dan kuat, menghadirkan nuansa etnik yang khas. Setiap produk dibuat secara handmade sehingga memiliki karakter dan keunikan tersendiri.\n\nCocok digunakan sebagai dekorasi dinding, kostum acara seni, atau properti pemotretan, hiasan ini menjadi simbol kreativitas yang menggabungkan seni tradisional dan modernitas dalam satu karya.",
                'discount_price' => 449000,
            ],
            'Rompi Plastik' => [
                'description' => "Rompi plastik ini dirancang dari bahan daur ulang berkualitas tinggi yang kuat namun tetap fleksibel. Selain tahan air, bahan ini juga mudah dibersihkan dan cocok digunakan untuk aktivitas luar ruangan seperti camping atau kerja lapangan.\n\nDesainnya yang ergonomis memberikan kenyamanan dalam bergerak tanpa membatasi aktivitas. Produk ini merupakan bentuk nyata dari mode berkelanjutan yang mengedepankan fungsi dan kesadaran lingkungan.",
                'discount_price' => 290000,
            ],
            'Peralatan Makan Kayu' => [
                'description' => "Peralatan makan ini terbuat dari kayu alami yang telah diproses secara higienis, sehingga aman untuk makanan dan minuman. Permukaannya halus dan tidak menyerap bau, menjadikannya pilihan ideal untuk hidangan tradisional maupun modern.\n\nSelain fungsional, desainnya yang sederhana menambah nilai estetika saat disajikan di meja makan. Produk ini juga ramah lingkungan dan dapat digunakan berulang kali tanpa mengurangi kualitasnya.",
                'discount_price' => 45000,
            ],
            'Gayung Batok kelapa' => [
                'description' => "Gayung batok kelapa ini mengusung konsep tradisional dengan sentuhan alami dari bahan kelapa asli. Pegangan kayunya yang kokoh memberikan kenyamanan saat digunakan untuk mandi atau mencuci.\n\nSelain sebagai perlengkapan mandi, gayung ini juga dapat digunakan sebagai elemen dekoratif bernuansa etnik di rumah atau penginapan bertema alam. Produk ini menjadi bukti keindahan karya lokal yang fungsional dan artistik.",
                'discount_price' => 15000,
            ],
            'Tas Rajut Eceng Gondok' => [
                'description' => "Tas rajut eceng gondok ini merupakan hasil karya pengrajin lokal dengan teknik anyaman tradisional. Serat eceng gondok yang kuat membuat tas ini awet, ringan, dan nyaman dibawa ke mana saja.\n\nSelain fungsional, desainnya yang modern dengan sentuhan alami menjadikan tas ini cocok untuk berbagai acara. Setiap produk memiliki keunikan tersendiri, mencerminkan keindahan dan kreativitas produk ramah lingkungan.",
                'discount_price' => 259999,
            ],
        ];

        foreach ($details as $name => $data) {
            $product = Product::where('name', $name)->first();
            if ($product) {
                ProductDetail::updateOrCreate(
                    ['product_id' => $product->id],
                    [
                        'description' => $data['description'],
                        'discount_price' => $data['discount_price'],
                    ]
                );
            }
        }
    }
}
