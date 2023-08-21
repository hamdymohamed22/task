@extends('AdminPanel.layout')

@section('content')
    @include('inc.messages')

    <h1 class="p-relative">New Admin</h1>

    <div class="m-20 d-grid g-20">
        <div class="p-20 bg-white rad-10">
            <p class="mt-0 mb-10 fs-15 c-gray">add new admin</p>
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                <!-- inp 1 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10">Name</label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="name" id="first" type="text"
                        value="{{ old('name') }}" placeholder="name">
                </div>
                <!-- inp 2 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10"> Email </label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="email" type="email"
                        value="{{ old('email') }}" placeholder="email">
                </div>
                <!-- inp 3 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10">Password </label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="password" type="password"
                        placeholder="Password ">
                </div>
                {{-- <!-- inp 4 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10">Confirm Password</label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="password_confirmation"
                        type="password" placeholder="Confirm Password ">
                </div> --}}
                <!-- inp 5 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10"> Phone</label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="phone" type="text"
                        placeholder="phone">
                </div>
                <!-- inp 6 -->
                <div class="mb-20">
                    <label class="d-block fs-14 c-gray mb-10">Image </label>
                    <input class="brd-none p-10 border-ccc rad-6 d-block w-full" type="file" name="image">
                </div>

                <button id="submit" class="submit btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection


@section('scripts')


<script>
    $(document).on('click', '#submit', function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('name', $("input[name='name']").val());
        formData.append('email', $("input[name='email']").val());
        formData.append('password', $("input[name='password']").val());
        formData.append('phone', $("input[name='phone']").val());
        formData.append('image', $("input[name='image']")[0].files[0]);

        $.ajax({
            url: "{{ route('admins.store') }}",
            type: "POST",
            enctype:"multipart/form-data",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function(response) {
                alert('Admin created successfully');
                // Update Datatables table
                // table.ajax.reload();
            },
            error: function(xhr, textStatus, errorThrown) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = '';
                    for (var field in errors) {
                        errorMessages += errors[field][0] + '\n';
                    }
                    alert(errorMessages);
                } else {
                    alert('An error occurred: ' + errorThrown);
                }
            }
        });
    });
</script>

@endsection
