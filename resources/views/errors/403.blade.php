@extends('layouts.blank')

@section('title_page','404')
@section('content')


    <section class="content">
        <div class="card ">
            <!-- /.card-header -->
            <div class="card-body ">
                <div class="error-page">
                    <h2 class="headline text-warning"> 404</h2>

                    <div class="error-content mb-3">
                        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! </h3>

                        <p>
                            {{__($exception->getMessage() ?: 'Service Unavailable')}}
{{--                            {{__('Meanwhile, you may')}} --}}
                            <a href="{{route('home')}}">{{__('return to home')}}</a>
{{--                            {{__('or try using the search form.')}}--}}
                        </p>

{{--                        <form class="search-form">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" name="search" class="form-control" placeholder="Search">--}}

{{--                                <div class="input-group-append">--}}
{{--                                    <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.input-group -->--}}
{{--                        </form>--}}
                    </div>
                    <!-- /.error-content -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>

    </section>
@endsection
