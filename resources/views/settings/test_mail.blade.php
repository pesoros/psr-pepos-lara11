

<form class="px-3" method="post" action="{{ route('test.send.mail') }}" id="test_email">
    @csrf

    <input type="hidden" name="mail_driver" value="{{$data['mail_driver']}}" />
    <input type="hidden" name="mail_host" value="{{$data['mail_host']}}" />
    <input type="hidden" name="mail_port" value="{{$data['mail_port']}}" />
    <input type="hidden" name="mail_username" value="{{$data['mail_username']}}" />
    <input type="hidden" name="mail_password" value="{{$data['mail_password']}}" />
    <input type="hidden" name="mail_encryption" value="{{$data['mail_encryption']}}" />
    <input type="hidden" name="mail_from_address" value="{{$data['mail_from_address']}}" />
    <input type="hidden" name="mail_from_name" value="{{$data['mail_from_name']}}" />
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="email" class="form-label">{{ __('E-Mail Address')}}</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter Email') }}" required/>
        </div>
        <div class="col-md-12 mb-2 text-end">
            <label id="email_sending" style="display: none;"><i class="fas fa-clock"></i></label>
            <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" data-bs-dismiss="modal">
            <input type="submit" value="{{ __('Send Test Mail') }}" class="btn-create btn btn-primary">
        </div>
    </div>
</form>
