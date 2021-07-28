@extends('layouts.admin')
@section('title', '商品変更フォーム')
@section('content')
    <form action="{{ route('adminEdit') }}" method="POST" class="text-center">
        @csrf
        <input type="hidden" value="{{ $id }}" name="id">
        <label for="" >商品名</label><br>
        <input autofocus required class="mb-3" type="text" name="name" value="{{ $data->name }}">
        <br>
        <label for="">詳細</label><br>
        <input required class="mb-3" type="text" name="detail" value="{{ $data->detail }}">
        <br>
        <label for="">値段</label><br>
        <input required class="mb-3" type="number" name="fee" value="{{ $data->fee }}">
        <br>
        <br>
        <label for="">割引</label><br>
        <select required class="mb-3"  name="discount_id">
            @foreach ($discounts as $discount)
                @if ($data->discount->id == $discount->id)
                    <option selected value="{{ $discount->id }}">{{ $discount->name }}</option>
                @else
                    <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                @endif
            @endforeach
        </select>
        <br>
        <div class="my-3">
            <label for="">タグ</label><br>
            @foreach ($tags as $tag)
            @php
                $flag = false;
                foreach($data->tagmap as $tagmap) {
                    if($tagmap->tag->id == $tag->id) {
                        $flag = true;
                    }
                }
            @endphp
            @if ($flag)
                <label class="pr-3" for="">{{ $tag->name }}</label><input checked style="transform: scale(1.5)" type="checkbox" name="tags[]" value="{{ $tag->id }}" id=""><br>
            @else
                <label class="pr-3" for="">{{ $tag->name }}</label><input style="transform: scale(1.5)" type="checkbox" name="tags[]" value="{{ $tag->id }}" id=""><br>
            @endif
            @endforeach
        </div>
        <br>
        <label for="">カテゴリー</label><br>
        <select required class="mb-3"  name="category_id">
            @foreach ($categories as $category)
                @if ($data->category->id == $category->id)
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        <br>
        <input required class="mb-3" type="submit" value="商品編集" >
    </form>
@endsection