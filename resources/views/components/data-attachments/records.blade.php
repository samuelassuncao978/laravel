<div class="flex flex-col">
    <label class="leading-loose">Records:</label>
    <select {!! isset($multiple) ? 'multiple' : '' !!} name="records[]"
        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
        @foreach (\App\Models\Record::all() as $key => $record)
            <option value="{{ $record->id }}" {!! isset($value)
    ? (collect($value)->pluck('id')->contains($record->id)
        ? 'selected="selected"'
        : '')
    : '' !!}>{{ $record->name }}</option>
        @endforeach
    </select>
    @error('records')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
</div>
