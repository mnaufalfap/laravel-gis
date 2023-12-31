@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Set Data Lokasi
                        <a href="{{ route('locations.create') }}" class="btn btn-info btn-sm float-end">Create data</a>
                    </div>
                    <div class="card-body font-small">
                        
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <table class="table" id="dataLocations">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alamat Lokasi</th>
                                    <th>Koordinat</th>
                                    <th>Tingkat Kerusakan</th>
                                    <th>Foto Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus" style="display:none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            $('#dataLocations').DataTable({
                processing: true,
                serverSide: true,
                responisve: true,
                lengthChange: true,
                autoWidth: false,
                ajax: '{{ route('locations.data') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'alamat_lokasi'
                    }, {
                        data: 'coordinates'
                    }, {
                        data: 'tingkat_kerusakan'
                    }, {
                        data: 'foto_lokasi',
                        render: function(data, type, row) {
                            return '<img src="{{ asset('images/') }}/' + data + '" alt="Foto Lokasi" max-width:10px; height="auto">';
                        }
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        })
    </script>
@endpush
