@extends('layouts.admin')
@section('title', 'カテゴリー編集画面')
@section('content')
    <form action="{{ route('adminEditCategory') }}" method="POST" class="text-center">
        @csrf
        @include('components.input',['name' => 'カテゴリー名', 'inputType' => 'text', 'inputName' => 'name', 'inputValue' => $data->name])
        <input type="hidden" name="id" value="{{ $data->id }}">
        <input type="submit" class="btn btn-primary" value="編集">
    </form>
@endsection