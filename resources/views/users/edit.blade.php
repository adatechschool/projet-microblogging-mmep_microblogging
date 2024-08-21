<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer Profil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .edit-section {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .edit-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .edit-section p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        .edit-section .form-group {
            margin-bottom: 20px;
        }
        .edit-section .form-control {
            border-radius: 4px;
        }
        .edit-section .btn-primary {
            margin-top: 10px;
        }
        .image-upload-section {
            margin-top: 40px;
            text-align: center;
        }
        .image-upload-section h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .image-upload-section .alert {
            margin-bottom: 20px;
        }
        .file-input-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        .file-input-wrapper label {
            display: inline-block;
            position: relative;
            overflow: hidden;
            max-width: 400px;
            margin-bottom: 10px;
        }
        .file-input-wrapper input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        .file-input-wrapper .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 500;
            color: #ffffff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .file-input-wrapper .custom-file-upload:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-submit {
            margin-top: 10px;
        }
        .image-upload-section img {
            max-width: 100%;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Edit section -->
        <div class="edit-section">
            <header>
                <h2>{{ __('Modifier votre biographie') }}</h2>
                <p>{{ __("Veuillez modifier votre biographie ci-dessous.") }}</p>
            </header>

            <!-- Form for editing biography -->
            <form method="post" action="{{ route('user.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="biography">{{ __('Biographie') }}</label>
                    <input id="biography" name="biography" type="text" class="form-control" value="{{ old('biography', $user->biography) }}" required autofocus autocomplete="name" />
                    @error('biography')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>

                @if (session('status') === 'profile-updated')
                    <div class="mt-3 alert alert-success">
                        {{ __('Enregistré.') }}
                    </div>
                @endif
            </form>
        </div>

        <!-- Image upload section -->
        <div class="image-upload-section">
            <h2>{{ __('Photo de profil') }}</h2>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
                <img src="{{ asset('images/'.Session::get('image')) }}" alt="Image téléchargée" />
            @endif

            <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="file-input-wrapper">
                    <label class="custom-file-upload">
                        <input type="file" name="image" />
                        Sélectionner une image
                    </label>
                    <button type="submit" class="btn btn-primary btn-submit">Télécharger</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
