<x-app-layout>
    @section('title')
        Güncelleme
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

                                <h1 class="display-4 fw-bold">To-doQuie Güncelleme</h1>

@foreach($kullanicilar as $kullanici)

                                <form class="form-group" style="text-align: center" action="{{route('UpdatePost',$kullanici->id)}}"
                                      method="post">
                                    @csrf

                                    {{ csrf_field() }}
                                    <br>

                                    <input type="text" class="form-control" name="mission" value="{{$kullanici->mission}}"
                                           aria-label="Görev"><br>
                                    <div>@endforeach
                                        @error('mission')
                                        <div class="alert alert-danger">
                                            {{$errors->first('mission')}}
                                        </div>
                                        @enderror


                                        <br>
                                        <lu>Öncelik Seviyesi</lu>
                                        <select style="background-color: #2563eb" class="mt-3" name="priorty" >

                                            <option value="{{$kullanici->priorty}}">{{$kullanici->priorty}}</option>
                                           @if($kullanici->priorty != 'Acil') <option value="Acil">Acil</option>@endif
                                            @if($kullanici->priorty != 'Çok Önemli')  <option value="Çok Önemli">Çok Önemli</option>@endif
                                          @if($kullanici->priorty != 'Önemli')  <option value="Önemli"> Önemli</option>@endif
                                        </select>


                                    </div>
                                    @error('priorty')
                                    <div class="alert alert-danger border-b-2">
                                        {{$errors->first('priorty')}}
                                    </div>
                                    @enderror
                                    <br><br>


                                    <div class="form-group"></div>
                                    <label style="color: #eee" for="comment">Açıklama</label>
                                    <textarea class="form-control" name="comment" cols="10" rows="4">{{$kullanici->comment}}</textarea>
                                    @error('comment')
                                    <div class="alert alert-danger">
                                        {{$errors->first('comment')}}
                                    </div>
                                    @enderror


                                    <br>

                                    <button style="background-color: #7e40f6" class="btn btn-primary" type="submit">Kaydet</button>

                                </form>
                                <a href="{{route('done')}}" style="float:right;" class="btn btn-success my-2  align" ;>
                                    Listeye git</a>


                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>

    </section>

</x-app-layout>

