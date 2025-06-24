<section class="mt-4">
    <h6 class="text-muted mb-3">Permissions</h6>

    <div class="flex items-center">
        <input type="checkbox" id="permissions_read" name="permissions_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="users_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read permissions
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="permissions_create" name="permissions_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="users_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create permissions
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="permissions_edit" name="permissions_edit"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="users_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit permissions
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="permissions_delete" name="permissions_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="users_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete permissions
        </label>
    </div>

</section>
