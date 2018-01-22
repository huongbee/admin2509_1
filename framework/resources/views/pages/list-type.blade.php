@extends('layout') @section('title',"Danh sách loại") @section('content')
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Danh sách loại</b>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
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
                            <tr id="sanpham-{{$t->id}}">
                                <td>{{$stt++}}</td>
                                <td class="name-{{$t->id}}">{{$t->name}}</td>
                                <td><?=$t->description?></td>
                                <td>
                                    <img src="admin/img/hinh_loai_mon_an/{{$t->image}}" style="height:80px">
                                </td>
                                <td>
                                    <a style=" padding-bottom:10px" href="{{route('editType',$t->id)}}"><button class="btn btn-warning btn-sm" style="width:100%;">Edit</button></a>
                                    <br><br>
                                    <button class="btn btn-primary btn-sm btn-call-modal" data-id="{{$t->id}}">Delete</button>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Bạn có chắc chắn xoá <span class="nameObj">...</span> không?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btnAccept">OK</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="Message" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p class="your-mess"></p>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        var id =''
        $('.btn-call-modal').click(function(){
            $('#myModal').modal('show')
            id = $(this).attr('data-id')
            var name = $('.name-'+id).text();
            $('.nameObj').html("<b>"+name+"</b>");
        })
        $('.btnAccept').click(function(){
            if(id!=''){
                $.ajax({
                    url:"{{route('deleteType')}}",
                    data:{
                        id:id
                    },
                    type:"GET",
                    success:function(data){
                        var mess = "";
                        $('#myModal').modal('hide')
                        if($.trim(data)=='existfood'){
                            mess = "Không thể xoá, tồn tại món ăn"
                        }
                        else if($.trim(data)=='success'){
                            mess = "Xoá thành công";
                            $('#sanpham-'+id).hide()
                        }
                        else mess = "Thất bại, vui lòng thử lại"
                        $('.your-mess').html(mess)
                        $('#Message').modal('show')  
                    }  
                })
            }
        })
    })
</script>
@endsection