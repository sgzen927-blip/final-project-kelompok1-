<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring PKH - Data Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen p-4 md:p-8">

    <div class="max-w-6xl mx-auto">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 rounded-3xl shadow-2xl mb-8 text-white">
            <h2 class="text-4xl font-extrabold tracking-tight">Daftar Warga PKH</h2>
            <p class="text-blue-100 mt-2">Kelola data monitoring warga dengan efisien dan modern.</p>
        </div>

        {{-- Flash Message Notifikasi Sukses --}}
        @if (session('success'))
            <div id="flash-message" class="mb-8 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 rounded-r-lg shadow-sm flex items-center justify-between animate-in fade-in slide-in-from-top-4 duration-500">
                <p class="font-bold">{{ session('success') }}</p>
                <button onclick="document.getElementById('flash-message').remove()" class="text-emerald-700 hover:text-emerald-900 font-bold transition">✕</button>
            </div>
        @endif

        <form action="/warga" method="GET" class="mb-8 flex flex-col md:flex-row gap-3">
            <input type="text" name="search" value="{{ $search ?? '' }}" 
                   placeholder="Cari berdasarkan nama atau NIK..." 
                   class="flex-1 border-0 ring-1 ring-slate-200 p-4 rounded-2xl shadow-sm focus:ring-4 focus:ring-blue-500/20 outline-none transition-all">
            
            <div class="flex gap-2">
                <button type="submit" class="bg-slate-800 text-white px-8 py-4 rounded-2xl font-bold hover:bg-black transition-all transform hover:scale-105 active:scale-95 shadow-lg">
                    Cari Data
                </button>
                
                @if(isset($search) && $search != '')
                    <a href="/warga" class="bg-rose-500 text-white px-6 py-4 rounded-2xl font-bold hover:bg-rose-600 transition-all">
                        Reset
                    </a>
                @endif
            </div>
        </form>

        @can('is-admin')
            <a href="/warga/create" class="inline-flex items-center bg-emerald-500 text-white px-6 py-3 rounded-2xl font-bold mb-6 hover:bg-emerald-600 transition-all hover:shadow-lg hover:shadow-emerald-500/30 transform hover:-translate-y-1">
                <span class="mr-2 text-xl">+</span> Tambah Warga Baru
            </a>
        @endcan

        <div class="bg-white shadow-xl shadow-slate-200/50 rounded-3xl overflow-hidden border border-slate-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-bold">
                        <tr>
                            <th class="px-8 py-5">No</th>
                            <th class="px-8 py-5">Nama Lengkap</th>
                            <th class="px-8 py-5">NIK</th>
                            <th class="px-8 py-5">Alamat</th>
                            <th class="px-8 py-5">Status</th>
                            @can('is-admin')
                                <th class="px-8 py-5 text-center">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($semuaWarga as $key => $warga)
                            <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                                <td class="px-8 py-5 text-slate-400 font-medium">{{ $key + 1 }}</td>
                                <td class="px-8 py-5 font-bold text-slate-800">{{ $warga->nama }}</td>
                                <td class="px-8 py-5 text-slate-600 font-mono">{{ $warga->nik }}</td>
                                <td class="px-8 py-5 text-slate-600">{{ $warga->alamat }}</td>
                                <td class="px-8 py-5">
                                    <span class="bg-indigo-100 text-indigo-700 text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-wider">
                                        {{ $warga->status_pkh }}
                                    </span>
                                </td>
                                
                                @can('is-admin')
                                    <td class="px-8 py-5 text-center">
                                        <div class="flex justify-center gap-4">
                                            <a href="/warga/{{ $warga->id }}/edit" class="text-blue-600 hover:text-blue-800 font-bold transition-all">Edit</a>
                                            <form action="/warga/{{ $warga->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-700 font-bold transition-all">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-16 text-slate-400 font-medium">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>