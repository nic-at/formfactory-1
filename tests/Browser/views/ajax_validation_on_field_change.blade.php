@extends('master')
@section('content')
    {!! Form::open('myFormId')->requestObject(HtmlBuilderTests\Browser\Requests\AjaxValidationTestRequest::class)->action('/ajaxvalidation-post')->novalidate() !!}
    {!! Form::text('text')->ajaxValidation('onChange') !!}
    {!! Form::submit('submit') !!}
    {!! Form::close() !!}
@endsection