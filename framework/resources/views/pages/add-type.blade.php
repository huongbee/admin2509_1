@extends('layout') 
@section('title',"Thêm loại mới") 
@section('content')
<section class="wrapper">
    <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Thêm loại mới</b>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2">Tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên loại">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Mô tả:</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="desc"></textarea>
                                <script>
                                    CKEDITOR.replace('desc')
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </div>
</section>
@endsection