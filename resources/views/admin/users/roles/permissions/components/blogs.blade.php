<section class="mt-4">
    <h6 class="text-muted mb-3">Blogs</h6>

    <div class="flex items-center">
        <input type="checkbox" id="blogs_read" name="blogs_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blogs read') or $role->name === 'superadmin') checked @endif>

        <label for="blogs_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read blogs
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blogs_create" name="blogs_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blogs create') or $role->name === 'superadmin') checked @endif>

        <label for="blogs_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create blogs
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blogs_update" name="blogs_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blogs update') or $role->name === 'superadmin') checked @endif>

        <label for="blogs_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit blogs
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blogs_delete" name="blogs_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blogs delete') or $role->name === 'superadmin') checked @endif>

        <label for="blogs_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete blogs
        </label>
    </div>

</section>
