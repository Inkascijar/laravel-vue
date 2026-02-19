@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Продукт: {{ $product->title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Главная</li>
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
              <div class="card-header d-flex p-3">
                <div class="mr-4">
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                </div>
                <form action="{{ route('product.delete', $product->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
              </div>

              <div class="card-body">
                <!-- Изображение продукта -->
                @if($product->preview_image)
                  <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $product->preview_image) }}" 
                         alt="{{ $product->title }}" 
                         style="max-height: 300px; width: auto;">
                  </div>
                @endif

                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                      <td>Название</td>
                      <td>{{ $product->title }}</td>
                    </tr>
                    <tr>
                      <td>Описание</td>
                      <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                      <td>Контент</td>
                      <td>{!! nl2br(e($product->content)) !!}</td>
                    </tr>
                    <tr>
                    <td>Категория</td>
                    <td>{{ $product->category->title ?? 'Без категории' }}</td>
                    </tr>
                    <tr>
                      <td>Цена</td>
                      <td>{{ number_format($product->price, 2) }} ₽</td>
                    </tr>
                    <tr>
                      <td>Количество</td>
                      <td>{{ $product->count }}</td>
                    </tr>
                    <tr>
                      <td>Статус</td>
                      <td>
                        <span class="badge badge-{{ $product->is_published ? 'success' : 'danger' }}">
                          {{ $product->is_published ? 'Опубликован' : 'Не опубликован' }}
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>Теги</td>
                      <td>
                        @foreach($product->tags as $tag)
                          <span class="badge badge-info mr-1">{{ $tag->title }}</span>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td>Цвета</td>
                      <td>
                        @foreach($product->colors as $color)
                          <span class="badge mr-1" style="background-color: #{{ $color->title }}; color: white;">
                            #{{ $color->title }}
                          </span>
                        @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td>Дата создания</td>
                      <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                    <tr>
                      <td>Дата обновления</td>
                      <td>{{ $product->updated_at->format('d.m.Y H:i') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection