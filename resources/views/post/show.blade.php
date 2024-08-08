@extends('layouts.app')

@section('content')
    <style>
        /* Стили для ссылок */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Контейнер для кнопок */
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px; /* Добавим отступ сверху */
        }

        /* Стили для карточек */
        .card {
            margin-top: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px;
        }

        /* Стили для заголовков карточек */
        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        /* Стили для содержания карточек */
        .card-content {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        /* Стили для комментариев */
        .comment {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Стили для имени пользователя в комментариях */
        .comment-author {
            font-weight: bold;
            color: #555;
        }

        /* Кнопки для редактирования и удаления комментариев */
        .comment-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Ссылка на страницу Index -->
                        <a class="btn btn-info btn-block" href="{{ route('posts.index') }}">Страница Index</a>

                        <!-- Заголовок и содержание поста -->
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <p class="card-content">{{ $post->content }}</p>

                        <!-- Кнопки для редактирования и удаления поста -->
                        <div class="button-container">
                            @can('update', $post)
                                <a class="btn btn-warning btn-block" href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
                            @endcan
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-block" onclick="return confirm('Вы уверены?')">Удалить</button>
                                </form>
                            @endcan
                        </div>

                        <!-- Форма для комментариев -->
                        <h4>Комментарии</h4>
                        <form action="{{ route('store.comment', $post->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea name="content" class="form-control" placeholder="Ваш комментарий"></textarea><br>
                            <button class="btn btn-info btn-block">Отправить комментарий</button>
                        </form>

                        <!-- Комментарии -->
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                <p>{{ $comment->content }}</p>
                                <div class="comment-author">Автор: {{ $comment->user->name }}</div>
                                <!-- Кнопки для редактирования и удаления комментария -->
                                <div class="comment-buttons">
                                    @can('delete', $comment)
                                        <a class="btn btn-warning" href="{{ route('edit.comment', $comment->id) }}">Редактировать</a>
                                        <form action="{{ route('destroy.comment', $comment->id) }}" method="post">
                                            <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
