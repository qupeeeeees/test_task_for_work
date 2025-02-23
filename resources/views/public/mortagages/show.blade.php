@extends('layouts.app')

@section('content')
    <h1>{{ $mortgage->title }}</h1>
    <p>Процентная ставка: {{ $mortgage->percent }}%</p>
    <p>Ренжи стоимости: {{ $mortgage->min_price }} - {{ $mortgage->max_price }}</p>
    <p>Ренжи первоначального взноса: {{ $mortgage->min_first_payment }} - {{ $mortgage->max_first_payment }}</p>
    <p>Ренжи срока ипотеки: {{ $mortgage->min_term }} - {{ $mortgage->max_term }} месяцев</p>
@endsection