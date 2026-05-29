<p>
    <label for="title">Título</label>
    <input id="title" name="title" value="{{ old('title', $post->title ?? '') }}">
    @error('title') <span class="error">{{ $message }}</span> @enderror
</p>

<p>
    <label for="content">Contenido</label>
    <textarea id="content" name="content">{{ old('content', $post->content ?? '') }}</textarea>
    @error('content') <span class="error">{{ $message }}</span> @enderror
</p>
