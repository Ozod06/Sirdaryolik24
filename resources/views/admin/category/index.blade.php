@extends('layouts.adminLayauts')

@section('title')
    Category
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
          <h1>Kategoriya</h1>
            <div class="row">
                <div class="col-12 col-md-8">
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
                            <h4>category</h4>
                            <a href="{{ route('admin.category.create') }}" class="btn btn-success">Create</a>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category (uz)</th>
                                    <th scope="col">Category (ru)</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $category->name_uz }}</td>
                                        <td>{{ $category->name_ru }}</td>
                                        <td>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button href="" class="btn btn-danger">Delete</button>
                                            </form>
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
