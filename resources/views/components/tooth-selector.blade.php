<div class="grid grid-cols-8 gap-2">
    @foreach (range(11, 48) as $tooth)
        <button type="button" class="p-2 border rounded bg-white hover:bg-blue-100"
            onclick="selectTooth({{ $tooth }})">
            {{ $tooth }}
        </button>
    @endforeach
</div>
<input type="hidden" name="selected_tooth" id="selected_tooth">
<script>
    function selectTooth(tooth) {
        document.getElementById('selected_tooth').value = tooth;
    }
</script>
