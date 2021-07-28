@extends('layouts.admin')
@section('title', 'Discounts')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
@endif
<a class="btn btn-primary" href="{{ route('adminDiscountForm') }}">割引を追加</a><br>
<h2 class="my-3">並び替え</h2>
{{-- <a href="{{ route('adminPhoto') }}" class="btn btn-secondary">ID順</a>
<a href="{{ route('adminPhoto', ['sort' => 1]) }}" class="btn btn-secondary">商品ID順</a> --}}
<h2 style="margin-top: 20px">割引</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>id</th>
            <th>name</th>
            <th>percent</th>
            <th>discount</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
            <tr>
                <td class="text-dark">{{ $discount->id }}</td>
                <td>{{ $discount->name }}</td>
                <td>{{ $discount->percent }}</td>
                <td>{{ $discount->discount }}</td>
                <td>
                    <form action="{{ route('adminDiscountDelete') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $discount->id }}" name="discount_id">
                        <input class="btn btn-danger" type="submit" value="削除">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection