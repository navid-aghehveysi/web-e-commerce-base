@extends('panel.layouts.master')

@push('vite-scripts')
    @vite('resources/js/panel/pages/module.js')
@endpush
@section('title' , 'ماژول  - ویرایش')

@section('bread-crumb')

    <li class="bread-crumb-path">
        <a href="{{ route('panel.module.index') }}">
            <span>ماژول</span>
            <span>/</span>
        </a>
    </li>
    <li class="bread-crumb-target">
        <span>ویرایش</span>
    </li>
@endsection
@section('main-header')
    <section class="main-header ">

        <section class="flex items-center justify-between">

            <h2 class="text-2xl">ویرایش ماژول</h2>
            <div class="flex items-center justify-between">
                <a href="{{ route('panel.module.index') }}" class="btn bg-red-50 text-red-700 ring-red-600/20">
                    <span></span>
                    <span>بازگشت به صفحه اصلی</span>
                </a>
            </div>
        </section>

    </section>
@endsection
@section('content')

{{--    @if( auth()->user()->can('create' , \App\Models\Module::class))--}}

        <!-- > Content  -->
        <div class="simple-form">

            <form action="{{ route('panel.module.update', $module->id) }}" method="post"  id="form"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <section class="grid grid-cols-5 gap-y-8 gap-x-4 mb-4">
                    <div class="w-full col-span-5 lg:col-span-2">
                        <label for="name_en" class="">نام لاتین</label>
                        <input type="text" name="name_en" id="name_en"  value="{{ old('name_en', $module->name_en) }}">
                        @error('name_en')
                        <span class="text-rose-600" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="w-full col-span-5 lg:col-span-2">
                        <label for="name_fa" class="">نام پارسی</label>
                        <input type="text" name="name_fa" id="name_fa"  value="{{ old('name_fa', $module->name_fa) }}">
                        @error('name_fa')
                        <span class="text-rose-600" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="w-full col-span-5 lg:col-span-1">
                        <label for="status" class="">وضعیت</label>
                        <select id="status" name="status" class="">
                            @foreach($statuses as $value => $label)
                                <option value="{{$value}}"
                                        {{ old('status', $module->status) == $value ? 'selected' : ''}} >
                                    {{$label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="text-rose-600" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>



                    <div class="w-full col-span-5 lg:col-span-4">
                        <label for="icon" class="">آیکون</label>
                        <input type="file" name="icon" id="icon" accept=".svg,image/svg+xml">
                        @error('icon')
                        <span class="text-rose-600" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="w-full col-span-5 lg:col-span-1">
                        <label for="order" class="">ترتیب در منو</label>
                        <input type="text" name="order" id="order" value="{{ old('order',$module->order) }}">
                        @error('order')
                        <span class="text-rose-600" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>


                    <div class="w-full col-span-5">
                        <label for="description" class="">توضیحات</label>
                        <textarea id="description" name="description">{{ old('description', $module->description)
                        }}</textarea>
                        @error('description')
                        <span class="text-rose-600" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </section>
                <button type="submit" class="btn bg-green-50 text-green-700 ring-green-600/20">
                    ثبت اطلاعات
                </button>
            </form>

        </div>
{{--    @endif--}}
@endsection


