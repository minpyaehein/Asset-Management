    @extends('layouts.master')

    @section('content')

    <div class="container m-5">
        <div class="row">
            <div class="col-4">
                <form action="{{route('blogsCreate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="" alt="" id="output" class="img-thumbnail w-100 mb-2">
                    <input type="file" name="image" id="" class="form-control mt-2 @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <input type="text" value="{{ old('title') }}" name="title" id="" placeholder="Enter Blog Title..." class="form-control mt-2 @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <textarea name="description" id="" class="form-control mt-2 @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Enter Blog Description...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <input type="text" value="{{ old('fee') }}" name="fee" id="" placeholder="Enter Blog Fee..." class="form-control mt-2 @error('fee') is-invalid @enderror">
                    @error('fee')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <input type="text"  value="{{ old('address') }}" name="address" id="" placeholder="Enter Blog Address..." class="form-control mt-2 @error('address') is-invalid @enderror">
                    @error('address')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <select name="rating" id="" class="form-control mt-2 @error('rating') is-invalid @enderror">
                        <option value="">Choose Rating...</option>
                        <option value="1" @if(old('rating') == 1) selected  @endif>1 star</option>
                        <option value="2" @if(old('rating') == 2) selected  @endif>2 star</option>
                        <option value="3" @if(old('rating') == 3) selected  @endif>3 star</option>
                        <option value="4" @if(old('rating') == 4) selected  @endif>4 star</option>
                        <option value="5" @if(old('rating') == 5) selected  @endif>5 star</option>
                    </select>
                    @error('rating')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                    <input type="submit" value="Create" class="btn btn-danger mt-2">
                </form>
            </div>
            <div class="col offset-1">
                <div class="row">
                    <div class="col offset-6">
                        <form action="{{route('blogsList')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" name="searchKey" value="{{request('searchKey')}}" class="form-control" placeholder="Search keywords..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    Search <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach ($data as $item)

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="text">{{$item->title}}</div>
                            <div class="text">{{$item->created_at->format('j-F-Y')}}</div>
                        </div>
                        <div class="text text-muted">
                            {{Str::words($item->description, 10, '...')}}
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="text me-1"><i class="fa-solid fa-money-bill text-primary"></i> {{$item->fee}} mmk | </div>
                                <div class="text me-1"><i class="fa-solid fa-location-dot text-danger"></i> {{$item->address}} | </div>
                                <div class="text me-1"><i class="fa-solid fa-star text-warning"></i> {{$item->rating}}</div>
                            </div>
                            <div class="d-flex">
                                <div class="btn btn-primary me-1 btn-sm"><i class="fa-solid fa-eye"></i></div>
                                <div class="btn btn-secondary me-1 btn-sm"><i class="fa-solid fa-pen-to-square"></i></div>
                                <a href="{{route('blogsDelete',$item->id)}}"><div class="btn btn-danger me-1 btn-sm"><i class="fa-solid fa-trash"></i></div></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                <span class="d-flex justify-content-end mt-2">{{$data->links()}}</span>
            </div>
        </div>
    </div>

    @endsection
