@extends('admin/dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <br>
            <div class="box box-info">	
                <div class="box-header with-border">
                    @if(isset($oItem))
                        <h3 class="box-title">Modification</h3>
                    @else
                        <h3 class="box-title">Ajouter</h3>
                    @endif
                </div>
                <div class="box-body"> 
                    @if(isset($oItem))
                        {!! BootForm::open()->action( route('admin.parameter.update', $oItem->id_parameter) )->put() !!}
                        {!! BootForm::bind($oItem) !!}
                    @else
                        {!! BootForm::open()->action( route('admin.parameter.store') )->post() !!}
                    @endif

                        {!! BootForm::text(__('parameter.name_parameter'), 'name_parameter') !!}
                        {!! BootForm::text(__('parameter.slug_parameter'), 'slug_parameter') !!}
                        {!! BootForm::text(__('parameter.value_parameter'), 'value_parameter') !!}

                    {!! BootForm::submit('Envoyer', 'btn-primary')->addClass('pull-right') !!}

                    {!! BootForm::close() !!}
                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
        </div>
    </div>
@stop

