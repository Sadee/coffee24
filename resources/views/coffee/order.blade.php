<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <h1 class="display-3">Order A Coffee</h1>

                            <form method="post" action="{{ route('coffee.order') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="dateInsert">What do you want?</label>
                                    <select class="form-control m-bot15" name="coffeeTypes_id">
                                        <option value="">Please select what do you want</option>
                                        @if(count($coffeeTypes) > 0)
                                            @foreach($coffeeTypes as $k=>$type)
                                                <option value="{{$k}}">{{$type}}</option>
                                            @endForeach
                                        @else
                                            No Record Found
                                        @endif
                                    </select>
                                    @if ($errors->has('coffeeTypes_id'))
                                        <span class="alert-danger">{{ $errors->first('coffeeTypes_id') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Order</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

