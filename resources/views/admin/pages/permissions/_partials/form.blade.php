@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" value="{{ $permission->name ?? old('name') }}" />
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" class="form-control"  value="{{ $permission->description ?? old('description') }}" />
</div>