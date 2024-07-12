@section('title')
    Hutang
@endsection

<x-layout>
    <div class="container w-full mx-auto px-5 mt-6 lg:px-[78px] xl:px-60">
        
            <div class="w-full container mt-6 mb-5">
                <div class="bg-white w-full shadow p-2 rounded h-28">
                    <div class="text-center mt-2">
                        <p class="font text-[#767676]">Total Hutang</p>
                    </div>
                    <hr class="mt-4">
                    <div class="text-center mt-3">
                        <p class="font-semibold text-third text-xl">Rp {{ number_format($totalHutang, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <h1 class="text-xl font-semibold text-slate-700 mb-4">Daftar Hutang</h1>
            @if (@session('success'))
            <div x-data="{ showAlert: true }">
                <div class="bg-green-100 w-full p-2 mb-3 border border-green-400 rounded flex justify-between text-lg items-center text-slate-600 px-3 mt-3" x-show="showAlert" x-transition>
                    <p>{{ session('success') }}</p>
                    <i class="fa-solid fa-xmark" @click="showAlert = false"></i>
                </div>
            </div>
            @endif
            @foreach ($hutang as $data)
                <div class="bg-white w-full shadow p-2 rounded flex font-semibold justify-between px-10 py-5 mb-3">
                    <p class="text-slate-700">{{ $data->buyerName }}</p>
                    <p class="text-third">Rp {{ number_format($data->pemasukan, 0, ',', '.') }}</p>
                </div>
            @endforeach
    </div>
</x-layout>