@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.repositrio.index") }}">Repositório</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Repositório</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.repositrio.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage repositrio_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome" class="col-md-2 col-form-label">Nome:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome" name="nome"  placeholder="Nome"  value="{{{ old('nome', isset($data)?$data->nome : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="descrio" class="col-md-2 col-form-label">Descrição:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="descrio" name="descrio"  placeholder="Descrição"  value="{{{ old('descrio', isset($data)?$data->descrio : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('descrio')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="descrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="arquivo" class="col-md-2 col-form-label">Arquivo:</label>
                        <div class="col-md-10">
                            @if (isset($data->arquivo) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["arquivo"]['original']["folder"].$data->arquivo))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["arquivo"]['original']["folder"].$data->arquivo)}}" target="_blank">{{$data->arquivo}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="arquivo_admiko_delete" id="arquivo_admiko_delete" value="1">
                                <label class="form-check-label" for="arquivo_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="arquivo"  name="arquivo" >
                            <input type="hidden" id="arquivo_admiko_current" name="arquivo_admiko_current" value="{{$data->arquivo??''}}">
                            <div class="invalid-feedback @if ($errors->has('arquivo')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('arquivo')){{ $errors->first('arquivo') }}@endif
                            </div>
                            <small id="arquivo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.repositrio.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection