<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                <form method="post" action="{{ route('product-update', $product->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="product_name" :value="__('Product Name')" />
                        <x-text-input id="product_name" name="product_name" value="{{$product->product_name}}" type="text" class="mt-1 block w-full" autocomplete="product_name" />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="product_discounted_price" :value="__('Product Discounted Price')" />
                        <x-text-input id="product_discounted_price" name="product_discounted_price" value="{{$product->product_discounted_price}}" type="text" class="mt-1 block w-full" autocomplete="product_discounted_price" />
                        <x-input-error :messages="$errors->get('product_discounted_price')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="product_actual_price" :value="__('Product Actual Price')" />
                        <x-text-input id="product_actual_price" name="product_actual_price" type="text"  value="{{$product->product_actual_price}}" class="mt-1 block w-full" autocomplete="product_actual_price" />
                        <x-input-error :messages="$errors->get('product_actual_price')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="current_image" :value="__('Current Product Image')" />
                        @if($product->image)
                            <div class="image-preview-container">
                                <img id="current-image" src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="image-preview">
                            </div>
                        @else
                            <p>No image available.</p>
                        @endif
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('Update Image')" />
                        <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>

                        @if (session('status') === 'product-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
