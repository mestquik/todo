<x-app-layout>



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

<section class=" gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-14">

                <div class="card mask-custom">
                    <div class="card-body p-6 text-white">
                        <style>

                            .seviye {
                                display: inline-flex;
                                color: #ff3838;

                            }

                            .seviye1 {
                                display: inline-flex;

                            }


                        </style>
                        @if($kullanici['priorty'] == 'Acil')
                            <tr class="fw-normal">


                                <h2 style="text-align:left; border-bottom: 1px solid red; color: red; display: inline-flex" ><strong>Öncelik Seviyesi: {{$kullanici->priorty}} </strong></h2>



                                @elseif($kullanici['priorty']=='Çok Önemli')
                                    <h2 style="text-align:left; border-bottom: 1px solid lightgrey; color: sandybrown; display: inline-flex" ><strong>Öncelik Seviyesi: {{$kullanici->priorty}} </strong></h2>


                                @elseif($kullanici['priorty']=='Önemli')
                                    <h2 class="display-5 fw-bold lh-1" style="border-bottom: 1px solid chartreuse; color: darkturquoise; display: inline-flex">Öncelik Seviyesi:  {{$kullanici->priorty}}</h2>@endif


                                <br><br>

                                <th>
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="avatar 1" style="width: 45px; height: auto;">
                                    <h2 style="display: inline-flex; border-bottom: 1px solid #fff200"
                                        class="display-5">{{$userid->name}} </h2>


                                </th>

                                <br><br><br>
                                <td>
                                    <h1 style="text-align: center; display: inline-flex" class="display-4"> Yapılan To-do: &nbsp;<h1  class="display-4" style="color: darkturquoise; display: inline-flex; border-bottom: 1px solid cyan">{{ucfirst(strtolower($kullanici['mission']))}} </h1>  </h1>
                                    <br><br><br><br>




                                    <h1 style="border-bottom: 1px solid gray" class="display-4">Açıklama</h1>


                                    <br>
                                    <h5>{{$kullanici->comment}}</h5>

                                </td>


                            </tr>
                            <br><br><br>

                            </tbody>
                            </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</x-app-layout>
