@extends('back-end.master')

@section('admin-title')
Manage Product
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

<div class="card">

  <div class="card-header">
                      <h4 class="card-title">Manage Product</h4>
                    </div>
                <div class="card-body">
                  
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-bordered text-center"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Code</th>
                          <th>Category</th>
                          <th>Subcategory</th>
                          
                          <th>Unit</th>
                          <th>Discount</th>
                          <th>Sale Price</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($lists as $info)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/' . $info->product_image) }}" 
                                         alt="{{ $info->product_name }}" 
                                         class="img-thumbnail"
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $info->product_name }}</td>
                                <td>{{ $info->product_code }}</td>
                                <td>{{ $info->category->name }}</td>
                                <td>{{ $info->subcategory->name }}</td>
                                
                                <td>{{ $info->unit->name ?? 'N/A' }}</td>
                                <td>
                                    @if($info->discount_type)
                                        {{ number_format($info->discount_amount) }}
                                        {{ $info->discount_type === 'percentage' ? '%' : '$' }}
                                    @else
                                        No Discount
                                    @endif
                                </td>
                                <td>{{ number_format($info->sale_price,0) }}</td>
                                <td>
                                    <span class="badge {{ $info->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $info->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                  <button title="Action" class="btn without-focus border-0 px-1 py-0 mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
        
                                      <div class="dropdown-menu" role="menu" style="">
                                         
                                        <a class="dropdown-item" href="{{ route('product.view.details',$info->id) }}">
                                          <i class="fa fa-eye"></i> Varient
                                        </a>

                                         <a class="dropdown-item" href="{{ route('product.edit',$info->id) }}">
                                          <i class="fa fa-edit"></i> Edit
                                        </a>
        
                                         <a class="dropdown-item" href=""> 
                                          <i class="fa fa-trash"></i> Delete
                                        </a>
        
                                      </div>
  
                                   
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection

@push('admin-scripts')

@endpush