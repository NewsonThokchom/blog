<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>

<body>
    <article>
        <?= $post ?>
        {{-- {!! $post !!} --}}
        {{-- <h1>
            <a href="/post">My First Post</a>
        </h1>

        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
            and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the
            leap into
            electronic typesetting, remaining essentially unchanged.</p> --}}
    </article>
    <a href="/">Go Back</a>
</body>

</html>