@extends('backend.layout')

@section('content')

                    <div class="row container">
                        <div class="col-md-9">
                            <h4 class="page-title d-inline">@lang('Create Asked Question')</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('question.index') }}"
                               class="btn btn-primary">@lang('View Question')</a>
                        </div>
                        
                    </div>
                    <div class="mt-5">
                    <form method="POST" id="dynamic-form" action="{{ route('question.store') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- {!! Form::open(['method' => 'POST', 'route' => ['question.store'], 'files' => true,]) !!} -->
                        <div id="input-fields">

                        <div class="row justify-content-center">
                        <div class="col-12 col-md-6 form-group">
                               <label for="exampleTextarea">Question</label>
                               <input type="text" name="question" class="form-control" placeholder="Enter text" required>

                            </div>
                        </div>

                        <div class="row justify-content-center container">
                            <div class="col-6 col-md-6 form-group">
                                <label for="exampleTextarea">Answer</label>
                                <textarea class="form-control" name="answer" id="exampleTextarea" rows="4" placeholder="Enter your text here" required></textarea>
                            </div>
                        </div>
</div>
                        <div class="row justify-content-center">    

                            <div class="col-12 col-lg-6 form-group text-center mt-3">

                                {!! Form::submit(trans('create'), ['class' => 'btn mt-auto  btn-danger']) !!}
                            </div>
                        </div>
                        </form>
                        <!-- {!! Form::close() !!} -->
                    </div>
                    @endsection


                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
    // Add input field
//     $("#add-field").click(function() {
//         var newField ='<div class="row justify-content-center container">'+
//             '<div class="col-12 col-md-6 form-group">' +
//             '<label for="exampleTextarea">Question</label>'+
//             '<input type="text" name="question[]" class="form-control" placeholder="Enter text">' +
//             '<label for="exampleTextarea">Answer</label>'+
//             '<textarea class="form-control" id="exampleTextarea" name="answer[]" rows="4" placeholder="Enter your text here"></textarea>'+
//             '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
//             '</div>'+
//             '</div>';

//         $("#input-fields").append(newField);
//     });

//     // Remove input field
//     $("#dynamic-form").on("click", ".remove-field", function() {
//         $(this).closest(".form-group").remove();
//     });
// });

//                     </script>
                    


               

