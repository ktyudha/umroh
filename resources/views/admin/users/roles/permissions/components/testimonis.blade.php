<section class="mt-4">
    <h6 class="text-muted mb-3">Testimonis</h6>

    <div class="flex items-center">
        <input type="checkbox" id="testimonis_read" name="testimonis_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('testimonis read') or $role->name === 'superadmin') checked @endif>

        <label for="testimonis_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read testimonis
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="testimonis_create" name="testimonis_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('testimonis create') or $role->name === 'superadmin') checked @endif>

        <label for="testimonis_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create testimonis
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="testimonis_update" name="testimonis_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('testimonis update') or $role->name === 'superadmin') checked @endif>

        <label for="testimonis_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit testimonis
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="testimonis_delete" name="testimonis_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('testimonis delete') or $role->name === 'superadmin') checked @endif>

        <label for="testimonis_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete testimonis
        </label>
    </div>

</section>
