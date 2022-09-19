<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<section class="hero is-primary">
    <div class="hero-body">
        <p class="title">
            Task Managements
        </p>
    </div>
</section>
@if($errors->any())
    <div class="notification is-danger">
        <button class="delete"></button>
        <ul>
            @foreach(\Illuminate\Support\Arr::flatten($errors->get('*')) as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="section">
    <h1 class="title">Tasks | Index</h1>
    <h2 class="subtitle">Can create new task <a href="{{ route('tasks.create') }}">here.</a></h2>
    <div class="tile">
        @foreach($tasks as $task)
            <div class="tile is-1" style="margin: 4px">
                <div class="box @if($task->is_completed) has-background-grey-lighter @endif">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>{{ mb_strimwidth($task->title, 0, 15, '...') }}</strong>
                                    <br>
                                    {{ mb_strimwidth($task->description, 0, 15, '...') }}
                                </p>
                            </div>

                            <nav class="level">
                                <div class="level-left">
                                </div>
                                <div class="level-right">
                                    @if($task->is_completed)
                                        <div class="level-item">
                                            <form method="post" action="{{ route('tasks.yet_complete', $task) }}">
                                                @csrf
                                                @method('PATCH')
                                                <span class="icon">
                                                <button type="submit" class="has-text-link is-clickable"
                                                        style="background: none; border: unset">
                                                    <i class="fa-solid fa-toggle-off"></i>
                                                </button>
                                            </span>
                                            </form>
                                        </div>
                                    @else
                                        <div class="level-item">
                                            <form method="post" action="{{ route('tasks.complete', $task) }}">
                                                @csrf
                                                @method('PATCH')
                                                <span class="icon">
                                                <button type="submit" class="has-text-link is-clickable"
                                                        style="background: none; border: unset">
                                                    <i class="fa-solid fa-toggle-on"></i>
                                                </button>
                                            </span>
                                            </form>
                                        </div>
                                    @endif

                                    <div class="level-item">
                                        <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                            @csrf
                                            @method('DELETE')
                                            <span class="icon">
                                                <button type="submit" class="has-text-link is-clickable"
                                                        style="background: none; border: unset">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </span>
                                        </form>
                                    </div>
                                    <div class="level-item">
                                        <a href="{{ route('tasks.show', $task) }}">
                                            <span class="icon">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </article>
                </div>
            </div>
        @endforeach
    </div>
</section>
</body>
</html>
