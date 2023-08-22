@extends('AdminPanel.layout')


@section('content')
    @include('inc.messages')
    <h1 class="p-relative">all admins</h1>
    <div class="products p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 text-c align-center">admins</h2>
        <div class="responsive-table">

            <table class="table mt-3" id="admins-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acitons</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr id="admin{{ $admin->id }}">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td scope="row">{{ $admin->name }}</td>
                            <td scope="row">{{ $admin->email }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="view btn btn-primary" data-id="{{ $admin->id }}">Details</button>
                                    <button class="btn btn-success" data-id="{{ $admin->id }}">
                                        <a href="{{route('admins.edit',[$admin->id])}}">Edit</a></button>
                                    <button class="delete-admin btn btn-danger"
                                        data-id="{{ $admin->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        No Admins
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection


@section('scripts')

{{-- vie details script  --}}
    <script>
        $(document).on('click', '.view', function() {
            var adminId = $(this).data('id');
            $.ajax({
                url: "{{ route('admins.show', ['admin' => '__adminId']) }}".replace('__adminId', adminId),
                type: 'GET',
                success: function() {
                    window.location.href = "{{ route('admins.show', ['admin' => '__adminId']) }}"
                        .replace('__adminId', adminId);
                },
                error: function() {
                    alert('Error fetching admin details.');
                }
            });
        });
    </script>
{{-- Delete Script  --}}
    <script>
        $(document).on('click', '.delete-admin', function() {
            var adminId = $(this).data('id');

            if (confirm('Are you sure?')) {
                $.ajax({
                    url: "{{ route('admins.destroy', ['admin' => '__adminId']) }}".replace('__adminId',
                        adminId),
                    type: 'DELETE',
                    data: {
                        '_token': "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        alert(response.msg);
                        $('#admin' + adminId).remove();
                    },
                    error: function() {
                        alert('Error deleting admin.');
                    }
                });
            }
        });
    </script>
        });
    </script>

@endsection
