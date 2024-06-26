<div class="col-12 col-md-9">
    <div class="row">
        <!-- name -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('title')</label>
                <x-input name="title" :value="$post1->title" :required="true" placeholder="{{ __('Tiêu đề') }}" />
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label class="form-label">@lang('slug'):</label>
                <x-input-prepended-text :pText="config('custom.frontend_url').config('custom.prefix_url.post1')" name="slug" :value="old('slug', $post1->slug)" />
            </div>
        </div>
        <!-- desc -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('content')</label>
                <textarea name="content" class="ckeditor visually-hidden">{{ $post1->content }}</textarea>
            </div>
        </div>
        <!-- excerpt -->
        <div class="col-12">
            <div class="mb-3">
                <label class="control-label">@lang('excerpt')</label>
                <textarea class="form-control" name="excerpt" rows="5">{{ $post1->excerpt }}</textarea>
            </div>
        </div>
    </div>
</div>
