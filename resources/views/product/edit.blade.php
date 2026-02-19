@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать продукт</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Исправлено: метод PATCH для обновления и правильный route -->
          <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <input type="text" value="{{ old('title', $product->title) }}" name="title" class="form-control" placeholder="Наименование">
            </div>
            <div class="form-group">
              <input type="text" value="{{ old('description', $product->description) }}" name="description" class="form-control" placeholder="Описание">
            </div>
            <div class="form-group">
              <!-- Исправлено: для textarea value указывается внутри тега -->
              <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ old('content', $product->content) }}</textarea>
            </div>
            <div class="form-group">
              <input type="text" value="{{ old('price', $product->price) }}" name="price" class="form-control" placeholder="Цена">
            </div>
            <div class="form-group">
              <input type="text" value="{{ old('count', $product->count) }}" name="count" class="form-control" placeholder="Количество на складе">
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="custom-file">
                  <!-- Убрано value у input type="file" -->
                  <input name="preview_image" type="file" class="custom-file-input" id="preview_image">
                  <label class="custom-file-label" for="preview_image">
                    {{ $product->preview_image ? basename($product->preview_image) : 'Выберите файл' }}
                  </label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Загрузить</span>
                </div>
              </div>
              <!-- Добавлено отображение текущего изображения -->
              @if($product->preview_image)
                <img src="{{ asset('storage/' . $product->preview_image) }}" alt="Preview" style="max-width: 200px; margin-top: 10px;">
              @endif
            </div>

            <div class="form-group">
              <select name="category_id" class="form-control select2" style="width: 100%;">
                <option disabled>Выберите категорию</option>
                @foreach($categories as $category)
                  <!-- Добавлено selected для текущей категории -->
                  <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                  </option>
                @endforeach
              </select>
            </div>

            
            <div class="form-group">
              <select name="tags[]" class="tags" multiple="multiple" style="width: 100%;">
                @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                @foreach($product->tags as $selectedTag)
                    @if($tag->id == $selectedTag->id) selected @endif
                @endforeach>
                {{ $tag->title }}
            </option>
        @endforeach
    </select>
</div>
            
<div class="form-group">
    <select name="colors[]" class="colors" multiple="multiple" style="width: 100%;">
        @foreach($colors as $color)
            <option value="{{ $color->id }}"
                @foreach($product->colors as $selectedColor)
                    @if($color->id == $selectedColor->id) selected @endif
                @endforeach
                data-color="{{ $color->title }}">
                #{{ $color->title }}
            </option>
        @endforeach
    </select>
</div>

            <!-- Добавлено поле is_published -->
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" name="is_published" class="form-check-input" id="is_published" {{ $product->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Опубликовано</label>
              </div>
            </div>

            <div class="form-group">
              <!-- Изменена надпись на кнопке -->
              <input type="submit" class="btn btn-primary" value="Обновить">
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    // Инициализация select2
    $('.select2').select2();
    $('.tags').select2();
    $('.colors').select2();

    // Отображение имени файла при выборе
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  });
</script>
@endpush