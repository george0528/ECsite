<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            @error('keyword')
                <div class="alert alert-danger mt-3">{{ $errors->first('keyword') }}</div>
            @enderror
            @if ($num == 1)
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">{{ $h1 }}</h1>
            @elseif($num == 0)
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">{{ $h1 }}{{ $keyword }}</h1>
            @endif
            @if ($stocks->isEmpty())
                
            @else
            <div class="">
                @foreach($stocks as $stock)
                <div class="card text-center">
                    {{$stock->name}} <br>
                    {{$stock->fee}}円<br>
                    <p>カテゴリー：{{$stock->category->name}}</p>
                    @foreach ($stock->photo as $photo)
                    <img src="{{asset('storage/image/'.$photo->imgpath)}}" alt="" class="incart" >
                    <br>
                    @endforeach
                    {{$stock->detail}} <br>
                    <form action="{{route('addmycart')}}" method="post">
                        @csrf
                        <input type="number" name="quantity" value="1" required>
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="submit" value="カートに入れる">
                    </form>
                </div>
                @endforeach
            </div>
            @endif
            {{-- @include('components.links') --}}
        </div>
    </div>
</div>