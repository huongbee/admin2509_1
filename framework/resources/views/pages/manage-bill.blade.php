@extends('layout') @section('title',"Danh sách loại") @section('content')

<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Quản lý đơn hàng</b>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs nav-justified">
                        @for($i=0;$i
                        <3;$i++) <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel{{$i}}" role="tab">
                                @if($i==0) Đơn hàng chưa xác nhận @elseif($i==1) Đơn hàng chưa giao @else Đơn hàng đã hoàn thành @endif
                            </a>
                            </li>
                            @endfor

                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content card">
                        @foreach($bills as $key=>$bill)
                        <div class="tab-pane fade in" id="panel{{$key}}" role="tabpanel">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Sản phẩm - Đơn giá</th>
                                        <th>Hình</th>
                                        <th>Chuyển trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt =1?> @foreach($bill as $b)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td>Doe</td>
                                        <td>john@example.com</td>
                                    </tr>
                                    $endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </div>
</section>
@endsection