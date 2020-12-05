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
                                <th scope="row">about</th>
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

            <div class="card  mt-4">
                <div class="card-header">{{ __('Users') }}</div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nmae</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr @if ($user->trashed()) class="text-danger" @endif>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->trashed())
                                    <button class="btn btn-sm btn-success btn-block" onclick="
                                    event.preventDefault();
                                    if (confirm('{{ __('Restore user ') }}' + ' ID={{ $user->id }} ?')) {
                                         $('#restore-form-{{ $user->id }}').submit();
                                    };
                                    ">restore</button>
                                    <form id="restore-form-{{ $user->id }}"
                                        action="{{ route('user.restore', $user->id) }}" method="POST" class="d-none">
                                        @method('PATCH')
                                        @csrf
                                    </form>
                                    @else


                                    <button class="btn btn-sm btn-danger btn-block" onclick="
                                    event.preventDefault();
                                    if (confirm('{{ __('Delete user ') }}' + ' ID={{ $user->id }} ?')) {
                                         $('#delete-form-{{ $user->id }}').submit();
                                    };
                                    ">delete</button>

                                    <form id="delete-form-{{ $user->id }}"
                                        action="{{ route('user.delete', $user->id) }}" method="POST" class="d-none">
                                        @method('DELETE')
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

        </div>
    </div>
</div>
@endsection
