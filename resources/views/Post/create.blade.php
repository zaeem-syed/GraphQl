<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                         <form action="{{url('post/store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea>

                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit"  >Submit</button>
                            </div>

                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
