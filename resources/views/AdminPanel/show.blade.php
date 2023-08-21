@extends('AdminPanel.layout')


@section('content')
    @include('inc.messages')

    <h1 class="p-relative">{{ $admin->name }}</h1>
    <div class="friends-page d-grid m-auto g-20">
        <div class="friend bg-white rad-6 p-15 p-relative">
            <div class="contact">
                <i class="fa-solid fa-phone"></i>
                <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="text-c">
                <img class="rad-50 mt-10 mb-10 w-100 h-100"
                    src="{{ asset("storage/$admin->image") }}" alt="" />
                <h4 class="m-0">{{ $admin->name }} </h4>
                <p class="c-black fs-13 mb-0">email: {{ $admin->email }}</p>
                <p class="c-black fs-13 mb-0">phone: {{ $admin->phone }}</p>
                <p class="c-black fs-13 mb-0">created at: {{ $admin->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
