<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @section('title')
                To-Do Liste
            @endsection
        </h2>
    </x-slot>
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

        /* Style buttons */
        .btn {
            background-color: DodgerBlue; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
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
        </div> @endif


        </section class="gradient-custom-2">
        <div class="gradient-custom-2 container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-xl-14">

                    <div class="card mask-custom">
                        <div class="card-body p-6 text-white">


                            <div class="text-center pt-6 pb-4">
                                <h1 class="display-4 fw-bold">@foreach($kullanici as $kullanicii) {{$kullanicii->name}}@endforeach -- To-doQuie</h1>


                            </div>

                            <table class="table text-white mb-0">
                                <thead>
                                <tr>

                                    <th scope="col">Başlık</th>
                                    <th scope="col">İçerik</th>
                                    <th scope="col">Önem</th>
                                    <th scope="col">İşlemler</th>
                                    <th scope="col">Durum</th>
                                </tr>

                                </thead>
                                @foreach($kullanici as $todo)
                                    @foreach($todo->todolarr as $todoo)
                                        @if($todoo->active==0)





                                        @if($todoo->active==1)
                                            <tbody style="background:#485460">

                                        @else

                                        @endif

                                        <tr class="fw-normal">


                                            <td class="align-middle">

                                                <h6>{{$todoo->mission}}</span></h6>
                                            </td>
                                            <td class="align-middle">
                                                <a class="link-info"
                                                   href="{{route('content',$todoo->id)}}">{{ Illuminate\Support\Str::limit($todoo->comment, 10) }}</a>
                                            </td>
                                            <td class="align-middle">
                                                @if($todoo->priorty == "Acil")

                                                    <h6 class="mb-2 "><span
                                                            class="badge bg-danger">{{$todoo->priorty}}</span>
                                                    </h6>
                                                @elseif($todoo->priorty == "Önemli")

                                                    <h6 class="mb-0"><span
                                                            class="badge bg-warning">{{$todoo->priorty}}</span></h6>
                                                @else
                                                    <h6 class="mb-0"><span
                                                            class="badge bg-info">{{$todoo->priorty}}</span>
                                                    </h6>
                                            @endif

                                            <td class="align-middle">
{{--                                                    //DELETE--}}
                                                <button  style="margin-left:0px; margin-bottom: 5px" title="Sil" type="button"
                                                         onclick="sil('{{route('delete',$todoo->id)}}','{{$todo->name}}')"
                                                         class="btn"><i class="fa fa-trash "></i></button>

{{--                                                //UPDATE--}}
                                                @if($todoo->active==0)
                                                <a  style="margin-left:0px; margin-bottom: 5px" title="Düzenle"
                                                         href="{{route('update',$todoo->id)}}"
                                                         class="btn"><i class='far fa-edit'></i></a>
                                                @endif
{{--                                                ACTIVE OR PASSIVE--}}
                                                @if($todoo->active==1)
                                                    <form action="{{route('continue',$todoo->id)}}" method="get">

                                                        <button type="submit" title="Geri al" class="btn"><i
                                                                class="fa fa-undo"></i></button>
                                                    </form>

                                                @elseif($todoo->active==0)
                                                    <form action="{{route('okey',$todoo->id)}}" method="get">

                                                        <button type="submit" title="Tamamla" class="btn"><i
                                                                class="fa fa-check"></i></button>
                                                    </form>
                                                @endif


                                            </td>
                                            <td class="align-middle">
                                                @if($todoo->active==1)

                                                    <h6 class="mb-0"><span style="background: green"
                                                                           class="badge text-bg-successs">Tamamlandı</span>
                                                    </h6>

                                                @else($todoo->active==0)
                                                    <h6 class="mb-0"><span style="background: darkgoldenrod"
                                                                           class="badge text-bg-successs">Yapılacak</span>
                                                    </h6>

                                                @endif

                                            </td>
                                        </tr>
                                        </tbody>@endif
                                    @endforeach

                                @endforeach
                            </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <form method="post" id="delFrm">
            @csrf
            @method('delete')
    <script>


        function sil(path, name) {


        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-danger',
        cancelButton: 'btn btn-success'
        },
        buttonsStyling: true
        })

        swalWithBootstrapButtons.fire({
            @foreach($kullanici as $todo)
                @foreach($todo->todolarr as $todoo)


        title: name.toUpperCase()+' \n {{$todoo->mission}} Görevini silmek istediğinize emin misiniz?',
            @endforeach   @endforeach
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

</x-app-layout>






