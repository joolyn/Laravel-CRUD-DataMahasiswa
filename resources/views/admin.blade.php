<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container column gap-2 p-2">
    <div class="row gap-2">
        <div class="col-12 border border-primary p-2 rounded-4">
            <h3 class="mb-4">Form Mahasiswa</h3>
            <form action="{{ route('data-mahasiswa') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="program_studi" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="program_studi" name="program_studi" required>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Bisnis Digital">Bisnis Digital</option>
                        <option value="Manajemen">Manajemen</option>
                    </select>
                </div>
                <input type="text" class="form-control" id="id" name="id" style="display:none;">
                <div class="col d-flex flex-row gap-2">
                    <button type="submit" name="action" value="create" class="btn btn-primary w-100">Submit</button>
                    <button type="submit" name="action" value="update" class="btn btn-warning w-100">Update</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger w-100">Delete</button>
                </div>
            </form>
        </div>
        <div class="col-12 border border-primary rounded-4">
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data_mahasiswa->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">No members available</td>
                        </tr>
                    @else
                        @foreach ($data_mahasiswa as $mahasiswa)
                            <tr>
                                <td style="display:none;">{{ $mahasiswa->id }}</td>
                                <td>{{ $mahasiswa->nim }}</td>
                                <td>{{ $mahasiswa->nama }}</td>
                                <td>{{ $mahasiswa->alamat }}</td>
                                <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                <td>{{ $mahasiswa->email }}</td>
                                <td>{{ $mahasiswa->program_studi }}</td>
                                {{-- <td>{{ $member->created_at }}</td>
                                <td>{{ $member->updated_at }}</td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@if (session('message'))
    <script>
        window.onload = function() {
            alert("{{ session('message') }}");
        };
    </script>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const tableRows = document.querySelectorAll('table tbody tr');

        // Handle form submission validation
        form.addEventListener('submit', function(event) {
            const id = document.getElementById('id').value;
            const nim = document.getElementById('nim').value;
            const nama = document.getElementById('nama').value;
            const alamat = document.getElementById('alamat').value;
            const tanggal_lahir = document.getElementById('tanggal_lahir').value;
            const jenis_kelamin = document.getElementById('jenis_kelamin').value;
            const email = document.getElementById('email').value;
            const program_studi = document.getElementById('program_studi').value;

            if (!nim || !nama || !alamat || !tanggal_lahir || !jenis_kelamin || !email || !program_studi) {
                event.preventDefault();
                alert("Please fill in all fields.");
            }
        });

        // Handle table row click to populate form
        tableRows.forEach(row => {
            row.addEventListener('click', function() {
                const cells = row.querySelectorAll('td');
                document.getElementById('id').value = cells[0].textContent.trim();
                document.getElementById('nim').value = cells[1].textContent.trim();
                document.getElementById('nama').value = cells[2].textContent.trim();
                document.getElementById('alamat').value = cells[3].textContent.trim();
                document.getElementById('tanggal_lahir').value = cells[4].textContent.trim();
                document.getElementById('jenis_kelamin').value = cells[5].textContent.trim();
                document.getElementById('email').value = cells[6].textContent.trim();
                document.getElementById('program_studi').value = cells[7].textContent.trim();
            });
        });
    });
</script>
</body>
</html>