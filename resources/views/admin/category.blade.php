@extends('layouts.admin')
@section('title', 'Category')
@section('content')
@if (session('message'))
<div class="alert alert-success">{{ session('message') ?? '何にもない' }}</div>
@endif
<h2 style="margin-top: 20px">カテゴリー</h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th>id</th>
            <th>name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $category)
            <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('adminEditCategoryForm', $category->id) }}">編集</a>
            </td>
            <td>
                <form action="{{ route('adminDeleteCategory') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $category->id }}" name="id">
                    <input class="btn btn-danger" type="submit" value="削除">
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

