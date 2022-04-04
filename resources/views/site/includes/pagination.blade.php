<nav class="d-inline-block me-3  pagination pagination-sm my-0">
    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
        {!! $products->links() !!}
    @endif
</nav>
