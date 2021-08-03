@extends('admin.layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('Статьи') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('Статьи') }}</li>
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
                    <h3 class="card-title">{{ __('Статьи') }}</h3>

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
                    <a href="{{ route('posts.create') }}"
                       type="button"
                       class="btn btn-primary mb-3 font-weight-bold">
                        {{ __('Добавить статью') }}
                    </a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Наименование</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Дата</th>
                            <th style="width: 175px">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->title }}</td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-primary">{{$tag->title}}</span>
                                @endforeach
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="float-left mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('{{ __('Подтвердите удаление') }}')"><i class="far fa-trash-alt"></i></button>
                                </form>

                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <p>{{ __('Статей нет') }}</p>
                                </td>
                            </tr>
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
