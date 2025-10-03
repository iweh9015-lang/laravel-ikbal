@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <fieldset>
                    <legend>Data Posts</legend>
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary" style="float-right">Tambah</a>
                    <div class=" table-responsive py-2">
                        <table class="table" border="1">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($post as $data)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $data->title }}</th>
                                    <th>{{ Str::limit($data->content, 100) }}</th>
                                    <th>
                                        <form action="{{ Route ('post.delete', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ Route('post.edit', $data->id) }}" class="btn btn-sm btn-primary">
                                                Edit
                                            </a> |   
                                        <button type="submit"  onclick="return confirm('Apakah Anda Yakin ?')"class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection
