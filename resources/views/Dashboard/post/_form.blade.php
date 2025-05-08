@csrf

<label for="">Titulo</label>
<input type="text" name="title" id="" value="{{ old('title',$post->title)}}">
<label for="">Slug</label>
<input type="text" name="slug" id="" value="{{old('slug',$post->slug)}}">
<label for="">Contenido</label>
<textarea name="content">{{old('content',$post->content)}}</textarea>
<label for="">Categoria</label>
<select name="category_id" id="">
    @foreach ($categories as $title=>$id)
    <option {{ old('category_id',$post->category_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        
    @endforeach
</select>
<label for="">Descripcion</label>
<textarea name="description" > {{ old('description',$post->description) }}</textarea>
<label for="">Posted</label>
<select name="posted" id="">
    <option {{old('posted',$post->posted)== 'not' ? 'selected' : ''}}  value="not">Not</option>
    <option {{old('posted',$post->posted)== 'yes' ? 'selected' : ''}}  value="yes">yes</option>
</select>
@if (isset($task) && $task == 'edit')
    <label for="">image</label>
    <input type="file" name="image">
@endif

<button type="submit">send</button>