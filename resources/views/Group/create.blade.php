@extends('layouts.app')

@section('stylesheet')

	
    {!!Html::style('css/select2.css')!!}     

@endsection


@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">


	{!! Form::open(['route' => 'group.store','data-parsley-validate'=>'']) !!}

    {{Form::label('groupmembers','Select Members:')}}

    <select class="form-control select2-multi" name="groupmembers[]" multiple="multiple">
    
       @foreach($members as $member)

          <option value={{$member->id}}><b>{{$member->name}}</b>,{{$member->phone_no}}</option>
          
    @endforeach
    </select>
    {{Form::submit('Go Create!', ['class'=>'btn btn-primary form-spacing-top'])}}
    
             
    {{Form::close()}}


	</div>
</div>

@endsection

@section('script')
	
  {!!Html::script('js/select2.js')!!}
  		<script type="text/javascript">
		$(".select2-multi").select2();
		</script>

@endsection