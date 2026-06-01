<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-2xl w-full bg-white p-8 md:p-10 rounded-3xl shadow-2xl border border-slate-100">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-800">Edit Data Warga</h2>
            <p class="text-slate-500">Perbarui informasi warga dengan teliti.</p>
        </div>

        {{-- Pesan Error Global --}}
        @if ($errors->any())
            <div class="animate-pulse bg-rose-50 border-l-4 border-rose-500 text-rose-700 p-4 rounded-r-lg mb-8 shadow-sm">
                <p class="font-bold">Terjadi kesalahan saat menyimpan!</p>
            </div>
        @endif

        <form action="/warga/{{ $warga->id }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') 
            
            {{-- Nama --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $warga->nama) }}" 
                       class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                       {{ $errors->has('nama') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" required>
                @error('nama') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- NIK --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $warga->nik) }}" 
                       class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                       {{ $errors->has('nik') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}" required>
                @error('nik') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Alamat --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                <textarea name="alamat" rows="3"
                          class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all 
                          {{ $errors->has('alamat') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}">{{ old('alamat', $warga->alamat) }}</textarea>
                @error('alamat') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Status PKH</label>
                <select name="status_pkh" class="w-full bg-slate-50 border-0 ring-1 p-4 rounded-2xl outline-none transition-all cursor-pointer 
                        {{ $errors->has('status_pkh') ? 'ring-rose-500 ring-2' : 'ring-slate-200 focus:ring-4 focus:ring-blue-500/20' }}">
                    <option value="Menerima" {{ old('status_pkh', $warga->status_pkh) == 'Menerima' ? 'selected' : '' }}>Menerima</option>
                    <option value="Selesai (Graduasi)" {{ old('status_pkh', $warga->status_pkh) == 'Selesai (Graduasi)' ? 'selected' : '' }}>Selesai (Graduasi)</option>
                    <option value="Diusulkan" {{ old('status_pkh', $warga->status_pkh) == 'Diusulkan' ? 'selected' : '' }}>Diusulkan</option>
                </select>
                @error('status_pkh') <p class="text-rose-500 text-xs mt-2 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white font-bold py-4 rounded-2xl hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    Update Data
                </button>
                <a href="/warga" class="text-slate-500 font-semibold hover:text-slate-800 transition">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>