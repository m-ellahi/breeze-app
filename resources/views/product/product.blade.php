<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('product.add')}}" class="btn btn-primary">Add Product</a>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Discounted Price</th>
                            <th>Product Actual Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $single_product)
                        <tr>
                            <td>{{ $single_product->product_name }}</td>
                            <td>
                                <img style="width:70px;height:70px; border-radius:50%;" src="{{ asset('storage/'.$single_product->image) }}" alt="{{ $single_product->image }}"/>
                            </td>
                            <td>${{ $single_product->product_discounted_price }}</td>
                            <td>${{ $single_product->product_actual_price }}</td>
                            <td>
                                <a href="{{ route('view-product', $single_product->id) }}"><i class="text-success fs-5 fa-regular fa-eye"></i></a>
                                <a href="{{ url('edit-product/' . $single_product->id) }}"><i class="text-warning fs-5 fa-regular fa-pen-to-square mx-2"></i></a>   
                                <form action="{{ route('product.destroy', $single_product->id) }}" method="POST" class="delete-form" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger bg-transparent border-0" style="background: none; border: none; cursor: pointer;">
                                        <i class="fs-5 fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
