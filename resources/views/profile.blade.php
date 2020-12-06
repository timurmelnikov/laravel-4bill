@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User info') }}</div>

                <div class="card-body">
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $currentUser->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Login</th>
                                <td>{{ $currentUser->login }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>{{ $currentUser->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{ $currentUser->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date of birth</th>
                                <td>{{ $currentUser->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th scope="row">About</th>
                                <td>{{ $currentUser->about }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Type</th>
                                <td>{{ $currentUser->type }}</td>
                            </tr>
                            {{-- name, login, phone, email, date_of_birth, about --}}
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($currentUser->isAdmin())
            <div class="card  mt-4">
                <div class="card-header">{{ __('Users') }}</div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Login</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td @if ($user->isBlocked()) class="deleted" @endif>{{ $user->id }}</td>
                                <td @if ($user->isBlocked()) class="deleted" @endif>{{ $user->login }}</td>
                                <td @if ($user->isBlocked()) class="deleted" @endif>{{ $user->email }}</td>
                                <td @if ($user->isBlocked()) class="deleted" @endif>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->isBlocked())
                                    <button class="btn btn-sm btn-success btn-block" onclick="
                                    event.preventDefault();
                                    if (confirm('{{ __('Unblock user ') }}' + ' ID={{ $user->id }} ?')) {
                                         $('#unblock-form-{{ $user->id }}').submit();
                                    };
                                    ">unblock</button>
                                    <form id="unblock-form-{{ $user->id }}"
                                        action="{{ route('user.unblock', $user->id) }}" method="POST" class="d-none">
                                        @method('PATCH')
                                        @csrf
                                    </form>
                                    @else

                                    <button class="btn btn-sm btn-danger btn-block" onclick="
                                    event.preventDefault();
                                    if (confirm('{{ __('Block user ') }}' + ' ID={{ $user->id }} ?')) {
                                         $('#block-form-{{ $user->id }}').submit();
                                    };
                                    ">block</button>

                                    <form id="block-form-{{ $user->id }}"
                                        action="{{ route('user.block', $user->id) }}" method="POST" class="d-none">
                                        @method('PATCH')
                                        @csrf
                                    </form>

                                    @endif

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th scope="row">...</th>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
