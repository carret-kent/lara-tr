<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
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
    <h1 class="title">Tasks | Show: {{ $task->id }}</h1>
    <div class="card">
        <div class="card-content">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ID</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $task->id }}" disabled>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Title</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $task->title }}" disabled>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Description</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" disabled>{{ $task->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">is_completed</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $task->is_completed ? 'Done' : 'Yet' }}" disabled>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">created_at</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $task->created_at }}" disabled>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">updated_at</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $task->updated_at }}" disabled>
                        </p>
                    </div>
                </div>
            </div>

            <footer class="card-footer">
                <a class="card-footer-item button" href="">
                    Edit
                </a>
            </footer>
        </div>
    </div>
</section>
</body>
</html>
