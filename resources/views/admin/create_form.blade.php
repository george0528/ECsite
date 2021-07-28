@extends('layouts.admin')
@section('title', '商品追加フォーム')
@section('content')
    <form action="{{ route('adminCreate') }}" method="POST" class="text-center" enctype="multipart/form-data">
        @csrf
        <label for="" >商品名</label><br>
        <input autofocus required class="mb-3" type="text" name="name">
        <br>
        <label for="">詳細</label><br>
        <input required class="mb-3" type="text" name="detail">
        <br>
        <label for="">値段</label><br>
        <input required class="mb-3" type="number" name="fee">
        <br>
        <label for="">URL</label><br>
        <input required class="mb-3" type="text" name="url">
        <br>
        <label for="">画像パス</label><br>
        <input required class="mb-3" type="file" name="imgpath[]"><br>
        <input class="mb-3" type="file" name="imgpath[]"><br>
        <input class="mb-3" type="file" name="imgpath[]"><br>
        <input class="mb-3" type="file" name="imgpath[]"><br>
        <input class="mb-3" type="file" name="imgpath[]">
        <br>
        <label for="">割引</label><br>
        <select id="select" required class="mb-3"  name="discount_id">
            @foreach ($discounts as $discount)
                <option value="{{ $discount->id }}">{{ $discount->name }}</option>
            @endforeach
        </select>
        <br>
        <div class="my-3">
            <label for="">タグ</label><br>
            @foreach ($tags as $tag)
                <label class="pr-3" for="">{{ $tag->name }}</label><input style="transform: scale(1.5)" type="checkbox" name="tags[]" value="{{ $tag->id }}" id=""><br>
            @endforeach
        </div>
        <br>
        <label for="">カテゴリー</label><br>
        <select id="select" required class="mb-3"  name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <input class="mb-5 btn btn-primary" type="submit" value="商品追加" >
        <br>
        <label for="">新しいカテゴリー</label><br>
        <div id="messagebox"></div>
        <br>
        <input class="mb-3" id="newCategory" type="text">
        <br>
        <button id="btn" class="mb-3" type="button">カテゴリー作成</button>
    </form>
@endsection