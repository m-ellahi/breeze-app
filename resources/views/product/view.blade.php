<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row align-items-center">
                    <div class="col-lg-4">
                        <img class="w-100" src="{{ asset('storage/'.$product->image) }}"/>
                    </div>
                    <div class="col-lg-6 product_content">
                        <h2><strong>Product Name</strong> : {{$product->product_name}}</h2>
                        <div class="price">
                            <span><strong>Discounted Price</strong> : {{$product->product_discounted_price}}</span></br>
                            <span><strong>Actual Price</strong> : {{$product->product_actual_price}}</span>
                        </div>
                    </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
