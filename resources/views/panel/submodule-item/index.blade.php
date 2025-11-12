@extends('panel.layouts.master')
@push('vite-scripts')
    @vite('resources/js/panel/pages/submodule-item.js')
@endpush
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.css') }}" />
@endpush
@push('script')
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@section('title' ,' آیتم - نمایش')

@section('bread-crumb')

    <li class="bread-crumb-path">
        <a href="{{ route('panel.submodule-item.index') }}">
            <span> آیتم </span>
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
                <span>نمایش آیتم ها </span>
            </h2>
            <div class="flex items-center justify-between">
                <a href="{{ route('panel.submodule-item.create') }}" class="btn bg-green-50 text-green-700 ring-green-600/20">
                    <span></span>
                    <span>ساخت آیتم جدید</span>
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
                        <th scope="col">ساب ماژول والد</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @foreach($submoduleItems as $submoduleItem)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <span class="inline-block align-middle">{!! $submoduleItem->icon !!}</span>
                            </td>
                            <td>{{$submoduleItem->name_fa}}</td>

                            <td>{{$submoduleItem->name_en}}</td>
                            <td>
                                <a href="">
                                    {{$submoduleItem->submodule->name_fa}}
                                </a>
                            </td>

                            <td x-data="changeStatus({{ $submoduleItem->status }})" >
                                <input type="checkbox"
                                    name="status" :checked="checked"
                                    data-url=""
                                    @change="toggle('{{ route('panel.submodule-item.status' , $submoduleItem->id) }}')"
                                >
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-x-5 ">

                                    <a href="{{ route('panel.submodule-item.edit' , $submoduleItem->id) }}">ویرایش</a>

                                    <form action="{{ route('panel.submodule-item.destroy' , $submoduleItem->id) }}"
                                          method="post">
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

