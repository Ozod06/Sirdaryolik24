@extends('layouts.adminLayauts')

@section('title')
    ADVERTISEMENT
@endsection

@section('content')
    @include('admin.sidebar')
    <div class="main-content">
        <section class="section">
            <h1>Advertisement</h1>
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
                            <h4>Advertisement</h4>
                                <a href="{{ route('admin.ads.create') }}" class="btn btn-success">Create</a>

                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image (top)</th>
                                    <th scope="col">Image (side)</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>1</th>
                                        <th scope="row">
                                            @if($ads && $ads->image_top)
                                                <img src="{{ asset('admin/images/' . $ads->image_top) }}" alt="" width="100">
                                            @else
                                                <span>Top rasm mavjud emas</span>
                                            @endif
                                        </th>
                                        <th scope="row">
                                            @if($ads && $ads->image_side)
                                                <img src="{{ asset('admin/images/' . $ads->image_side) }}" alt="" width="100">
                                            @else
                                                <span>Yon rasm mavjud emas</span>
                                            @endif

                                        </th>
                                        <td class="d-flex align-items-center">
                                            <form action="{{ $ads ? route('admin.ads.destroy', $ads->id) : '#' }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button href="" class="btn btn-danger">Delete</button>
                                            </form>
                                            <a href="" class="btn btn-primary">Show</a>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

