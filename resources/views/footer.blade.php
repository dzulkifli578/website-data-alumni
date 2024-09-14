<footer class="bg-base-300 text-base-content py-6">
    <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center lg:items-start space-y-6 lg:space-y-0">
        <!-- Flex Column (Logo, Nama Instansi, Alamat) -->
        <div class="flex flex-col items-center lg:items-start text-center lg:text-left">
            <div class="flex flex-row items-center justify-center lg:justify-start mb-6">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Logo" class="w-auto h-20 mr-6">
                <div class="flex flex-col">
                    <p class="text-left text-2xl font-bold mb-2">SMK Swadhipa 2 Natar</p>
                    <p class="text-lg font-medium mb-2 text-wrap text-left lg:text-left">Teknologi Manufaktur dan Rekayasa, Energi dan
                        Pertambangan, dan TIK</p>
                </div>
            </div>
            <p class="text-xl text-left font-medium mb-2">Jl. Swadhipa No.217, Bumisari, Kec. Natar, Kabupaten Lampung Selatan, Lampung 35362</p>
        </div>

        <!-- Flex Row (Kontributor, Ikuti Kami) -->
        <div class="flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0 lg:space-x-4 text-center lg:text-left">
            <!-- Kontributor -->
            <a href="{{ route('kontributor') }}" class="text-xl font-bold">Kontributor</a>
            <p class="text-xl font-medium hidden lg:block">|</p>
            <!-- Ikuti Kami & Sosial Media Links -->
            <div class="flex flex-col lg:flex-row items-center space-y-4 lg:space-y-0 lg:space-x-4">
                <p class="text-xl font-medium">Ikuti Kami</p>
                <div class="flex space-x-4">
                    <a href="https://www.tiktok.com/@smkswadhipa2natar" class="text-primary" aria-label="TikTok" target="_blank">
                        <span class="fab fa-tiktok text-lg"></span>
                    </a>
                    <a href="https://www.instagram.com/smkswadhipa2/" class="text-primary" aria-label="Instagram" target="_blank">
                        <span class="fab fa-instagram text-lg"></span>
                    </a>
                    <a href="https://www.youtube.com/channel/UCUfWW6o3m9Xn_ZbscXubzbQ" class="text-primary" aria-label="YouTube" target="_blank">
                        <span class="fab fa-youtube text-lg"></span>
                    </a>
                    <a href="https://www.facebook.com/smkswadhipa2" class="text-primary" aria-label="Facebook" target="_blank">
                        <span class="fab fa-facebook-f text-lg"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
