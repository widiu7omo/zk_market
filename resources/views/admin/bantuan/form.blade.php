<div class="form-group {{ $errors->has('topic') ? 'has-error' : ''}}">
    <label for="topic" class="control-label">{{ 'Topic' }}</label>
    <input class="form-control" name="topic" type="text" id="topic" value="{{ isset($bantuan->topic) ? $bantuan->topic : ''}}" >
    {!! $errors->first('topic', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($bantuan->title) ? $bantuan->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Content' }}</label>
    <input class="form-control" name="content" type="text" id="content" value="{{ isset($bantuan->content) ? $bantuan->content : ''}}" >
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
