<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title>Upload Listing</title>
    </head>
    <body>
        <div class="container-sm mb-4">
            <form method="POST" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="user_email" id="id_email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input class="form-control" type="number" step=0.01 name="price" id="id_price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="logline" class="form-control" id="id_logline"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Youtube Video id</label>
                    <input class="form-control" name="youtube_id" id="id_youtube">
                </div>
                <div class="mb-3">
                    <label class="form-label">Latitude</label>
                    <input class="form-control" type="number" step=any name="latitude" id="id_latitude">
                </div>
                <div class="mb-3">
                    <label class="form-label">Longitude</label>
                    <input class="form-control" type="number" step=any name="longitude" id="id_longtiude">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sub City</label>
                    <input class="form-control" name="subcity" id="id_subcity">
                </div>
                <div class="mb-3">
                    <label class="form-label">Wereda</label>
                    <input class="form-control" type="number" name="wereda" id="id_wereda">
                </div>
                <div class="mb-3">
                    <label class="form-label">House Number</label>
                    <input class="form-control" name="houseno" id="id_houseno">
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="featured" id="id_featured">
                    <label class="form-label">Featured</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Images</label>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                    <input type="file" class="custom-file-input mb-1" name="images[]">
                </div>


                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>
