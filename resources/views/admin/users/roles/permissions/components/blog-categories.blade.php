<section class="mt-4">
    <h6 class="text-muted mb-3">Blog Categories</h6>

    <div class="flex items-center">
        <input type="checkbox" id="blog_categories_read" name="blog_categories_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blog categories read') or $role->name === 'superadmin') checked @endif>

        <label for="blog_categories_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read blog
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blog_categories_create" name="blog_categories_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blog categories create') or $role->name === 'superadmin') checked @endif>

        <label for="blog_categories_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create blog
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blog_categories_update" name="blog_categories_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blog categories update') or $role->name === 'superadmin') checked @endif>

        <label for="blog_categories_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit blog
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="blog_categories_delete" name="blog_categories_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('blog categories delete') or $role->name === 'superadmin') checked @endif>

        <label for="blog_categories_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete blog
        </label>
    </div>

</section>
