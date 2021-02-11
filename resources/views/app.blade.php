

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WagyuGrader') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>


    <title>Image upload</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>



<body class="font-sans antialiased">
    @inertia

<div class="container">



    <div class="panel panel-primary">

      <div class="panel-heading"><h2>image upload</h2></div>

      <div class="panel-body">



        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="images/{{ Session::get('image') }}">

        @endif



        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">



                <div class="col-md-6">

                    <input type="file" name="image" class="form-control">

                </div>



                <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>



            </div>

        </form>



      </div>

    </div>

</div>

</body>



</html>
