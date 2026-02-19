@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('color.create') }}" class="btn btn-primary">Создать</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;" data-dashlane-rid="5288b26fe09a97c3" data-form-type="">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" data-dashlane-rid="ac55bcd383243258" data-form-type="">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default" data-dashlane-label="true" data-dashlane-rid="d138ae21462c39fa" data-form-type="">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td><a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a></td>
                                    <td>
                                      <div style="width: 30px; height: 30px; background: {{ '#' . $color->title}}"></div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
