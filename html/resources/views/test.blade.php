@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <h3>Permission tests</h3>
                        <p>Available roles</p>
                        <table class="table">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Permissions</td>
                            </tr>
                            @foreach ($roles as $key => $item)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        @foreach ($item['permissions'] as $permission)
                                            {{ $permission }},
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <p>User roles</p>
                        <table class="table">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                            </tr>
                            @foreach ($userRoles as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                </tr>
                            @endforeach
                        </table>

                        @can('publish articles')
                            <p>I can publish articles</p>
                        @endcan
                        
                        @can('edit articles')
                            <p>I can edit articles</p>
                        @endcan

                        @if (auth()->user()->can('edit articles'))
                            <p>I can edit articles (if)</p>
                        @endif

                        @role('writer')
                            <p>I am a writer!</p>
                        @else
                            <p> I am not a writer...</p>
                        @endrole

                        @role('Super-Admin')
                            <p>I am the boss!</p>
                        @else
                            <p>I am not the boss</p>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
