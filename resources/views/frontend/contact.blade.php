@extends('frontend.layouts.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('img/contact-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>{{ trans('labels.frontend.contact.title') }}</h1>
                        <span class="subheading">{{ trans('labels.frontend.contact.questions') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>{{ trans('labels.frontend.contact.info') }}</p>
                {{ Form::open(['name' => 'sentMessage', 'id' => 'contactForm', 'novalidate']) }}
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        {{ Form::label('name', trans('labels.frontend.contact.form.name')) }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => trans('labels.frontend.contact.form.name'), 'id' => 'name', 'required', 'data-validation-required-message' => 'Please enter your name.']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        {{ Form::label('email', trans('labels.frontend.contact.form.email')) }}
                        {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => trans('labels.frontend.contact.form.email'), 'id' => 'email', 'required', 'data-validation-required-message' => 'Please enter your email address.']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        {{ Form::label('phone', trans('labels.frontend.contact.form.phone')) }}
                        {{ Form::tel('name', '', ['class' => 'form-control', 'placeholder' => trans('labels.frontend.contact.form.phone'), 'id' => 'phone', 'required', 'data-validation-required-message' => 'Please enter your phone number.']) }}
                        <p class="help-phone text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        {{ Form::label('message', trans('labels.frontend.contact.form.message')) }}
                        {{ Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => trans('labels.frontend.contact.form.message'), 'id' => 'message', 'required', 'data-validation-required-message' => 'Please enter a message.']) }}
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                {{ Form::button(trans('labels.frontend.contact.form.send'), ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'sendMessageButton']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
<script src="{{ asset(mix('js/jqBootstrapValidation.js')) }}"></script>
<script>
    $(function() {

        $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
            preventSubmit: true,
            submitSuccess: function($form, event) {
                event.preventDefault(); // prevent default submit behaviour
                // get values from FORM
                var name = $("input#name").val();
                var email = $("input#email").val();
                var phone = $("input#phone").val();
                var message = $("textarea#message").val();
                var firstName = name; // For Success/Failure Message
                // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
                    firstName = name.split(' ').slice(0, -1).join(' ');
                }
                $this = $("#sendMessageButton");
                $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
                $.ajax({
                    url: "{{ route('frontend.contact.send') }}",
                    type: "POST",
                    data: {
                        name: name,
                        phone: phone,
                        email: email,
                        message: message
                    },
                    cache: false,
                    success: function(response) {
                        // Success message
                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                        $('#success > .alert-success')
                        .append("<strong>" + response.data + "</strong>");
                        $('#success > .alert-success')
                        .append('</div>');
                        //clear all fields
                        $('#contactForm').trigger("reset");
                    },
                    error: function(error) {
                        // Fail message
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                        $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
                        $('#success > .alert-danger').append('</div>');
                        //clear all fields
                        $('#contactForm').trigger("reset");
                    },
                    complete: function() {
                        setTimeout(function() {
                            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
                        }, 1000);
                    }
                });
            },
            filter: function() {
                return $(this).is(":visible");
            },
        });

        $("a[data-toggle=\"tab\"]").click(function(e) {
            e.preventDefault();
            $(this).tab("show");
        });
    });

    /*When clicking on Full hide fail/success boxes */
    $('#name').focus(function() {
        $('#success').html('');
    });

</script>
@endpush
