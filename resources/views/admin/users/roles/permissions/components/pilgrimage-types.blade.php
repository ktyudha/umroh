<section class="mt-4">
    <h6 class="text-muted mb-3">Pilgrimage types</h6>

    <div class="flex items-center">
        <input type="checkbox" id="pilgrimage_types_read" name="pilgrimage_types_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('pilgrimage types read') or $role->name === 'superadmin') checked @endif>

        <label for="pilgrimage_types_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read pilgrimage types
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="pilgrimage_types_create" name="pilgrimage_types_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('pilgrimage types create') or $role->name === 'superadmin') checked @endif>

        <label for="pilgrimage_types_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create pilgrimage types
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="pilgrimage_types_update" name="pilgrimage_types_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('pilgrimage types update') or $role->name === 'superadmin') checked @endif>

        <label for="pilgrimage_types_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit pilgrimage types
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="pilgrimage_types_delete" name="pilgrimage_types_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('pilgrimage types delete') or $role->name === 'superadmin') checked @endif>

        <label for="pilgrimage_types_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete pilgrimage types
        </label>
    </div>

</section>
