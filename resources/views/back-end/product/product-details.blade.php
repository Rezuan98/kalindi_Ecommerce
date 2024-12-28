@extends('back-end.master')

@section('admin-title')
Product Details
@endsection



@section('admin-content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Product Variants List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>SKU</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($variants as $variant)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('uploads/products/' . $variant->product->product_image) }}" 
                                         alt="{{ $variant->product->product_name }}" 
                                         class="img-thumbnail me-2"
                                         style="width: 40px; height: 40px; object-fit: cover;">
                                    <span>{{ $variant->product->product_name }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background-color: {{ $variant->color->code ?? '#000' }}">
                                    {{ $variant->color->name }}
                                </span>
                            </td>
                            <td>{{ $variant->size->name }}</td>
                            <td><code>{{ $variant->sku }}</code></td>
                            <td>
                                @if($variant->stock_quantity <= 10)
                                    <span class="text-danger fw-bold">{{ $variant->stock_quantity }}</span>
                                @else
                                    {{ $variant->stock_quantity }}
                                @endif
                            </td>
                            <td>${{ number_format($variant->variant_price, 2) }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input status-switch" 
                                           data-id="{{ $variant->id }}"
                                           {{ $variant->status ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info edit-variant" 
                                        data-id="{{ $variant->id }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editVariantModal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a href="" 
                                   class="btn btn-sm btn-danger delete-variant">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection