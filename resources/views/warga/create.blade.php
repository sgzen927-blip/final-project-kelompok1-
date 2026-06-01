<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full bg-white p-8 md:p-10 rounded-3xl shadow-2xl border border-slate-100">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-800">Tambah Data Warga</h2>
            <p class="text-slate-500">Masukkan data warga baru ke dalam sistem.</p>
        </div>

        {{-- Pesan Error Global --}}
        @if ($errors->any())
            <div class="animate-pulse bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-r-lg mb-8 shadow-sm">
                <p class="font-bold">Terjadi kesalahan pada input data!</p>
            </div>
        @endif

        <form action="{{ route('warga.store') }}" method="POST" class="space-y-6">
            @csrf 
            
            {{-- Nama --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama') }}" 
                       class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                       {{ $errors->has('nama') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" 
                       placeholder="Masukkan nama lengkap" required>
                @error('nama') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- NIK --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">NIK</label>
                <input type="text" name="nik" value="{{ old('nik') }}" 
                       class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                       {{ $errors->has('nik') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" 
                       placeholder="Masukkan 16 digit NIK" required>
                @error('nik') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                <textarea name="alamat" rows="3" 
                          class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                          {{ $errors->has('alamat') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" 
                          placeholder="Masukkan alamat lengkap" required>{{ old('alamat') }}</textarea>
                @error('alamat') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Status PKH</label>
                <select name="status_pkh" class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all cursor-pointer 
                        {{ $errors->has('status_pkh') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" required>
                    <option value="" disabled selected>-- Pilih Status --</option>
                    <option value="Menerima" {{ old('status_pkh') == 'Menerima' ? 'selected' : '' }}>Menerima Bantuan</option>
                    <option value="Selesai (Graduasi)" {{ old('status_pkh') == 'Selesai (Graduasi)' ? 'selected' : '' }}>Selesai (Graduasi)</option>
                    <option value="Diusulkan" {{ old('status_pkh') == 'Diusulkan' ? 'selected' : '' }}>Diusulkan</option>
                </select>
                @error('status_pkh') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white font-bold py-4 rounded-2xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    Simpan Data
                </button>
                <a href="{{ route('warga.index') }}" class="text-slate-500 font-semibold hover:text-slate-800 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>