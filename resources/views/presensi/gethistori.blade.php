@if ($histori->isEmpty())
    <div class="alert alert-warning">
        <p>!Anda Belum Absen di bulan dan tahun ini!</p>
    </div>
@endif
@foreach ($histori as $d)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php
                $path = Storage::url('uploads/absensi/'.$d->foto_in);
            @endphp
            <img src="{{url($path)}}" alt="image"
            class="image">
            <div class="in m-1">
                <div>
                    <b>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</b><br>
                    {{-- <small class="text-muted">{{ $d->jabatan }}</small> --}}
                </div>
                <span class="badge {{ strtotime($d->jam_in) <= strtotime('08:30') ? 'bg-success' : 'bg-danger' }}">
                    {{ $d->jam_in }}
                </span>
                <span class="badge bg-primary">
                    {{$d->jam_out !== null ? $d->jam_out : 'Belum Absen'}}
                </span>
            </div>
        </div>
    </li>
</ul>
@endforeach
