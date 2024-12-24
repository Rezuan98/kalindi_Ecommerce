
@extends('back-end.master')

@section('admin-title')
Product
@endsection

@push('admin-styles')
<style>
  .card{
        border-radius: 0;
    }
  .table thead tr th{
    background: #f5f5f5;
   }

   .table thead tr th, .table thead tr td{
      font-size: 14px;
   }

    .supplier-information {
        border: 1px solid rgba(0,0,0,.1);
        margin-bottom: 20px;
        padding: 5px 10px;
    }
    label {
    display: inline-block;
    margin-bottom: .5rem;
    font-size: 14px;
}
h4.card-title{
    font-size: 18px!important;
}
</style>
@endpush

@section('admin-content')

  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

 <div class="row">
  <div class="col-md-12">
    <div class="card">

       <div class="card-header">
                      <h4 class="card-title">Update Product</h4>
                    </div>
                    
                <form class="form-horizontal" action="{{ route('product.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                   

                    <div class="col-sm-8">
                      <div class="form-group row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input
                          type="text" name="product_name"
                          class="form-control"
                          id="fname" value="{{ $info->product_name }}"
                          placeholder="Name"
                        />
                         @error('product_name')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $info->id }}">
                    </div>
   
                   
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>
  </div>
 </div>
@endsection