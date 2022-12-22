@extends('admin_layout')
@section('admin_content')
    <div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Màu 
            </header>
                <div class="panel-body">

                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-color')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Màu</label>
                            <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="hãy điền vào đây" name="color_name" class="form-control " id="slug" placeholder="Tên sản phẩm" onkeyup="ChangeToSlug();"> 

                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Sản Phẩm</label>
                                <select name="product" class="form-control input-sm m-bot15">
                                @foreach($product as $key => $brand)
                                    <option value="{{$brand->ID_SP}}">{{$brand->TenSP}}</option>
                                @endforeach
                                    
                            </select>
                        </div>
                        
                        <button type="submit" name="add_color" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
@endsection