 @extends('layouts.BackEnd')

 @section('content')
 <div class="container mt-5">
     <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                     <div class="card mb-3">

                         <div class="card-body">

                             <div class="pt-4 pb-2">
                                 <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                 <p class="text-center small">Enter your personal details to create account</p>
                             </div>
                             @if($errors->any())
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                             @endif

                             <form class="row g-3 needs-validation" action="{{route('register')}}" method="POST">

                                 @csrf
                                 <div class="col-12">
                                     <label for="yourName" class="form-label">Name</label>
                                     <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="yourName">
                                 </div>

                                 <div class="col-12">
                                     <label for="yourEmail" class="form-label">Email</label>
                                     <input type="email" name="email" class="form-control" id="yourEmail">
                                 </div>

                                 <div class="col-12">
                                     <label for="yourPassword" class="form-label">Password</label>
                                     <input type="password" name="password" class="form-control" id="yourPassword">
                                 </div>
                                 <div class="col-12">
                                     <label for="role" class="form-label">Role</label>

                                     <select name="role" name="role" class="form-select " id="">
                                         @foreach ($Roles as $role)
                                         <option value="{{$role->name}}">{{$role->name}}</option>
                                         @endforeach
                                     </select>

                                 </div>

                                 <div class="col-12">
                                     <label for="role" class="form-label">System</label>

                                     <select name="system" class="form-select " id="">
                                         @foreach ($Systems as $system)
                                         <option value="{{$system->name}}">{{$system->name}}</option>
                                         @endforeach
                                     </select>

                                 </div>
                                 <div class="col-12">
                                     <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                 </div>

                             </form>

                         </div>
                     </div>

                 </div>
             </div>
         </div>

     </section>

 </div>
 @endsection