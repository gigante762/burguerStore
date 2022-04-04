<form class="d-inline-block">
    @csrf
    @method('POST')
    <select class="form-select form-select-sm">
        <option value='title'>Ordenar pelo nome</option>
        <option value='price<'>Ordenar pelo menor preço</option>
        <option value='price>'>Ordenar pelo maior preço</option>
    </select>
</form>
