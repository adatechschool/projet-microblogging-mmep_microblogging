<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InstaFeed</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .posts-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .post {
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Maintain a square aspect ratio */
            width: 100%;
            padding-top: 100%; /* Creates a square container */
        }
        .post img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the container */
            border-radius: 8px;
        }
        .post .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 8px;
            text-align: center;
            padding: 10px;
        }
        .post:hover .overlay {
            opacity: 1;
        }
        .overlay-text {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .user-name {
            font-size: 16px;
            font-weight: bold;
        }
        .profile-button {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #ffffff; /* Optional: add a border */
            background-color: #ffffff; /* Optional: background color for better visibility */
        }
        .profile-button img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container posts-container">
        <a href="{{ route('user.profile') }}" class="profile-button">
            <img src="{{ asset('images/'.$user->profile_picture) }}" alt="Profile Picture">
        </a>

        <h1 class="text-center mb-4">InstaFeed</h1>

        <!-- Posts Grid -->
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="post">
                        <img src="{{ asset('images/'.$post->image) }}" alt="Post Image">
                        <div class="overlay">
                            <div class="overlay-text">
                                {{ $post->content ?? 'No caption' }}
                            </div>
                            <div class="user-name">
                                {{ $post->user->name }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
