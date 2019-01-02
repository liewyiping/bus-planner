@extends('layouts.app')

@section('content')
    <h1>Welcome to <a href="{{ config('app.url') }}">{{ config('app.name') }}</a></h1>
    <p>
        
    </p>
    <p>
        Your account has been approved. Your password is 123456.
    </p>
    <table>
        <tr>
            <td>
                <p>
                    <a class="btn-primary">
                       
                    </a>
                </p>
            </td>
        </tr>
    </table>

    <p><em>This link is valid until {{ Carbon\Carbon::now()->addMinutes(config('auth.passwords.users.expire'))->format('Y/m/d') }}.</em></p>
@endsection