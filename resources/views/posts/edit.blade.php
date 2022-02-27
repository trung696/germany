@extends('layouts.main')
@section('content')
    <h1 class="text-info col-5 mx-auto pt-5 text-center">Edit Post</h1>
    <form action="" class="mt-4 row" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-5 mx-auto border">
            <div class="col-12 mt-4">
                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" class="form-control" name="title" id=""
                        @if (empty(old('title'))) value="{{ $post->title }}"
                                @else
                                value="{{ old('title') }}" @endif>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if (session('message'))
                        <div class="text-danger"> {{ session('message') }} </div>
                    @endif
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Image Upload</label>
                    <img src="{{ asset($post->image) }}" alt="" width="100" height="100" id="cate_img">
                    <input type="file" class="form-control mt-3" name="image" id="upload" onchange="ImagesFileAsURL()">
                    @error('cate_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id=""
                        @if (empty(old('description'))) value="{{ $post->description }}"
                                @else
                                value="{{ old('description') }}" @endif>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option @if ($post->status == 0) selected @endif value="0">
                            Pending</option>
                        <option @if ($post->status == 1) selected @endif value="1">
                            Approved</option>
                    </select>
                    {{-- phần dưới là để hiển thị thông báo validate --}}
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function ImagesFileAsURL() {
            var fileSelected = document.getElementById('upload').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var newImage = document.getElementById('cate_img');
                    newImage.src = srcData;
                    // newImage.className = "col-6";
                    // newImage.style.width = "100px";
                    document.getElementById('displayImg').innerHTML = newImage.outerHTML

                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
@endsection
