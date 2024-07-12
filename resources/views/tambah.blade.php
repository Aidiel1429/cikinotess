@section('title')
    Tambah Data
@endsection

<x-layout>
    <div class="container w-full mx-auto px-5 mt-6 lg:px-[78px] xl:px-60">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div x-data="{ showAlert: true }">
                    <div class="bg-red-100 w-full p-2 mb-3 border border-red-400 rounded flex justify-between text-lg items-center text-slate-600 px-3 mt-3" x-show="showAlert" x-transition>
                        <p>{{ $error }}</p>
                        <i class="fa-solid fa-xmark" @click="showAlert = false"></i>
                    </div>
                </div>
            @endforeach
        @endif
        
        <form action="{{ route('create') }}" method="post">
            @csrf
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="pemasukan" class="text-xl font-semibold text-slate-600">Pemasukan</label><br>
                    <div class="flex items-center py-2">
                        <span class="text-xl text-gray-600 bg-slate-200 p-2 rounded-s h-10 border-y border-l border-gray-300 font-semibold flex items-center">Rp</span>
                        <input type="text" name="pemasukan" id="pemasukan" class=" border-gray-300 outline-none text-xl p-1 rounded-e w-full h-10 border-y border-r">
                    </div>
                </div>
                <hr class="mb-3 text-slate-300">
                <div class="mb-3">
                    <label for="pengeluaran" class="text-xl font-semibold text-slate-600">Pengeluaran</label><br>
                    <div class="flex items-center py-2">
                        <span class="text-xl text-gray-600 bg-slate-200 p-2 rounded-s h-10 border-y border-l border-gray-300 font-semibold flex items-center">Rp</span>
                        <input type="text" name="pengeluaran" id="pengeluaran" class=" border-gray-300 outline-none text-xl p-1 rounded-e w-full h-10 border-y border-r">
                    </div>
                </div>
            </div>
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="nama" class="text-xl font-semibold text-slate-600">Nama Transaksi</label><br>
                    <div class="flex items-center py-2">
                        <input type="text" name="nama" id="nama" class=" border-gray-300 outline-none text-xl p-1 rounded w-full h-10 border">
                    </div>
                </div>
            </div>
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="buyerName" class="text-xl font-semibold text-slate-600">Nama Pelanggan</label><br>
                    <div class="flex items-center py-2">
                        <input type="text" name="buyerName" id="buyerName" class=" border-gray-300 outline-none text-xl p-1 rounded w-full h-10 border">
                    </div>
                </div>
            </div>
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="tanggal" class="text-xl font-semibold text-slate-600">Tanggal</label><br>
                    <div class="flex items-center py-2">
                        <input type="date" name="tanggal" id="tanggal" class=" border-gray-300 outline-none text-xl p-1 rounded w-full h-10 border" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
            </div>
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="kategori" class="text-xl font-semibold text-slate-600">Kategori</label><br>
                    <select name="kategori" id="" class="border-gray-300 outline-none text-xl p-1 rounded w-full h-10 border mt-2">
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori }}">{{ $kategori }}</option>
                        @endforeach   
                    </select>
                </div>
            </div>
            <div class="bg-white w-full p-3 shadow rounded-md mb-3">
                <div class="mb-3">
                    <label for="status" class="text-xl font-semibold text-slate-600">Status</label><br>
                    <select name="status" id="status" class="border-gray-300 outline-none text-xl p-1 rounded w-full h-10 border mt-2" onchange="checkStatus(this)">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach    
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full bg-first py-2 rounded text-white mb-5 font-semibold">Tambah Data</button>
        </form>
        
    </div>


</x-layout>