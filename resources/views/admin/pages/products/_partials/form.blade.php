@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome do produto</label>
    <input type="text" name="title" class="form-control" value="{{ $product->title ?? old('title') }}" />
</div>
<div class="form-group">
    <label>SKU do produto</label>
    <input type="text" name="sku" class="form-control"  value="{{ $product->sku ?? old('sku') }}" />
</div>
<div class="form-group">
    <label>Descrição do produto</label>
    <input type="text" name="description" class="form-control"  value="{{ $product->description ?? old('description') }}" />
</div>
<div class="form-group">
    <label>Resumo do produto</label>
    <input type="text" name="excerpt" class="form-control" value="{{ $product->excerpt ?? old('excerpt') }}" />
</div>
<div class="form-group">
    <label>Preço do produto</label>
    <input type="number" name="price" class="form-control"  value="{{ $product->price ?? old('price') }}" />
</div>
<div class="form-group">
    <label>Preço promocional</label>
    <input type="number" name="price_promotional" class="form-control"  value="{{ $product->price_promotional ?? old('price_promotional') }}" />
</div>
<div class="form-group">
    <label>Tipo do produto</label>
    <input type="text" name="type" class="form-control" value="{{ $product->type ?? old('type') }}" />
</div>
<div class="form-group">
    <label>Controlar unidade do estoque?</label>
    <input type="checkbox" name="manage_stock" class="form-control" value="{{ $product->manage_stock ?? old('manage_stock') }}" />
</div>
<div class="form-group">
    <label>Status do estoque?</label>
    <input type="checkbox" name="stock_status" class="form-control" value="{{ $product->stock_status ?? old('stock_status') }}" />
</div>
<div class="form-group">
    <label>Destoque B2B?</label>
    <input type="checkbox" name="b2b_highlights" class="form-control" value="{{ $product->b2b_highlights ?? old('b2b_highlights') }}" />
</div>
<div class="form-group">
    <label>B2B preço apartir de</label>
    <input type="checkbox" name="b2b_price_from" class="form-control" value="{{ $product->b2b_price_from ?? old('b2b_price_from') }}" />
</div>
<div class="form-group">
    <label>Status do produto</label>
    <input type="text" name="status" class="form-control" value="{{ $product->status ?? old('status') }}" />
</div>
<div class="form-group">
    <label>Titulo para o SEO</label>
    <input type="text" name="seo_title" class="form-control" value="{{ $product->seo_title ?? old('seo_title') }}" />
</div>
<div class="form-group">
    <label>Descrição para o SEO</label>
    <input type="text" name="seo_description" class="form-control" value="{{ $product->seo_description ?? old('seo_description') }}" />
</div>