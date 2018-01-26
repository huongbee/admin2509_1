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
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab">Đơn hàng chưa giao</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel2" role="tab">Đơn hàng chưa xác nhận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panel3" role="tab">đơn hàng đã hoàn thành</a>
                        </li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content card">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
                            Đơn hàng chưa giao
                        </div>
                        <!--/.Panel 1-->
                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel2" role="tabpanel">
                            Đơn hàng chưa xác nhận
                        </div>
                        <!--/.Panel 2-->
                        <!--Panel 3-->
                        <div class="tab-pane fade" id="panel3" role="tabpanel">
                            đơn hàng đã hoàn thành
                        </div>
                        <!--/.Panel 3-->
                    </div>

                </div>
            </div>
        </section>
    </div>
</section>
@endsection