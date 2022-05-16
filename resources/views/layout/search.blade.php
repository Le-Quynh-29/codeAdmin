<div class="form-body" style="padding-left: 0;">
    <div data-example-id="simple-form-inline">
        <form class="form-inline" action="" method="get">
            @csrf
            <div class="form-group">
                <select class="form-control" name="search_by">
                    @foreach ($fields as $key => $field)
                        <option value="{{ $key }}" {!! app('request')->input('search_by') == $key ? 'selected="selected"' : '' !!}>
                            {{ $field }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" name="search_text" placeholder="{{ __('Từ khóa') }}" value="{{ app('request')->input('search_text') }}" />
            </div>
            <button type="submit" class="btn btn-default">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>

