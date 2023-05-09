<x-app-layout>
    @section('title')
        Kullanıcı Oluşturucu
    @endsection
    <style>

        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #7e40f6;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(
                to right,
                rgba(126, 64, 246, 1),
                rgba(80, 139, 252, 1)
            );

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(
                to right,
                rgba(126, 64, 246, 1),
                rgba(80, 139, 252, 1)
            );
        }

        .mask-custom {
            background: rgba(24, 24, 16, 0.2);
            border-radius: 2em;
            backdrop-filter: blur(25px);
            border: 2px solid rgba(255, 255, 255, 0.05);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }


    </style>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <section class=" gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-9">

                    <div class="card mask-custom">
                        <div class="card-body p-6 text-white">


                            <div class="text-center pt-3 pb-2">

                                <h1 class="display-4 fw-bold"> To-DoQuie <br>
                                    <hr> Kullanıcı Güncelleme</h1>



                                <form method="POST" action="{{route('UpdateUsersPost',$users->id)}}">
                                    @csrf

                                    <br><br>
                                    <!-- Name -->
                                    <div>
                                        <label for="name"> İsim</label>
                                        <input style="color: #1a202c" id="name"  value="{{$users->name}}" placeholder="İsim" class="block mt-1 w-full" type="text" name="name" required autofocus  />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <br>
                                    <div>
                                        <label for="username">Kullanıcı adı</label>
                                        <input style="color: #1a202c" id="name" placeholder="Kullanıcı adı" class="block mt-1 w-full" type="text" name="username" value="{{$users->username}}" required autofocus />
                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                    </div>
                                    <br>

                                    <div class="mt-4">
                                        <label for="E-Maili">E-mail</label>
                                        <x-text-input style="color: black" id="email" placeholder="E-Mail" class="block mt-1 w-full" type="email" name="email" value="{{$users->email}}" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="mt-3">

                                        <label for="password"> Şifre</label>

                                        <input style="color: black" id="password" class="block mt-1 w-full"
                                                      type="password"
                                                      name="password"
                                                      required autocomplete="new-password" value="{{$users->password}}"/>


                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <lu>Rolü:</lu>

                                    <select style="background-color: #2563eb" class="mt-3" name="role" >
                                        @foreach($roles as $role)
                                            <option value="{{$role->name}}" >{{$role->name}}</option>
                                @endforeach</div>
                            </select>

                            <select style="background-color: #2563eb" class="mt-3" name="status" >

                                    <option value="0" >Pasif</option>
                                    <option value="1" >Aktif</option>

                            </div>
                        </select>


                            <br><br>
                            <br>

                            <button style="background-color: #7e40f6" class="btn btn-primary" type="submit">Kaydet</button>

                            </form>
                            <a href="{{route('users')}}" style="float:right;" class="btn btn-success my-2  align" ;>
                                Listeye gitttt</a>


                        </div>

                    </div>
                </div>




            </div>
        </div>
        </div>

    </section>

</x-app-layout>

