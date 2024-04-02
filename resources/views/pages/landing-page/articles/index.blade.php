@extends('pages.landing-page.layouts.main')

@section('title', $title)

@section('additional_links')
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center gap-y-5">
        {{-- Search --}}
        <div class="w-full my-5">
            <label for="search-word" class="block mb-2 text-sm font-bold text-midnight-blue">Cari Kata</label>
            <input type="text" id="search-word"
                class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                placeholder="e.g. Teknologi" name="search-word" value="">

            <div class="flex items-center mt-3 space-x-3">
                <button id="search-word-btn"
                    class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none focus:ring focus:ring-blue-300 bg-dodger-blue">
                    Search!
                </button>
                <p class="text-sm text-gray-500" id="hs-input-helper-text">Jumlah: <span id="word-count">-</span>
                </p>
            </div>
        </div>

        {{-- Replace --}}
        <div class="w-full mb-5">
            <label for="from-word" class="block mb-2 text-sm font-bold text-midnight-blue">Ganti Kata</label>

            <div class="flex space-x-5">
                <div class="w-full">
                    <input type="text" id="from-word"
                        class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                        placeholder="e.g. adalah" name="from-word" value="">

                </div>
                <div class="w-full">
                    <input type="text" id="to-word"
                        class="border placeholder-ash-grey/50 border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5"
                        placeholder="e.g. ialah" name="to-word" value="">
                </div>
            </div>

            <div class="mt-3">
                <button id="replace-word"
                    class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none focus:ring focus:ring-blue-300 bg-dodger-blue">
                    Replace!
                </button>
            </div>
        </div>

        {{-- Article --}}
        <div>
            <div
                class="py-3 flex items-center text-sm text-gray-800 before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-gray-600 dark:after:border-gray-600">
                Start</div>

            <article id="article">
                Dalam kehidupan suatu negara, pendidikan memegang peranan yang amat penting untuk menjamin kelangsungan
                hidup
                negara dan bangsa, karena pendidikan merupakan wahana untuk meningkatkan dan mengembangkan kualitas sumber
                daya
                manusia. Seiring dengan perkembangan teknologi komputer dan teknologi informasi, sekolah-sekolah di
                Indonesia
                sudah waktunya mengembangkan Sistem Informasi manajemennya agar mampu mengikuti perubahan jaman.

                SISKO mampu memberikan kemudahan pihak pengelola menjalankan kegiatannya dan meningkatkan kredibilitas dan
                akuntabilitas sekolah dimata siswa, orang tua siswa, dan masyakat umumnya.Penerapan teknologi informasi
                untuk
                menunjang proses pendidikan telah menjadi kebutuhan bagi lembaga pendidikan di Indonesia. Pemanfaatan
                teknologi
                informasi ini sangat dibutuhkan untuk meningkatkan efisiensi dan produktivitas bagi manajemen pendidikan.
                Keberhasilan dalam peningkatan efisiensi dan produktivitas bagi manajemen pendidikan akan ikut menentukan
                kelangsungan hidup lembaga pendidikan itu sendiri. Dengan kata lain menunda penerapan teknologi informasi
                dalam
                lembaga pendidikan berarti menunda kelancaran pendidikan dalam menghadapi persaingan global.

                Pemanfaatan teknologi informasi diperuntukkan bagi peningkatan kinerja lembaga pendidikan dalam upayanya
                meningkatkan kualitas Sumber Daya Manusia Indonesia. Guru dan pengurus sekolah tidak lagi disibukkan oleh
                pekerjaan-pekerjaan operasional, yang sesungguhnya dapat digantikan oleh komputer. Dengan demikian dapat
                memberikan keuntungan dalam efisien waktu dan tenaga.

                Penghematan waktu dan kecepatan penyajian informasi akibat penerapan teknologi informasi tersebut akan
                memberikan kesempatan kepada guru dan pengurus sekolah untuk meningkatkan kualitas komunikasi dan pembinaan
                kepada siswa. Dengan demikian siswa akan merasa lebih dimanusiakan dalam upaya mengembangkan kepribadian dan
                pengetahuannya.

                Sebagai contoh yang paling utama adalah sistem penjadwalan yang harus dilakukan setiap awal semester.
                Biasanya
                membutuhkan waktu lama untuk menyusun penjadwalan. Dengan SISKO dapat selesai dalam waktu singkat. Untuk
                mempermudah bagian administrasi kurikulum sekolah, SISKO menyediakan fasilitas istimewa yang merupakan inti
                dari
                sistem kurikulum sekolah yaitu membantu dalam pembuatan penjadwalan mata pelajaran sekolah yang dapat
                diproses
                tidak lebih lama dari 10 menit. Administrator hanya akan memasukkan kondisi dari masing-masing guru yang
                akan
                mengajar baik itu dalam 1 minggu seorang guru dapat mengajar berapa jam, selain itu dapat juga melakukan
                pemesanan tempat dan penempatan hari libur masing-masing guru dalam 1 minggu masa mengajar. Setelah semua
                kondisi dimasukkan, sistem akan memproses semua data tersebut sehingga menghasilkan jadwal yang optimal dan
                dapat langsung dipakai karena sistem akan mendeteksi sehingga tidak akan ada jadwal yang bertumpukan satu
                dengan
                yang lainnya.

                Setelah semua kondisi dimasukkan, sistem akan memproses semua data tersebut sehingga menghasilkan jadwal
                yang
                optimal dan dapat langsung dipakai karena sistem akan mendeteksi sehingga tidak akan ada jadwal yang
                bertumpukan
                satu dengan yang lainnya. Setelah permasalahan penjadwalan dapat ditangani dengan baik, hal yang tidak kalah
                pentingnya adalah memasukkan data siswa.

                Program SISKO telah menyediakan fasilitas untuk penanganan penilaian siswa yang secara langsung memasukkan
                nilai
                ke dalam raport dan siap dicetak. Untuk sistem penilaian siswa, yang dapat melakukan pengisian hanya Guru
                yang
                mengajar mata pelajaran. Sistem penilaian telah disesuaikan dengan KBK sehingga masing-masing guru dapat
                memasukkan deskripsi narasi dari mata pelajaran. Untuk menampilkan data penilaian dapat disesuaikan kembali
                dengan kebijaksanaan dari masing-masing lembaga pendidikan apakah ingin menampilkan data nilai akhir siswa
                maupun menampilkan data nilai siswa setiap kali mengadakan test ataupun tugas tertentu.

                Selain Modul untuk penjadwalan dan Modul Penilaian siswa, SISKO juga memberikan fasilitas untuk bagian
                administrasi keuangan sekolah dalam hal pembayaran SPP siswa. Bagian administrasi dapat langsung mengecek
                siapa
                siswa yang mempunyai tunggakan SPP dan untuk detail histori pembayaran SPP dari masing-masing siswa dapat
                dicetak seperti mencetak buku tabungan di bank sehingga mempermudah pekerjaan pihak administrasi keuangan.
                Administrasi keuangan dapat langsung melakukan pengaturan data pembayaran masing-masing siswa sesuai dengan
                kebutuhan dan dapat diubah sewaktu-waktu apabila ada kenaikan pembayaran SPP. Apabila siswa tersebut akan
                melakukan pembayaran, petugas dapat langsung memasukkan data. Hal sama juga dapat dilakukan untuk data
                pembayaran Sumbangan Sukarela dan Tabungan Karyawisata.
            </article>

            <div
                class="py-3 flex items-center text-sm text-gray-800 before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-gray-600 dark:after:border-gray-600">
                End</div>
        </div>

        {{-- Sort --}}
        <div class="w-full">
            <label for="sort-word" class="block mb-2 text-sm font-bold text-midnight-blue">Urutkan Kata</label>
            <select id="sort-word"
                class="border border-pale-silver text-slate-grey text-sm rounded-md transition-all duration-300 outline-none focus:ring-royal-blue focus:border-royal-blue ring-royal-blue block w-full p-2.5">
                <option value="asc">A-Z</option>
                <option value="desc">Z-A</option>
            </select>

            <div class="mt-3">
                <button id="sort-word-btn"
                    class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none focus:ring focus:ring-blue-300 bg-dodger-blue">
                    Sort!
                </button>
                <button id="sort-word-reset"
                    class="inline-flex items-center px-3 py-2 text-sm font-bold text-center text-white transition-all duration-300 rounded-lg outline-none focus:ring focus:ring-blue-300 bg-dodger-blue">
                    Reset
                </button>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    @vite(['resources/js/core/search-word.js'])
    @vite(['resources/js/core/replace-word.js'])
    @vite(['resources/js/core/sort-word.js'])
@endsection
