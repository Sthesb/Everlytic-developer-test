<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
    <div class=" bg-overlay">
        <div class="d-flex align-items-center justify-content-center" style="height: 250px">
            <h1>User Listing</h1>
        </div>
    </div>
    <div class="container pt-4">
        <table class="table table-striped table-hover">
            <thead>
                <th></th>
                <th></th>
                <th>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddNewUser" class="btn bg-dark text-white">Add new user</button>
                </th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="py-3">{{ $user->name }} {{ $user->surname }}</td>
                    <td class="py-3">{{ $user->email }}</td>
                    <td class="py-3">
                        {{-- onclick="event.preventDefault(); if(confirm('Are you sure you want to delete?')) { document.getElementById('delete-form').submit(); }" --}}
                        {{-- <button id="delete" href="#" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#DeleteUser" >
                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button> --}}
                        <form action="{{ url('/delete-user', [$user->id]) }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" class="hide-csrf">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-link">
                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                            </button>
                        </form>



                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
    </div>


    <!-- Add New User Modal -->
    <div class="modal fade" id="AddNewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/add-user" method="post">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="hide-csrf">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control  @if($errors->has('name')) border border-danger @endif" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                            @if($errors->has('name'))
                            <div class="form-text text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control @if($errors->has('surname')) border border-danger @endif" name="surname" placeholder="Enter your surname">
                            @if($errors->has('surname'))
                            <div class="form-text text-danger">
                                {{ $errors->first('surname') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control  @if($errors->has('email')) border border-danger @endif" name="email" placeholder="Enter your email">
                            @if($errors->has('email'))
                            <div class="form-text text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Position</label>
                            <input type="text" class="form-control @if($errors->has('position')) border border-danger @endif" name="position" placeholder="Enter your position">
                            @if($errors->has('position'))
                            <div class="form-text text-danger">
                                {{ $errors->first('position') }}
                            </div>
                            @endif
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-dark text-white px-4">
                            <span class="loader"></span>
                        </button>
                        <button type="button" class="btn btn-link text-decoration-none text-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn bg-dark text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add New User Modal -->
    <div class="modal fade" id="DeleteUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confimDelete" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confimDelete">Confirm delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Please confirm that you would like to delete this user
                </div>
                <form method="POST" action="" id="deleteUser">
                    <div class="modal-footer">
                        <button type="button" class="btn bg-dark text-white px-4">
                            <span class="loader"></span>
                        </button>
                        <button type="button" class="btn btn-link text-decoration-none text-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn bg-dark text-white">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <footer>
        <div class="text-white text-center p-3">
             Copyright User Listing App
        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>