@extends('avored-framework::layouts.app')

@section('content')

    <div id="admin-admin-user-page" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ __('avored-framework::user.admin-user-create') }}
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.admin-user.store') }}" method="post">
                        @csrf
                        <admin-user-field-page inline-template>
                            <div>
                                @include('avored-framework::system.admin-user._fields')
                            </div>
                        </admin-user-field-page>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                {{ __('avored-framework::user.admin-user-create') }}
                            </button>
                            <a href="{{ route('admin.admin-user.index') }}" class="btn">
                                {{ __('avored-framework::lang.cancel') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')

<script>

 var app = new Vue({
        el: '#admin-admin-user-page',
        data : {
            model: {},
            autofocus:true,
            disabled: false
           
        },
        methods: {
            changeModelValue: function(val,fieldName) {
                this.model[fieldName] = val;
            }
        }
    });

</script>


@endpush
