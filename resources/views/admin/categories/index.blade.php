@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Главная') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Главная') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Категории</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('categories.create') }}"
                       type="button"
                       class="btn btn-primary mb-3 font-weight-bold">
                        Добавить категорию
                    </a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Наименование</th>
                            <th>Slug</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <form action="{{ route('categories.destroy', $category) }}" method="post" class="float-left mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-2"><i class="far fa-trash-alt"></i></button>
                                </form>

                            </td>
                        </tr>
                        @empty
                            <p>Категорий нет</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
