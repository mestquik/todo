
<x-app-layout>
@role('Admin|SuperAdmin')
    @section('title')
        Kullanıcılar
    @endsection
        <style>
            .btn {
                background-color: DodgerBlue; /* Blue background */
                border: none; /* Remove borders */
                color: white; /* White text */


                cursor: pointer; /* Mouse pointer on hover */
                float: left;

                text-align: center;
                margin-left:auto;
                margin-right:auto;
                padding: 10px;
                margin: 15px;
            }


            /* Darker background on mouse-over */
            .btn:hover {
                background-color: RoyalBlue;
            }

        </style>

        <br><br>


    @if(session()->has('success'))
        <div class="alert alert-success">


            {{ session()->get('success') }}
        </div> @endif
        <body class="vsc-initialized">
        <div class="container-xl">

            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8"><h2>Kullanıcı <b>Yönetimi</b></h2></div>

                            <div class="col-sm-4">
                                <div class="search-box">

                                    <input type="text" class="form-control" placeholder="Search…">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered"><br><br>
                        <a href="{{route('createUser')}}" style="float: right" type="button" class="btn btn-success">Yeni Kullanıcı Ekle</a>
                        <br><br>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ad Soyad <i class="fa fa-sort"></i></th>
                            <th>E-mail</th>
                            <th>Rol <i class="fa fa-sort"></i></th>
                            <th>İşlemler</th>

                            <th><a  id="aa" href="">Durum</a> <i class="fa fa-sort"></i></th>
                        </tr>
                        </thead>


                        @foreach($users12 as $user)
                                @if($user->status == 0)

                                        <tbody style="background-color: #718096">
                                        @endif




                                        <tr >
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td> @foreach($user->roles as $role) {{$role->name}}</td> @endforeach
                            <td >
                                <a href="{{route('updateUsers',$user->id)}}"  title="Düzenle" data-toggle="tooltip" data-original-title="Düzenle"  class="btn"><i class='far fa-edit'></i></a></a>

                                <button  style="margin-left:0px ;background-color: crimson" title="Sil" type="button" data-doggle="tooltip"
                                         onclick="sil('{{route('DeleteUser',$user->id)}}','{{$user->name}}')"
                                         class="btn"><i  class="fa fa-trash  "></i></button>
                            </td>
                            <td>@if($user->status==0) Pasif @else Aktif  @endif</td>
                        </tr>


                        </tbody>@endforeach
                    </table>
                    <div class="clearfix">

                        <ul class="pagination">
                            {{$users12->links()}}
                        </ul>
                    </div>


                </div>
            </div>
        </div>

        </body>







    <form method="post" id="delFrm">
        @csrf
        @method('delete')
    </form>
        <script>


            function sil(path, name) {


                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btnn btn-danger',
                        cancelButton: 'btnn btn-success'
                    },
                    buttonsStyling: true
                })

                swalWithBootstrapButtons.fire({
                    @foreach($users12 as $user)
                    title: name.toUpperCase()+' \n {{$user->name}} Kullanıcısını silmek istediğinize emin misiniz?',
                    @endforeach
                    text: "Geri alamayacaksınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Evet, sil',
                    cancelButtonText: 'Hayır, iptal et!',
                    reverseButtons: true
                }).then((result) => {
                        if (result.isConfirmed) {

                            $('#delFrm').attr('action', path);
                            $('#delFrm').submit();

                        }
                    }
                )
            }






        </script>



    @endrole


</x-app-layout>

