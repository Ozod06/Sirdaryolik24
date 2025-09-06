@extends('layouts.adminLayauts')

@section('title')
    Post
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <h1>Posts</h1>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>posts</h4>
                            <a href="{{ route('admin.post.create') }}" class="btn btn-success">Create</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title (uz)</th>
                                    <th scope="col">Body (uz)</th>
                                    <th scope="col">Category_id </th>
                                    <th scope="col">Img</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $post->title_uz }}</td>
                                        <td class="post-body" style="max-width: 100px !important; height: auto !important">{!! $post->body_uz !!}</td>
                                        <td>{{ $post->category_id }}</td>
                                        <td>
                                            <img src="{{ asset('admin/images/' . $post->image) }}" width="80">

                                        </td>
                                        <td>{{ $post->slug }}</td>

                                        <td>
                                            <form action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button href="" class="btn btn-danger" onclick="return confirm('O\'chirishni xohlaysizmi')">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-outline-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-success">Show</a>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

