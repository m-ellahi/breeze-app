<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{route('product.store')}}"  enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="product_name" :value="__('Product Name')" />
                            <x-text-input id="product_name" name="product_name" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="product_discounted_price" :value="__('Product Discounted Price')" />
                            <x-text-input id="product_discounted_price" name="product_discounted_price" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('product_discounted_price')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="product_actual_price" :value="__('Product Actual Price')" />
                            <x-text-input id="product_actual_price" name="product_actual_price" type="text" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('product_actual_price')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Product Image')" />
                            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Add Product') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>