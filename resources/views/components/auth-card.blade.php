<div class="min-h-screen flex sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    {{-- <div class="flex flex-row">
        <h2 class="font-bold text-4xl">Aplikasi Perencanaan, Pencatatan dan Evaluasi Proyek</h2>
    </div> --}}
    <div class="flex flex-col md:flex-row">
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qwATcU.json" background="transparent"
            speed="1" loop autoplay></lottie-player>
    </div>
    <div
        class="w-full flex flex-col items-stretch sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
