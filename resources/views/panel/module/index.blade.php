@extends('panel.layouts.master')
@push('vite-scripts')
    @vite('resources/js/panel/pages/module.js')
@endpush
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}" />
@endpush
@push('script')
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@section('title' ,'ماژول ها - نمایش')

@section('bread-crumb')

    <li class="bread-crumb-path">
        <a href="{{ route('panel.module.index') }}">
            <span>ماژول</span>
            <span>/</span>
        </a>
    </li>
    <li class="bread-crumb-target">
        <span>نمایش</span>
    </li>
@endsection
@section('main-header')
    <section class="main-header ">

        <section class="flex items-center justify-between">
            <h2 class="text-xl">
                <span>نمایش ماژول ها </span>
            </h2>
            <div class="flex items-center justify-between">
                <a href="{{ route('panel.module.create') }}" class="btn bg-green-50 text-green-700 ring-green-600/20">
                    <span></span>
                    <span>ساخت ماژول جدید</span>
                </a>
            </div>
        </section>

    </section>
@endsection
@section('content')
    <!-- > Content  -->
    <div class="">

        <div class="simple-table">

            <table class="">
                <thead class="sticky top-0">
                    <tr>
                        <th scope="col" class="list-counter">#</th>
                        <th scope="col">آیکون</th>
                        <th scope="col">نام پارسی</th>
                        <th scope="col">نام لاتین</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @foreach($modules as $module)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <span class="inline-block w-6 h-6">{!! $module->icon !!}</span>
                            </td>
                            <td>{{$module->name_fa}}</td>

                            <td>{{$module->name_en}}</td>

                            <td>{{$module->description}}</td>

                            <td x-data="changeStatus({{ $module->status }})" >
                                <input type="checkbox"
                                    name="status" :checked="checked"
                                    data-url=""
                                    @change="toggle('{{ route('panel.module.status' , $module->id) }}')"
                                >
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-x-5 ">

                                    <a href="{{ route('panel.module.edit' , $module->id) }}">ویرایش</a>

                                    <form action="{{ route('panel.module.destroy' , $module->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete">
                                                <span>
                                                    <i class="fa fa-delete"></i>
                                                </span>
                                            <span>حذف</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

