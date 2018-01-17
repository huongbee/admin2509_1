@extends('layout') @section('title',"Danh sách loại") @section('content')
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách loại</b>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại</th>
                                <th>Mô tả</th>
                                <th>Hình</th>
                                <th>Tuỳ chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;?>
                            @foreach($types as $t)
                            <tr>
                                <td>{{$stt++}}</td>
                                <td>{{$t->name}}</td>
                                <td>{{$t->description}}</td>
                                <td>
                                    <img src="admin/img/hinh_loai_mon_an/{{$t->image}}" style="height:80px">
                                </td>
                                <td>
                                    Edit | Delete
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$types->links()}}
                </div>
            </div>
        </section>
    </div>
</section>
@endsection