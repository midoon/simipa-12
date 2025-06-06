<!-- Modal Tambah Data Siswa -->

@props(['groups', 'teachers', 'subjects', 'schedule'])

<div id="editModalSchedule{{ $schedule->id }}" class="fixed inset-0 bg-black/40  hidden">
    <div class="h-full flex items-center justify-center">
        <div class="bg-white rounded-lg w-1/3 p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Data Jadwal</h2>
            <!-- Formulir Tambah Data -->
            <form action="/admin/schedule/{{ $schedule->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <div class="w-full ">
                        <label for="name" class="block font-semibold mb-1">Rombongan Belajar</label>
                        <select name="group_id" id="groupSelect" class="border w-full rounded-lg px-2 py-1.5" required>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" @if ($group->id == $schedule->group_id) selected @endif>
                                    {{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="groupSelect" class="block font-semibold mb-1">Mata Pelajaran</label>
                    <select name="subject_id" id="subjectSelect" class="border w-full rounded-lg px-2 py-1.5" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" @if ($subject->id == $schedule->subject_id) selected @endif>
                                {{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="teacherSelect" class="block font-semibold mb-1">Guru</label>
                    <select name="teacher_id" id="teacherSelect" class="border w-full rounded-lg px-2 py-1.5" required>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" @if ($teacher->id == $schedule->teacher_id) selected @endif>
                                {{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="daySelect" class="block font-semibold mb-1">Hari</label>
                    <select name="day_of_week" id="daySelect" class="border w-full rounded-lg px-2 py-1.5" required>
                        <option value="senin" @if ($schedule->day_of_week == 'senin') selected @endif>Senin</option>
                        <option value="selasa" @if ($schedule->day_of_week == 'selasa') selected @endif>Selasa</option>
                        <option value="rabu" @if ($schedule->day_of_week == 'rabu') selected @endif>Rabu</option>
                        <option value="kamis" @if ($schedule->day_of_week == 'kamis') selected @endif>kamis</option>
                        <option value="jumat" @if ($schedule->day_of_week == 'jumat') selected @endif>Jumat</option>
                        <option value="sabtu" @if ($schedule->day_of_week == 'sabtu') selected @endif>Sabtu</option>
                        <option value="minggu" @if ($schedule->day_of_week == 'minggu') selected @endif>minggu</option>
                    </select>
                </div>
                <div class="mb-3 ">
                    <div class="w-full flex gap-4">
                        <div class="flex-1">
                            <label for="start_time" class="block font-semibold mb-1">Waktu Mulai</label>
                            <input type="time" id="start_time" name="start_time"
                                class="border w-full rounded-lg px-2 py-1.5" value="{{ $schedule->start_time }}"
                                required>
                        </div>
                        <div class="flex-1">
                            <label for="end_time" class="block font-semibold mb-1">Waktu Selesai</label>
                            <input type="time" id="end_time" name="end_time"
                                class="border w-full rounded-lg px-2 py-1.5" value="{{ $schedule->end_time }}" required>
                        </div>
                    </div>
                </div>
                <!-- Tombol Aksi -->
                <div class="flex justify-end">
                    <button type="button" onclick="editScheduleModal({{ $schedule->id }})"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-simipa-1 text-white rounded hover:bg-simipa-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
