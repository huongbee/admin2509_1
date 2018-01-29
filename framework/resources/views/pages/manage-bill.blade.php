@extends('layout') @section('title',"Danh sách loại") @section('content')
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
                        <div class="tab-pane fade in @if($key==0) active @endif" id="panel{{$key}}" role="tabpanel">
                            <table id="example" class="example table table-striped ">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email - SDT</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Sản phẩm</th>
                                        <th>Đơn giá - Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt =1?> 
                                    @foreach($bill as $b)
                                    <tr></tr>
                                        <td>{{$stt++}} - {{$b->id}}</td>
                                        <td>{{$b->Customer->name}}</td>
                                        <td>{{$b->Customer->email}} - {{$b->Customer->phone}}</td>
                                        <td>{{$b->Customer->address}}</td>
                                        <td>
                                            @foreach($b->Foods as $food)
                                            {{$food->name}}
                                            <br>
                                            <img src="admin/img/hinh_mon_an/{{$food->image}}" style="height:80px">
                                            <hr>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($b->BillDetail as $d)
                                            {{$d->price}} - {{$d->quantity}}
                                            <hr>
                                            @endforeach
                                        </td>
                                        <td>{{number_format($b->total)}}</td>
                                        <td>
                                            @if($b->status==1)
                                            <p class="btn btn-success btnUpdate" dataid="{{$b->id}}">Chuyển sang đã giao</p>

                                            <br><br>
                                            <p class="btn btn-primary btnCancel" dataid="{{$b->id}}">Huỷ Đơn hàng</p>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
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
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {

        $('.btnUpdate').click(function(){
            
            var id = $(this).attr('dataid')
            var status = 2
            $.ajax({
                url:"{{route('update-status')}}",
                data:{ 
                    id : id,
                    status: status,
                    _token : "{{csrf_token()}}"
                },
                type:"POST",
                success:function(data){
                    alert('Updated!')
                }
            })
        })

        $('.example').DataTable({
            "pageLength": 5
        });

        


    } );
</script>
@endsection