<!-- Modal Tambah Data Siswa -->

@props(['groups', 'student'])

<div id="editModalStudent{{ $student->id }}" class="fixed inset-0 bg-black/40  hidden">
    <div class="h-full flex items-center justify-center">
        <div class="bg-white rounded-lg w-1/3 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Data Siswa</h2>
            <!-- Formulir Tambah Data -->
            <form action="/admin/student/{{ $student->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <div class="flex-1 space-y-2 md:flex md:items-center md:space-x-3 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <label for="name" class="block font-semibold mb-1">Nama</label>
                            <input type="text" name="name" id="name" placeholder="John Dhoe" required
                                class="w-full border py-1.5 px-3 rounded-lg" value="{{ $student->name }}">
                        </div>
                        <div class="w-full md:w-1/2">
                            <label for="nisn" class="block font-semibold mb-1">NISN</label>
                            <input type="text" name="nisn" id="nisn" placeholder="123456**" required
                                class="w-full border py-1.5 px-3 rounded-lg" value="{{ $student->nisn }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gender" class="block font-semibold mb-1">Gender</label>
                    <select id="gender" name="gender" class="border w-full rounded-lg px-2 py-1.5" required>
                        <option value="laki-laki" @if ($student->gender == 'laki-laki') selected @endif>Laki-laki</option>
                        <option value="perempuan" @if ($student->gender == 'perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="groupSelect" class="block font-semibold mb-1">Rombel</label>
                    <select name="group_id" id="gradeSelect" class="border w-full rounded-lg px-2 py-1.5" required>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" @if ($group->id == $student->group_id) selected @endif>
                                {{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Tombol Aksi -->
                <div class="flex justify-end">
                    <button type="button" onclick="editStudenModal({{ $student->id }})"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-simipa-1 text-white rounded hover:bg-simipa-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
