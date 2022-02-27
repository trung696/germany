@extends('layouts.main')
@section('content')
    <h2 class="text-info col-5 mx-auto pt-5 text-center">New Post</h2>
    <form action="" class="mt-4 row " method="POST" enctype="multipart/form-data" id="regForm"
        onsubmit="return submitForm()">
        @csrf
        <div class="col-5 mx-auto border">
            <div class="col-12 mt-4">
                <div class="form-group">
                    <label for="">Post Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="title" id="name" value="{{ old('title') }}">
                    <span class="text-danger" id="ername" style="font-size: 80%"></span>
                    @error('name')
                        <span class="text-danger" style="font-size: 80%">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Image <span style="color: red">*</span></label>
                    <input type="file" class="form-control" name="image" id="upload" value=""
                        onchange="ImagesFileAsURL()">
                    @error('image')
                        <span class="text-danger" style="font-size: 80%">{{ $message }}</span>
                    @enderror
                </div>
                <div id="displayImg" class="text-danger" style="font-size: 80%"></div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Description <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="description" id="des"
                        value="{{ old('description') }}">
                    @error('description')
                        <span class="text-danger" style="font-size: 80%">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="form-group">
                    <label for="">Status<span style="color: red">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                    </select>
                </div>
            </div>

            <div class="col-6 mb-3">
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
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    newImage.className = "col-12";
                    document.getElementById('displayImg').innerHTML = newImage.outerHTML

                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" crossorigin="anonymous"></script>
                <script>
                    $(document).ready(function() {
                        $("#regForm").validate({
                            rules: {
                                name: "required",
                                cate_image: "required",

                            }
                        });
                    });
                </script> --}}
@endsection
<script>
    function submitForm() {
        var check_name = document.getElementById('name');
        var check_img = document.getElementById('upload');
        check_name.addEventListener("change", function() {
            document.getElementById('ername').innerHTML = "";
        })
        if (!check_name.value) {
            document.getElementById('ername').innerHTML = "This is required";
            return false;

        } else if (!check_img.value) {
            document.getElementById('displayImg').innerHTML = "This is required";

            return false;
        }

    }
</script>
