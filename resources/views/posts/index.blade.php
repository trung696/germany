@extends('layouts.main')
@section('content')
    <h1 class="text-info pt-3">Post</h1>
    <form action="" method="get" class="form-group mt-5">
        @csrf
        <div class="input-group col-7 mb-3">
            <label for="" class="mr-2 mt-2">Post title</label>
            <input class="form-control col-5 border border-primary rounded " name="keyword" type="search"
                placeholder="Please enter Post title" aria-label="Search" value="{{ $searchData['keyword'] }}">
        </div>
        <hr style="height:2px; margin-top:40px">
        <div class="input-group col-4 d-flex justify-content-end float-right mb-3 " style="margin-right:35px ">
            <div class="col-2 text-right "> <button type="submit" class="btn btn-primary">Search</button></div>
            <div class="col-2 ">
                <a href="{{ route('post.add') }}" class="btn btn-success text-wrap " style="">Create</a>
            </div>
        </div>
    </form>


    <table class="table table-bordered mt-2">
        <thead>
            <th class="col" style="width:50px">STT</th>
            <th class="col-5 text-center">Title</th>
            <th class="col-5 text-center">Image</th>
            <th class="col-5 text-center">Description</th>
            <th class="col-5 text-center">Status</th>
            <th class="col-2 text-center">Action</th>
        </thead>
        <tbody>
            @foreach ($post as $item)
                <tr>
                    <td class="col" style="width:50px">
                        {{ $loop->iteration + $post->perPage() * ($post->currentPage() - 1) }}</td>

                    <td class="col-5 text-center">{{ $item->title }}
                    </td>
                    <td class="col-5 text-center">
                        <img src="{{ asset($item->image) }}" width="150px;" alt="">
                    </td>
                    <td class="col-5 text-center">{{ $item->description }}
                    </td>
                    <td class="col-5 text-center">
                        @if ($item->status == 0)
                            Pending
                        @else
                            Approved
                        @endif
                    </td>
                    <td class="col text-center">
                        <a href="{{ route('post.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('post.remove', ['id' => $item->id]) }}" class="btn btn-danger"
                            onclick="return confirm('Bạn muốn xóa chứ?');">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-flex align-items-center">
        <form class="input-group mr-auto ">
            <select name="pageSize" id="pageSize" class="custom-select col-1" style="width:5%"
                onchange="this.form.submit()">
                <option id="pagesize5" value="5" @if ($pageSize == 10) selected @endif>5</option>
                <option id="pagesize10" value="10" @if ($pageSize == 10) selected @endif>10</option>
                <option id="pagesize15" value="15" @if ($pageSize == 15) selected @endif>15</option>
            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="inputGroupSelect02">Each page</label>
            </div>
        </form>
        <span class="pb-2" style="width: 100px">{{ $post->firstItem() }} - {{ $post->lastItem() }} of
            {{ $post->total() }}</span>

        <div class="mt-2">{{ $post->links('vendor.pagination.bootstrap-4') }}</div>

    </div>
@endsection
