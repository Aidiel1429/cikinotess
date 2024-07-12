 @section('title')
     Dashboard
 @endsection
 
 <x-layout>
    <div class="container mx-auto px-5 md:flex md:flex-wrap md:gap-3 md:mx-auto md:justify-center">
        <div class="w-full container mt-6 md:w-[350px]  lg:w-52 xl:w-64">
            <div class="bg-white w-full shadow p-2 rounded h-28">
                <div class="text-center mt-2">
                    <p class="font text-[#767676]">Total Transaksi</p>
                </div>
                <hr class="mt-4">
                <div class="text-center mt-3">
                    <p class="font-semibold text-slate-700 text-xl">{{ count($data) }}</p>
                </div>
            </div>
        </div>
        <div class="w-full container mt-6 md:w-[350px] lg:w-52 xl:w-64">
            <div class="bg-white w-full shadow p-2 rounded h-28">
                <div class="text-center mt-2">
                    <p class="font text-[#767676]">Untung</p>
                </div>
                <hr class="mt-4">
                <div class="text-center mt-3">
                    <p class="font-semibold text-first text-xl">Rp {{ number_format($untung, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="w-full container mt-6 md:w-[350px] md:mt-0 lg:w-52 lg:mt-6 xl:w-64">
            <div class="bg-white w-full shadow p-2 rounded h-28">
                <div class="text-center mt-2">
                    <p class="font text-[#767676]">Pemasukan</p>
                </div>
                <hr class="mt-4">
                <div class="text-center mt-3">
                    <p class="font-semibold text-second text-xl">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="w-full container mt-6 md:w-[350px] md:mt-0 lg:w-52 lg:mt-6 xl:w-64">
            <div class="bg-white w-full shadow p-2 rounded h-28">
                <div class="text-center mt-2">
                    <p class="font text-[#767676]">Pengeluaran</p>
                </div>
                <hr class="mt-4">
                <div class="text-center mt-3">
                    <p class="font-semibold text-third text-xl">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="container mx-auto px-5">
        <div class="w-full container mt-6  mb-28 lg:px-14 xl:px-[216px]">
            <div>
                <p class="text-xl font-semibold text-slate-700">Daftar Transaksi</p>
            </div>
            @if (@session('success'))
            <div x-data="{ showAlert: true }">
                <div class="bg-green-100 w-full p-2 mb-3 border border-green-400 rounded flex justify-between text-lg items-center text-slate-600 px-3 mt-3" x-show="showAlert" x-transition>
                    <p>{{ session('success') }}</p>
                    <i class="fa-solid fa-xmark" @click="showAlert = false"></i>
                </div>
            </div>
            @endif
    
            @foreach ($data as $item)
            <div class="mt-2" x-data="{open: false}">
                <div class="bg-white shadow p-3 rounded flex gap-3 justify-between mt-3">
                    <div class="text-sm text-[#616161]">
                        <p class="font-semibold md:text-base">{{ $item->nama }}</p>
                        <p class="md:text-base">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                        <p class="font-semibold md:text-base xl:hidden">{{ $item->kategori }}</p>
                        <p class="font-semibold md:text-base">{{ $item->status }}</p>
                    </div>
                    <div class="hidden xl:flex xl:items-center text-[#616161]">
                        <p class="font-semibold md:text-base">{{ $item->kategori }}</p>
                    </div>
                    <div class="flex text-sm items-center gap-2 font-semibold">
                        <p class="text-second md:text-lg">Rp {{ number_format($item->pemasukan, 0, ',', '.') }}</p>
                        <p class="text-third md:text-lg">Rp {{ number_format($item->pengeluaran, 0, ',', '.') }}</p>
                    </div>
                    <div class="hidden items-center justify-center xl:flex">
                        <a href="{{ route('edit', ['id' => $item->id]) }}">
                            <button class="text-xl items-center bg-yellow-300 rounded-lg p-2 w-10 text-white"><i class="fa-solid fa-edit"></i></button> <!-- Edit button -->
                        </a>
                        <form action="{{ route('delete', $item->id) }}" method="post" oninput="return confirm('Yakin Ingin Hapus Data?')">
                            @csrf
                            @method('delete')
                            <button class="text-xl items-center ml-2 bg-red-500 rounded-lg p-2 w-10 text-white"><i class="fa-solid fa-trash"></i></button>
                        </form>
                         <!-- Delete button -->
                    </div>
                    <div class="flex items-center text-[#8d8d8d] text-xl cursor-pointer md:text-2xl xl:hidden" @click="open = !open">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </div>
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <div class="bg-white absolute mt-1 right-5 text-center shadow-lg rounded-lg p-3 ml-6 leading-8 flex-col justify-center">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('edit', ['id' => $item->id]) }}">
                                <button class="text-xl items-center bg-yellow-300 rounded-lg p-2 w-10 text-white"><i class="fa-solid fa-edit"></i></button> <!-- Edit button -->
                            </a>
                            <form action="{{ route('delete', $item->id) }}" method="post" oninput="return confirm('Yakin Ingin Hapus Data?')">
                                @csrf
                                @method('delete')
                                <button class="text-xl items-center ml-2 bg-red-500 rounded-lg p-2 w-10 text-white"><i class="fa-solid fa-trash"></i></button>
                            </form>
                             <!-- Delete button -->
                        </div> 
                    </div>
                </div> 
            </div>
            @endforeach
            
            
        </div>
    </div>
    

    <a href="{{ route('tambah') }}">
        <div class="fixed bottom-10 left-1/2 transform -translate-x-1/2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-10 h-10 rounded-full text-xl"><i class="fa-solid fa-plus"></i></button> <!-- Add button -->
        </div>
    </a>
 </x-layout>