@extends('layouts.app')

@section('content')
    <h1>Список ипотек</h1>
    <ul>
        @foreach($mortgages as $mortgage)
            <li>
                <a href="{{ route('public.mortgages.show', $mortgage->id) }}">{{ $mortgage->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection