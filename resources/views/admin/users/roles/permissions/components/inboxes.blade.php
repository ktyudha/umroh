<section class="mt-4">
    <h6 class="text-muted mb-3">Inboxes</h6>

    <div class="flex items-center">
        <input type="checkbox" id="inboxes_read" name="inboxes_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('inboxes read') or $role->name === 'superadmin') checked @endif>

        <label for="inboxes_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read inboxes
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="inboxes_create" name="inboxes_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('inboxes create') or $role->name === 'superadmin') checked @endif>

        <label for="inboxes_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create inboxes
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="inboxes_update" name="inboxes_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('inboxes update') or $role->name === 'superadmin') checked @endif>

        <label for="inboxes_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit inboxes
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="inboxes_delete" name="inboxes_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('inboxes delete') or $role->name === 'superadmin') checked @endif>

        <label for="inboxes_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete inboxes
        </label>
    </div>

</section>
