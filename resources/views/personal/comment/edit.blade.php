@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit comment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit comment</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 ">
                        <form class="row g-3 align-items-end" action="{{ route('personal.comment.update', $comment->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-12">
                                <div class="form-group w-75">
                                    <textarea id="summernote" name="message">{{ $comment->message }}</textarea>
                                    @error('message')
                                        <div class="text-danger mt-3">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-12">
                                <button type="submit" class="w-25 btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
